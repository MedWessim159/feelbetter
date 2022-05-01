<?php

namespace App\Controller;

use App\Entity\Expert;
use App\Entity\Patient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExpertController extends AbstractController
{
    /**
     * @Route("/expert", name="app_expert")
     */
    public function index(): Response
    {
        $experts = $this->getDoctrine()->getManager()->getRepository(Expert::class)->findAll();
        return $this->render('expert/index.html.twig', [
            'e'=>$experts
        ]);
    }

    /**
     * @Route("/patient", name="index_patient")
     */
    public function indexPatient(): Response
    {
        $patients = $this->getDoctrine()->getManager()->getRepository(Patient::class)->findAll();
        return $this->render('Patient/index.html.twig', [
            'p'=>$patients
        ]);    
    }

     /**
     * @Route("/expert/{id}", name="remove_expert")
     */
    public function removeExpert(Expert $expert): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($expert);
        $em->flush();
        return $this->redirectToRoute('app_expert');
    }
}
