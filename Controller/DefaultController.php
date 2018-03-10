<?php

namespace Allset\Przelewy24Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@AllsetPrzelewy24/index.html.twig');
    }
}
