<?php

namespace SITE\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    public function indexAction(Request $request)
    {
	    return $this->render('SiteBundle:Index:index.html.twig', array());
    }
}
