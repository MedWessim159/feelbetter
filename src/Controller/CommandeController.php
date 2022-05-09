<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Panier;
use App\Entity\Produit;
use App\Repository\CommandeRepository;
use App\Repository\PanierRepository;
use Knp\Component\Pager\PaginatorInterface;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="app_commande")
     */
    public function index(): Response
    {
        return $this->render('front/contactus.html.twig', [
            'controller_name' => 'CommandeController',
        ]);
    }
    /**
     * @Route("/shown", name="shown")
     *

     */
    public function affichet( Request $request,CommandeRepository $rep): Response
    {
        $em = $this->getDoctrine()->getManager();
     //   $querys = $em->createQuery("Select n FROM App\Entity\Panier n JOIN App\Entity\Commande z WHERE z.idPanier = n.idPanier ");
     //   $result=$querys->getResult();
$result =$rep ->findAll();
        return $this->render('front/contactus.html.twig', [
            'l'=>$result
           // ,'quantite'=>$quantite
        ]);
       // $quantite=$rep->findCount();
    }

    /**
     * @Route("/addcommande/{idpanier}", name="addcommande")
     */
    public function addcommande(Request $request,$idpanier  ): Response
    {

        $commande = new Commande();
        $panier = $this->getDoctrine()->getRepository(Panier::class)->find($idpanier);
        $commande->setIdCommande($panier);

        $em = $this->getDoctrine()->getManager();
        $em->persist($commande);
        $em->flush();
        // $flashy->success('Produit Ajouté Avec Succès ');


        return $this->redirectToRoute("shown");
    }
    /**
     * @Route("/deleteinpanier/{idCommande}", name="deleteincom")
     *
     */
    public function deleteInPanier($idCommande , FlashyNotifier $flashy ): Response
    {

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'DELETE App\Entity\Commande r
               WHERE r.idpanier = '.$idCommande);

        ;
        $query->execute();
        $flashy->success('Produit Supprimé Avec Succès ');
        return $this->redirectToRoute("shown");
    }


}
