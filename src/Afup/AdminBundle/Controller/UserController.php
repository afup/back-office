<?php

namespace Afup\AdminBundle\Controller;

use Afup\AdminBundle\Controller\CrudController;
use Afup\AdminBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends CrudController
{
    /**
     * @{inheritDoc}
     */
    protected function getRolePrefix()
    {
        return 'ROLE_ADMIN_USER_';
    }

    /**
     * @{inheritDoc}
     */
    protected function getRoutePrefix()
    {
        return 'afup_admin_user_';
    }

    /**
     * @{inheritDoc}
     */
    protected function getEntityName()
    {
        return 'Afup\CoreBundle\Entity\User';
    }

    /**
     * @{inheritDoc}
     */
    protected function getListData()
    {
        return $this
            ->get('doctrine')
            ->getRepository($this->getEntityName())
            ->findUserList()
        ;
    }

    /**
     * @{inheritDoc}
     */
    protected function getFormType()
    {
        return new UserType();
    }
}
