<?php

namespace DsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DsBundle:Default:index.html.twig', array('name' => $name));
    }
}
