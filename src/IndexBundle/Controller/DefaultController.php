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
        //$this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('settings.html.twig', [
            'settings' => $settings
        ]);
    }

    /**
     * @Route("/login",name="login")

    public function login()
    {
        //$login = $this->getDoctrine()->getManager()->getRepository('IndexBundle:Index')->findAll();
        return $this->render('login.html.twig');
    }
     *
     */

    /**
     * @Route("/archiveprojet",name="archiveprojet")
     */
    public function archiveProjet()
    {
        $projets = $this->getDoctrine()->getManager()->getRepository('ProjetBundle:Projet')->findAll();
        return $this->render('archiveProjet.html.twig', [
            'projets' => $projets,
        ]);
    }

    /**
     * @Route("/archive",name="archive")
     */
    public function archive()
    {
       // $archive = $this->getDoctrine()->getManager()->getRepository('ProjetBundle:Projet')->findAll();
        return $this->render('archive.html.twig');
    }

    /**
     * @Route("/archiveclient",name="archiveclient")
     */
    public function archiveClient()
    {
        $clients = $this->getDoctrine()->getManager()->getRepository('ClientBundle:Client')->findAll();
        return $this->render('archiveClient.html.twig', [
            'clients' => $clients,
        ]);
    }

    /**
     * @Route("/archivecollab",name="archivecollab")
     */
    public function archiveCollab()
    {
        $collabs = $this->getDoctrine()->getManager()->getRepository('CollaborateurBundle:Collab')->findAll();
        return $this->render('archiveCollaborateur.html.twig', [
            'collabs' => $collabs,
        ]);
    }

    /**
     * @Route("/user/test",name="usertest")
     */
    public function usertest()
    {
        $clients = $this->getDoctrine()->getManager()->getRepository('ClientBundle:Client')->findAll();
        $projets = $this->getDoctrine()->getManager()->getRepository('ProjetBundle:Projet')->findAll();
        return $this->render('index.html.twig',[
        'clients' => $clients,
        'projets' => $projets,
        ]);
    }

    /**
     * @Route("/admin/test",name="amdintest")
     */
    public function admintest()
    {
        $clients = $this->getDoctrine()->getManager()->getRepository('ClientBundle:Client')->findAll();
        $projets = $this->getDoctrine()->getManager()->getRepository('ProjetBundle:Projet')->findAll();
        return $this->render('index.html.twig',[
            'clients' => $clients,
            'projets' => $projets,
        ]);
    }

}
