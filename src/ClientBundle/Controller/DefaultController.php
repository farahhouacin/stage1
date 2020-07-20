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
        return $this->render('indexClient.html.twig', [
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
//            var_dump($client);
//            die();
            $em->persist($client);
            $em->flush();
            return $this->redirectToRoute('index-client');

        }

        return $this->render('newclient.html.twig', [
            'form' => $clientForm->createView()
        ]);
    }

//    public function sendEmailAction($name, \Swift_Mailer $mailer)
//    {
//        $message = (new \Swift_Message('Confirmation de création de compte'))
//            ->setFrom('testsymfony@gmail.com')
//            ->setTo('')
//            ->setBody(
//                $this->renderView(
//                // app/Resources/views/Emails/registration.html.twig
//                    'registration.html.twig',
//                    array('name_client' => $name)
//                ),
//                'text/html'
//            )
//            ->addPart(
//                $this->renderView(
//                    'Emails/registration.txt.twig',
//                    array('name_client' => $name)
//                ),
//                'text/plain'
//            );
//
//            $mailer->send($message);
//    }

    /**
     * @Route("/edit/{id}", name="edit-client")
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

        return $this->render('editClient.html.twig', [
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

    /**
     * @Route("/detailsclient/{id}", name="details-client")
     */
    public function detailsClient($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('ClientBundle:Client')->find($id);


        return $this->render('detailsclient.html.twig', [
            'client' => $client
        ]);
    }
}
