<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Livreur;
use App\Entity\Panier;
use App\Repository\CommandeRepository;
use App\Repository\LivreurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Fungio\GoogleMap\Map;

class LivreurController extends AbstractController
{
    /**
     * @Route("/livreur", name="app_livreur")
     */
    public function index(): Response
    {
        return $this->render('front/contactus.html.twig', [
            'controller_name' => 'LivreurController',
        ]);
    }
    /**
     * @Route("/showq", name="showq")
     *

     */
    public function affichet( Request $request , LivreurRepository $rep ): Response
    {
        $em = $this->getDoctrine()->getManager();
        //   $querys = $em->createQuery("Select n FROM App\Entity\Panier n JOIN App\Entity\Commande z WHERE z.idPanier = n.idPanier ");
        //   $result=$querys->getResult();
        $result =$rep ->findAll();
        return $this->render('front/page-404.html.twig', [
            'l'=>$result
            // ,'quantite'=>$quantite
        ]);
        // $quantite=$rep->findCount();
    }

    /**
     * @Route("/addcommande/{idCommande}", name="addcommandeto")
     */
    public function addcommande(Request $request,$idCommande  ): Response
    {

        $livreur = new Commande();
        $commande = $this->getDoctrine()->getRepository(Livreur::class)->find($idCommande);
        $livreur->ssetIdLivreur($commande);

        $em = $this->getDoctrine()->getManager();
        $em->persist($livreur);
        $em->flush();
        // $flashy->success('Produit Ajouté Avec Succès ');


        return $this->redirectToRoute("showq");
    }
}
