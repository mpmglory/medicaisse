<?php

namespace PMM\CoreBundle\Controller;

use PMM\CoreBundle\Entity\Patient;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends Controller
{

    public function homeAction()
    {

        return $this->render('home/index.html.twig');
    }


}
