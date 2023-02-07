<?php
namespace App\Service;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;
use App\Entity\Message;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;

class GestionContact{
    
    private EntityManagerInterface $em;
    private MailerInterface $mailer;
    
    public function __construct(EntityManagerInterface $em, MailerInterface $mailer) {
        $this->em = $em;
        $this->mailer = $mailer;
    }
    
    public function creerContact(Message $message){
        $message->setDateMessage(new DateTime());
        $this->em->persist($message);
        $this->em->flush();
    }
    
    public function envoieMailContact(Message $message){
        $email = (new TemplatedEmail())
                ->from(new Address('alex.bertin03@gmail.com','Contact Symfony'))
                ->to($message->getMail())
                ->subject("Demande de contact")
                ->text($message->getMessage())
                ->context([
                    'message' => $message,
                ]);
        $this->mailer->send($email);
    }
    
}