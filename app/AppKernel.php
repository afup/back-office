<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(

            // Framework
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            // Security
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),

            // Template engine
            new Symfony\Bundle\TwigBundle\TwigBundle(),

            // Log
            new Symfony\Bundle\MonologBundle\MonologBundle(),

            // Mailer
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),

            // Assets
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),

            // Database
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),

            // User management
            new FOS\UserBundle\FOSUserBundle(),
           // new Knp\Bundle\MenuBundle\KnpMenuBundle(),

            // Legacy wrapper
            new Theodo\Evolution\Bundle\LegacyWrapperBundle\TheodoEvolutionLegacyWrapperBundle(),

            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            
            // AFUP
            new Afup\AdminBundle\AfupAdminBundle(),
          //  new Afup\Bundle\MemberBundle\AfupMemberBundle(),
            new Afup\LegacyBundle\AfupLegacyBundle(),
            new Afup\SubscriptionBundle\AfupSubscriptionBundle(),
            new Afup\UserBundle\AfupUserBundle(),
            new Afup\MemberBundle\AfupMemberBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
