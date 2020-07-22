<?php

namespace IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;



class DefaultController extends Controller
{
    /**
     * @Route("", name="index")
     */
    public function indexAction()
    {
        $clients = $this->getDoctrine()->getManager()->getRepository('ClientBundle:Client')->findAll();
        $nbclients = $this->getDoctrine()->getManager()->getRepository('ClientBundle:Client')->getNbClient();
        $projets = $this->getDoctrine()->getManager()->getRepository('ProjetBundle:Projet')->findAll();
        $nbprojets = $this->getDoctrine()->getManager()->getRepository('ProjetBundle:Projet')->getNbProjet();
        $nbcollabs = $this->getDoctrine()->getManager()->getRepository('CollaborateurBundle:Collab')->getNbCollab();
        return $this->render('index.html.twig', [
            'projets' => $projets,
            "clients"=> $clients,
            'nbclients'=>$nbclients,
            "nbprojets"=>$nbprojets,
            "nbcollabs"=>$nbcollabs
        ]);

    }

    /**
     * @Route("/settings", name="settings")
     */
    public function indexCollab()
    {
        $settings = $this->getDoctrine()->getManager()->getRepository('CollaborateurBundle:Collab')->findAll();
        $nbetat = $this->getDoctrine()->getManager()->getRepository('ProjetBundle:Etat')->getNb();
        $nbrole = $this->getDoctrine()->getManager()->getRepository('CollaborateurBundle:Role')->getNb();
        $nbfonc = $this->getDoctrine()->getManager()->getRepository('CollaborateurBundle:Fonction')->getNb();
        //$this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('settings.html.twig', [
            'settings' => $settings,
            "nbetat"=> $nbetat,
            "nbrole"=>$nbrole,
            "nbfonc"=>$nbfonc
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
        $nbclients = $this->getDoctrine()->getManager()->getRepository('ClientBundle:Client')->getNbClient();
        $nbprojets = $this->getDoctrine()->getManager()->getRepository('ProjetBundle:Projet')->getNbProjet();
        $nbcollabs = $this->getDoctrine()->getManager()->getRepository('CollaborateurBundle:Collab')->getNbCollab();
        return $this->render('archive.html.twig', [
            'nbclients'=>$nbclients,
            "nbprojets"=>$nbprojets,
            "nbcollabs"=>$nbcollabs
        ]);
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
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('user.html.twig',[
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
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin.html.twig',[
            'clients' => $clients,
            'projets' => $projets,
        ]);
    }

    /**
     * @Route("/404",name="404")
     */
    public function erreur()
    {
        $collabs = $this->getDoctrine()->getManager()->getRepository('CollaborateurBundle:Collab')->findAll();
        return $this->render('404.html.twig', [
            'collabs' => $collabs,
        ]);
    }





}
