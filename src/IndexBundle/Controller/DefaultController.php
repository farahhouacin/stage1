<?php

namespace IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends Controller
{
    /**
     * @Route("/index", name="index")
     */
    public function indexAction()
    {
        $clients = $this->getDoctrine()->getManager()->getRepository('ClientBundle:Client')->findAll();
        return $this->render('index.html.twig', [
            "clients"=>$clients
        ]);

    }
}
