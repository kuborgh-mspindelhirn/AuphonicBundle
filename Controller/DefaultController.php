<?php

namespace Kuborgh\AuphonicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('KuborghAuphonicBundle:Default:index.html.twig', array('name' => $name));
    }
}
