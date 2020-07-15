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
        $projets = $this->getDoctrine()->getManager()->getRepository('ProjetBundle:Projet')->findAll();
        return $this->render('index.html.twig', [
            'projets' => $projets,
            "clients"=> $clients
        ]);

    }

    /**
     * @Route("/settings", name="settings")
     */
    public function indexCollab()
    {
        $settings = $this->getDoctrine()->getManager()->getRepository('CollaborateurBundle:Collab')->findAll();
        return $this->render('settings.html.twig', [
            'settings' => $settings
        ]);
    }

    /**
     * @Route("/login",name="login")
     */
    public function login()
    {
        //$login = $this->getDoctrine()->getManager()->getRepository('IndexBundle:Index')->findAll();
        return $this->render('login.html.twig');
    }

    /**
     * @Route("/archive",name="archive")
     */
    public function archive()
    {
        $archive = $this->getDoctrine()->getManager()->getRepository('ProjetBundle:Projet')->findAll();
        return $this->render('archive.html.twig');
    }

}
