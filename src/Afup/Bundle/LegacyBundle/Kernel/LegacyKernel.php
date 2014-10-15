<?php

namespace Afup\Bundle\LegacyBundle\Kernel;

use Afup\Bundle\LegacyBundle\Exception\NotImplementedException;

use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Theodo\Evolution\Bundle\LegacyWrapperBundle\Kernel\LegacyKernel as BaseKernel;

/**
 * @package Afup\Bundle\LegacyBundle\Kernel
 * @author  Thierry Marianne <thierry.marianne@weaving-the-web.org>
 */
class LegacyKernel extends BaseKernel
{
    public function boot(ContainerInterface $container)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'afup_kernel';
    }

    /**
     * @param Request $request
     * @param int     $type
     * @param bool    $catch
     *
     * @return Response
     */
    public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
    {
        if ($this->shouldHandleAsAsset($request)) {
            return $this->handleAssetRequest($request);
        } else {
            return $this->handleLegacyRequest($request);
        }
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    protected function shouldHandleAsAsset(Request $request)
    {
        $path = $this->getAssetPath($request);

        return (strpos($path, '/javascript') !== false) || (strpos($path, '.css') !== false) ||
            (strpos($path, '/images') !== false);
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    protected function handleAssetRequest(Request $request)
    {
        try {
            $asset      = $this->fetchLegacyAsset($request);
            $content    = $asset['content'];
            $headers    = $asset['headers'];
            $statusCode = 200;
        } catch (NotImplementedException $exception) {
            $content    = 'You might want to submit a feature request.';
            $headers    = array();
            $statusCode = 501;
        }

        return new Response($content, $statusCode, $headers);
    }

    /**
     * @param Request $request
     */
    protected function handleLegacyRequest(Request $request)
    {
        $legacyEntryPoint = $this->getLegacyEntryPointPath($request);
        if ($this->isValidLegacyEntryPoint($legacyEntryPoint)) {
            $legacyEntryPoint = $this->getLegacyEntryPointPath($request);
            $content          = $this->fetchLegacyContent($legacyEntryPoint);

            return new Response($content, 200);
        } else {
            throw new \RuntimeException('Please follow the installation doc to access the legacy back-office');
        }
    }

    /**
     * @param $legacyEntryPoint
     *
     * @return bool
     */
    protected function isValidLegacyEntryPoint($legacyEntryPoint)
    {
        return file_exists($legacyEntryPoint);
    }

    /**
     * @param Request $request
     *
     * @return string
     */
    protected function getLegacyEntryPointPath(Request $request)
    {
        $requestUri = $request->getUri();
        $baseUrl    = $request->getSchemeAndHttpHost();

        $filteredUri = filter_var($requestUri, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);
        if ($this->hasPhpExtension($filteredUri)) {
            $legacyEntryPoint = str_replace($baseUrl, '', $filteredUri);
        } else {
            $legacyEntryPoint = '/pages/administration/index.php';
        }

        return $this->getRootDir() . $legacyEntryPoint;
    }

    /**
     * @param $uri
     *
     * @return bool
     */
    protected function hasPhpExtension($uri)
    {
        return strpos($uri, '.php') === strlen($uri) - 4;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    protected function getAssetPath(Request $request)
    {
        $uri = $request->getUri();

        return str_replace($request->getSchemeAndHttpHost(), '', $uri);
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    protected function getAssetAbsolutePath(Request $request)
    {
        $path = $this->getAssetPath($request);
        $path = $this->removeCacheBustingString($path);

        return $this->getRootDir() . '/' . $path;
    }

    /**
     * @param Request $request
     */
    protected function guardAgainstInjection(Request $request)
    {
        $path = $this->getAssetPath($request);
        $path = $this->removeCacheBustingString($path);

        if (
            !$this->isValidImageExtension($path) &&
            !$this->isValidJavaScriptExtension($path) &&
            !$this->isValidStylesheetExtension($path)
        ) {
            throw new NotFoundHttpException('There is no such asset.');
        }
    }

    /**
     * @param $path
     *
     * @return bool
     */
    protected function isValidJavaScriptExtension($path)
    {
        return substr($path, strlen($path) - 3, 3) === '.js';
    }

    /**
     * @param $path
     *
     * @return bool
     */
    protected function isValidStylesheetExtension($path)
    {
        return substr($path, strlen($path) - 4, 4) === '.css';
    }

    /**
     * @param $path
     *
     * @return bool
     */
    protected function isValidImageExtension($path)
    {
        return substr($path, strlen($path) - 4, 4) === '.png' || substr($path, strlen($path) - 4, 4) === '.jpg';
    }

    /**
     * @param $legacyEntryPoint
     *
     * @return array
     */
    protected function fetchLegacyContent($legacyEntryPoint)
    {
        $legacyDirectory = dirname($legacyEntryPoint);;

        // Change current directory and legacy root directory
        $currentDirectory = getcwd();
        chdir($legacyDirectory);

        ini_set('display_errors', '0');
        error_reporting(0);

        ob_start();
        require($legacyEntryPoint);
        $content = ob_get_clean();

        ini_set('display_errors', '1');
        error_reporting(1);

        // Restore current directory as it was before bootstrapping legacy application
        chdir($currentDirectory);

        return $content;
    }

    /**
     * @param Request $request
     *
     * @return array
     * @throws NotImplementedException
     */
    protected function getAssetHeaders(Request $request)
    {
        $assetFilePath = $this->getAssetAbsolutePath($request);
        $headers = array();

        if ($this->isValidJavaScriptExtension($assetFilePath)) {
            $headers = array('content-type' => 'text/javascript');
        } elseif ($this->isValidStylesheetExtension($assetFilePath)) {
            $headers = array('content-type' => 'text/css');
        } elseif ($this->isValidImageExtension($assetFilePath)) {
            $extension = pathinfo($assetFilePath, PATHINFO_EXTENSION);
            $headers = array('content-type' => 'image/' . $extension);
        } else {
            $this->raiseNotImplementedException();
        }

        return $headers;
    }

    /**
     * @param Request $request
     *
     * @return string
     * @throws NotImplementedException
     */
    protected function getAssetContent(Request $request)
    {
        $assetFilePath = $this->getAssetAbsolutePath($request);
        $content = '';

        if ($this->isValidJavaScriptExtension($assetFilePath)) {
            $content = file_get_contents($assetFilePath);
        } elseif ($this->isValidImageExtension($assetFilePath)) {
            $content = file_get_contents($assetFilePath);
        } elseif ($this->isValidStylesheetExtension($assetFilePath)) {
            $content = file_get_contents($assetFilePath);
        } else {
            $this->raiseNotImplementedException();
        }

        return $content;
    }

    /**
     * @throws NotImplementedException
     */
    protected function raiseNotImplementedException()
    {
        throw new NotImplementedException('Handling of a new type of content has to be implemented.');
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    protected function fetchLegacyAsset(Request $request)
    {
        $this->guardAgainstInjection($request);

        $assetFilePath = $this->getAssetAbsolutePath($request);

        if (file_exists($assetFilePath)) {
            $content = $this->getAssetContent($request);
            $headers = $this->getAssetHeaders($request);
        } else {
            $parts = explode('/', $assetFilePath);
            throw new NotFoundHttpException(sprintf('"%s" cannot be found.', $parts[count($parts) - 1]));
        }

        return array(
            'content' => $content,
            'headers' => $headers
        );
    }

    /**
     * @param $assetFilePath
     *
     * @return mixed
     */
    protected function removeCacheBustingString($assetFilePath)
    {
        $queryStringStart = strpos($assetFilePath, '?');
        if ($queryStringStart !== false) {
            $assetFilePath = substr($assetFilePath, 0, $queryStringStart);
        }

        return $assetFilePath;
    }
}
