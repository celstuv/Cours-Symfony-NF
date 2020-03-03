<?php

namespace App\Controller;

use App\Entity\Message;
use App\Repository\MessageRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
}