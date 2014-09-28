<?php

namespace Afup\Bundle\MemberBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AfupMemberBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass($this->buildMappingCompilerPass($container));
    }

    /**
     * @param ContainerBuilder $container
     *
     * @return DoctrineOrmMappingsPass
     */
    public function buildMappingCompilerPass(ContainerBuilder $container)
    {
        $sourceDir = $container->getParameter('kernel.root_dir') . '/../src/';

        return DoctrineOrmMappingsPass::createXmlMappingDriver(
            array($sourceDir . 'Afup/Model/Mapping/' => 'Afup\Model')
        );
    }
}
