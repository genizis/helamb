<?php

namespace CMS\DashboadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        return $this->render('DashboardBundle:Index:index.html.twig');
    }
}
