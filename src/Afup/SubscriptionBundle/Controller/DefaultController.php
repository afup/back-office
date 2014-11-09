<?php

namespace Afup\SubscriptionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AfupSubscriptionBundle:Default:index.html.twig', array('name' => $name));
    }
}
