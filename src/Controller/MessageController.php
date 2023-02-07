<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\GestionContact;
use App\Entity\Message;
use App\Form\ContactType;

class MessageController extends AbstractController {

    #[Route('/message', name: 'message')]
    public function afficheForm(Request $request, GestionContact $gestionContact): Response {
        $message = new Message();
        $form = $this->createForm(ContactType::class, $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $gestionContact->creerContact($message);
            $gestionContact->envoieMailContact($message);
            return $this->redirectToRoute('home');
        }
        return $this->render('message/message.html.twig', [
                    'formContact' => $form->createView(),
        ]);
    }

}
