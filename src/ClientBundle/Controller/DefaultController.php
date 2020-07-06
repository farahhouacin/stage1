<?php

namespace ClientBundle\Controller;

use ClientBundle\Entity\Client;
use ClientBundle\Form\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/client")
 */

class DefaultController extends Controller
{
    /**
     * @Route(name="index-client")
     */
    public function indexClient()
    {
        $clients = $this->getDoctrine()->getManager()->getRepository('ClientBundle:Client')->findAll();
        return $this->render('index.html.twig', [
            'clients' => $clients
        ]);
    }
    /**
     * @Route ("/new", name="new-client")
     */
    public function newClient(Request $request)
    {
        $client = new Client();
        $clientForm = $this->createForm(ClientType::class, $client);

        if ($request->isMethod('POST') && $clientForm->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($client);
            $em->flush();
        }
        return $this->render('newclient.html.twig', [
            'form' => $clientForm->createView()
        ]);
    }
    /**
     * @Route("/edit/{id}", name="edit-client")
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editClient($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('ClientBundle:Client')->find($id);
        $clientForm = $this->createForm(ClientType::class, $client);

        if ($request->isMethod('POST') && $clientForm->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('index-client');
        }

        return $this->render('edit.html.twig', [
            'form' => $clientForm->createView()
        ]);
    }

    /**
     * @Route ("/delete/{id}", name="delete-client")
     */
    public function deleteClient($id)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('ClientBundle:Client')->find($id);
        $em->remove($client);
        $em->flush();

        return $this->redirectToRoute('index-client');
    }
}
