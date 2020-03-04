<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use App\Repository\MessageRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/message")
 */
class MessageController extends AbstractController
{

    /**
     * Affichage de la liste complet des messages 
     * On affichera uniquement la personne qui a envoyé le message
     * et le message
     * @Route("/", methods={"GET"}, name="message_index")
     */
    public function index(MessageRepository $messageRepository)
    {
        $listOfMessages = $messageRepository->findAll();

        return $this->render('message/index.html.twig',
            [
                'title' => 'Mes messsages',
                'messages' => $listOfMessages
            ]
        );
    }

    /**
     * Le but de cette fonction est d'indiquer toutes les infos
     * (message, date, sender, receiver, id)
     * La fonction récupère l'id et le gestionnaire de message
     * et renvoie a la vu l'objet message
     * @Route("/{numero}/{auhasard}", methods={"GET"}, name="message_show")
     */
    public function show(MessageRepository $messageRepository, $numero, $auhasard)
    {

        $message = $messageRepository->find($numero);
        return $this->render('message/show.html.twig',
            [
                'title' => 'Mes messages',
                'message' => $message
            ]
        );

    }

    /**
     * @Route("/edit-{id}", methods={"GET", "POST"}, name="message_edit")
     */
    public function edit(Request $request, Message $message)
    {

        $form = $this->createForm(MessageType::class, $message);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($message);
            $entityManager->flush();
            return $this->redirectToRoute('message_index');
        }
        return $this->render('message/new.html.twig',
        [
            'formMessage' => $form->createView()
        ]);

    }

    /**
     * @Route("/delete-{id}", methods={"GET"}, name="message_delete")
     */
    public function delete(Message $message) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($message);
        $entityManager->flush();
        return $this->redirectToRoute('message_index');
    }

    /**
     * @Route("/bis/{id}", methods={"GET"}, name="message_show_bis")
     */
    public function showbis(Message $message)
    {
       

        return $this->render('message/show.html.twig',
            [
                'title' => 'Mes messages',
                'message' => $message
            ]
        );

    }

    /**
     * @Route("/new", methods={"GET", "POST"}, name="message_new")
     */
    public function new(Request $request)
    {

        $message = new Message();
        $message->setCreatedAt(new \DateTime());

        $form = $this->createForm(MessageType::class, $message);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($message);
            $entityManager->flush();
            return $this->redirectToRoute('message_index');
        }
        return $this->render('message/new.html.twig',
        [
            'formMessage' => $form->createView()
        ]);

    }

    
}