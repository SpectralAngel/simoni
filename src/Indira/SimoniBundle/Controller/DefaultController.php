<?php

namespace Indira\SimoniBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IndiraSimoniBundle:Default:index.html.twig',
        array(
        ));
    }
}
