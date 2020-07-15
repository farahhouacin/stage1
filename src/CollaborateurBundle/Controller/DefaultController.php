<?php

namespace CollaborateurBundle\Controller;

use CollaborateurBundle\Entity\Collab;
use CollaborateurBundle\Entity\Fonction;
use CollaborateurBundle\Entity\Role;
use CollaborateurBundle\Form\CollabType;
use CollaborateurBundle\Form\FonctionType;
use CollaborateurBundle\Form\RoleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/collab")
 */
class DefaultController extends Controller
{
    /**
     * @Route(name="index-collab")
     */
    public function indexCollab()
    {
        $collabs = $this->getDoctrine()->getManager()->getRepository('CollaborateurBundle:Collab')->findAll();
        return $this->render('indexCollab.html.twig', [
            'collabs' => $collabs
        ]);
    }


    /**
     * @Route ("/new", name="new-collab")
     */
    public function newCollab(Request $request)
    {
        $collab = new Collab();
        $collabForm = $this->createForm(CollabType::class, $collab);

        if ($request->isMethod('POST') && $collabForm->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($collab);
            $em->flush();
            return $this->redirectToRoute('index-collab');
        }
        return $this->render('newcollab.html.twig', [
            'form' => $collabForm->createView()
        ]);
    }
    /**
     * @Route("/edit/{id}", name="edit-collab")
     */
    public function editCollab($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $collab = $em->getRepository('CollaborateurBundle:Collab')->find($id);
        $collabForm = $this->createForm(CollabType::class, $collab);

        if ($request->isMethod('POST') && $collabForm->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($collab);
            $em->flush();
            return $this->redirectToRoute('index-collab');
        }

        return $this->render('editCollab.html.twig', [
            'form' => $collabForm->createView(),
            'collab' => $collab

        ]);
    }
    /**
     * @Route ("/delete/{id}", name="delete-collab")
     */
    public function deleteCollab($id)
    {
        $em = $this->getDoctrine()->getManager();
        $collab = $em->getRepository('CollaborateurBundle:Collab')->find($id);

        $em->remove($collab);
        $em->flush();

        return $this->redirectToRoute('index-collab');


    }
    /**
     * @Route("/detailscollab/{id}", name="details-collab")
     */
    public function detailsCollab($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $collab = $em->getRepository('CollaborateurBundle:Collab')->find($id);
        $collabForm = $this->createForm(CollabType::class, $collab);

        return $this->render('detailscollab.html.twig', [
            'form' => $collabForm->createView()
        ]);
    }


    /**
     * @Route("/role",name="index-role")
     */
    public function indexRole()
    {
        $roles = $this->getDoctrine()->getManager()->getRepository('CollaborateurBundle:Role')->findAll();
        return $this->render('indexRole.html.twig', [
            'roles' => $roles
        ]);
    }

    /**
     * @Route ("/newrole", name="new-role")
     */
    public function newRole(Request $request)
    {
        $role = new Role();
        $roleForm = $this->createForm(RoleType::class, $role);

        if ($request->isMethod('POST') && $roleForm->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($role);
            $em->flush();
            return $this->redirectToRoute('index-role');
        }
        return $this->render('newrole.html.twig', [
            'form' => $roleForm->createView()
        ]);
    }
    /**
     * @Route("/editrole/{id}", name="edit-role")
     */
    public function editRole($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $role = $em->getRepository('CollaborateurBundle:Role')->find($id);
        $roleForm = $this->createForm(RoleType::class, $role);

        if ($request->isMethod('POST') && $roleForm->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('index-role');
        }

        return $this->render('editrole.html.twig', [
            'form' => $roleForm->createView()
        ]);
    }
    /**
     * @Route ("/deleterole/{id}", name="delete-role")
     */
    public function deleteRole($id)
    {
        $em = $this->getDoctrine()->getManager();
        $role = $em->getRepository('CollaborateurBundle:Role')->find($id);
        $em->remove($role);
        $em->flush();

        return $this->redirectToRoute('index-role');
    }


    /**
     * @Route("/fonction",name="index-fonction")
     */
    public function indexFonction()
    {
        $fonctions = $this->getDoctrine()->getManager()->getRepository('CollaborateurBundle:Fonction')->findAll();
        return $this->render('indexFonction.html.twig', [
            'fonctions' => $fonctions
        ]);
    }


    /**
     * @Route ("/newfonction", name="new-fonction")
     */
    public function newFonction(Request $request)
    {
        $fonction = new Fonction();
        $fonctionForm = $this->createForm(FonctionType::class, $fonction);

        if ($request->isMethod('POST') && $fonctionForm->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($fonction);
            $em->flush();
            return $this->redirectToRoute('index-fonction');
        }
        return $this->render('newfonction.html.twig', [
            'form' => $fonctionForm->createView()
        ]);
    }

    /**
     * @Route("/editfonction/{id}", name="edit-fonction")
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editFonction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $fonction = $em->getRepository('CollaborateurBundle:Fonction')->find($id);
        $fonctionForm = $this->createForm(FonctionType::class, $fonction);

        if ($request->isMethod('POST') && $fonctionForm->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('index-fonction');
        }

        return $this->render('editfonction.html.twig', [
            'form' => $fonctionForm->createView()
        ]);
    }
    /**
     * @Route ("/deletefonction/{id}", name="delete-fonction")
     */
    public function deleteFonction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $fonction = $em->getRepository('CollaborateurBundle:Fonction')->find($id);
        $em->remove($fonction);
        $em->flush();

        return $this->redirectToRoute('index-fonction');
    }

}
