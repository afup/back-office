<?php

namespace Afup\AdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;

class MenuBuilder
{
    private $factory;
    private $securityContext;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory, SecurityContextInterface $securityContext)
    {
        $this->factory = $factory;
        $this->securityContext = $securityContext;
    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');

        $this->addChildToMenu($menu, 'admin.menu.user', 'afup_admin_user_list', 'ROLE_ADMIN_USER_LIST');

        return $menu;
    }

    protected function addChildToMenu($menu, $label, $route = null, $role = null)
    {
        $options = array();

        if (is_array($route) && $route[0][0] === '#') {
            $options['uri'] = $route[0];
            $options['attributes'] = $route[1];
        } elseif (is_array($route)) {
            $options['route'] = $route[0];
            $options['routeParameters'] = $route[1];
        } elseif (null !== $route) {
            $options['route'] = $route;
        } else {
            $options['uri'] = '#';
        }

        if ('ROLE_SUPER_ADMIN' === $role) {
            $options['extras'] = array('reserved' => true);
        }

        $submenu = $menu->addChild($label, $options);

        if ($role !== null) {
            $submenu->setDisplay($this->securityContext->isGranted($role));
        }

        return $submenu;
    }
}
