<?php

namespace Afup\MemberBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AfupMemberBundle:Default:index.html.twig', array('name' => $name));
    }
}
