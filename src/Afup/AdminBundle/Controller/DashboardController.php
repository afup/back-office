<?php

namespace Afup\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function dashboardAction()
    {
        return $this->render('AfupAdminBundle:Dashboard:dashboard.html.twig');
    }
}
