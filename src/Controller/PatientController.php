<?php

namespace App\Controller;

use App\Entity\Patient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class PatientController extends AbstractController
{
    /**
     * @Route("/patient", name="app_patient")
     */
    public function index(MailerInterface $mailer): Response
    
    {

        $email = (new Email())
->from('medwessim.benatallah@esprit.tn')
->to('medwessim.benatallah@esprit.tn')
//->cc('cc@example.com')
//->bcc('bcc@example.com')
//->replyTo('fabien@example.com')
//->priority(Email::PRIORITY_HIGH)
->subject('Time for Symfony Mailer!')
->text('Sending emails is fun again!')
->html('<p>See Twig integration for better HTML integration!</p>');

$mailer->send($email);

        $patients = $this->getDoctrine()->getManager()->getRepository(Patient::class)->findAll();
        return $this->render('patient/index.html.twig', [
            'p'=>$patients
        ]);
    }

    /**
     * @Route("/patient/{id}", name="remove_patient")
     */
     public function removePatient(Patient $patient): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($patient);
        $em->flush();
        return $this->redirectToRoute('app_patient');
    }
}
