<?php

namespace ProjetBundle\Controller;

use ProjetBundle\Form\EtatType;
use ProjetBundle\Entity\Etat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use ProjetBundle\Entity\Projet;
use ProjetBundle\Form\ProjetType;

/**
 * @Route("/projet")
 */
class DefaultController extends Controller
{
    /**
     * @Route("", name="index-projet")
     */
    public function indexProjet()
    {
        $projets = $this->getDoctrine()->getManager()->getRepository('ProjetBundle:Projet')->findAll();
        return $this->render('indexprojet.html.twig', [
            'projets' => $projets
        ]);
    }
    /**
     * @Route ("/new", name="new-projet")
     */
    public function newProjet(Request $request)
    {
        $projet = new Projet();
        $projetForm = $this->createForm(ProjetType::class, $projet);

        if ($request->isMethod('POST') && $projetForm->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($projet);
            $em->flush();
            return $this->redirectToRoute('index-projet');
        }

        return $this->render('newprojet.html.twig', [
            'form' => $projetForm->createView()

        ]);
    }
    /**
     * @Route("/edit/{id}", name="edit-projet")
     */
    public function editProjet($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('ProjetBundle:Projet')->find($id);
        $projetForm = $this->createForm(ProjetType::class, $projet);

        if ($request->isMethod('POST') && $projetForm->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('index-projet');
        }

        return $this->render('editProjet.html.twig', [
            'form' => $projetForm->createView()
        ]);
    }
    /**
     * @Route ("/delete/{id}", name="delete-projet")
     */
    public function deleteProjet($id)
    {
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('ProjetBundle:Projet')->find($id);
        $em->remove($projet);
        $em->flush();

        return $this->redirectToRoute('index-projet');
    }

    /**
     * @Route("/detailsprojet/{id}", name="details-projet")
     */
    public function detailsProjet($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('ProjetBundle:Projet')->find($id);
        $projetForm = $this->createForm(ProjetType::class, $projet);

        return $this->render('detailsprojet.html.twig', [
            'form' => $projetForm->createView()
        ]);
    }



    /**
     * @Route("/etat", name="index-etat")
     */
    public function indexEtat()
    {
        $etats = $this->getDoctrine()->getManager()->getRepository('ProjetBundle:Etat')->findAll();
        return $this->render('etat.html.twig', [
            'etats' => $etats
        ]);
    }

    /**
     * @Route ("/newetat", name="new-etat")
     */
    public function newEtat(Request $request)
    {
        $etat = new Etat();
        $etatForm = $this->createForm(EtatType::class, $etat);

        if ($request->isMethod('POST') && $etatForm->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($etat);
            $em->flush();
            return $this->redirectToRoute('settings');
        }

        return $this->render('newetat.html.twig', [
            'form' => $etatForm->createView()

        ]);
    }
    /**
     * @Route("/editetat/{id}", name="edit-etat")
     */
    public function editEtat($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $etat = $em->getRepository('ProjetBundle:Etat')->find($id);
        $etatForm = $this->createForm(EtatType::class, $etat);

        if ($request->isMethod('POST') && $etatForm->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('index-projet');
        }

        return $this->render('editetat.html.twig', [
            'form' => $etatForm->createView()
        ]);
    }
    /**
     * @Route ("/deleteetat/{id}", name="delete-etat")
     */
    public function deleteEtat($id)
    {
        $em = $this->getDoctrine()->getManager();
        $etat = $em->getRepository('ProjetBundle:Etat')->find($id);
        $em->remove($etat);
        $em->flush();

        return $this->redirectToRoute('index-projet');
    }
}
