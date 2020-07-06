<?php

namespace ProjetBundle\Controller;

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

        return $this->render('edit.html.twig', [
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
}
