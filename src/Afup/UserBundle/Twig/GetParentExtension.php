<?php

namespace Afup\UserBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of GetParentExtension
 *
 * @author Jérôme Desjardins <hello@jewome62.eu>
 */
class GetParentExtension extends \Twig_Extension  
{
    const FULL_TEMPLATE = 'AfupUserBundle::full-layout.html.twig';
    const PARTIAL_TEMPLATE = 'AfupUserBundle::partial-layout.html.twig';

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * Constructor
     * 
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
       $this->container = $container;

       if ($this->container->isScopeActive('request')) {
           $this->request = $this->container->get('request');
       }
    }
        
    public function getFunctions()
    {
        return array(
            'parent_template' => new \Twig_Function_Method($this, 'getParentTemplate'),
        );
    }

    public function getParentTemplate()
    {
        if ($this->useFullTemplate()) {
            return self::FULL_TEMPLATE;
        }
        return self::PARTIAL_TEMPLATE; 
    }

    public function useFullTemplate()
    {
         return !($this->request->isXmlHttpRequest());
    }

    public function getName() {
        return 'afup_userbundle_getparent';
    }

}