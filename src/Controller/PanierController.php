<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Entity\Produit;
use Knp\Component\Pager\PaginatorInterface;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Component\HttpFoundation\RequestStack;
use MercurySeries\FlashyBundle\MercurySeriesFlashyBundle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Repository\ProduitRepository;
use App\Repository\PanierRepository;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="app_panier")
     */
    public function index(): Response
    {
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
        ]);
    }
    /**
     * @Route("/showg", name="showg")
     *

     */
    public function affiche(PaginatorInterface $paginator, Request $request,PanierRepository $rep): Response
    {
        $em = $this->getDoctrine()->getManager();
         $query = $em->createQuery("Select e FROM App\Entity\Produit e JOIN App\Entity\Panier r WHERE r.idproduit = e.idproduit ");
        //$r = $this->getDoctrine()->getRepository(Panier::class);
        //$list = $r->findAll();
        //return $this->render('front/blog-grid.html.twig', ['l' => $list ]);

        $result=$query->getResult();


        $quantite=$rep->findCount();

//        $list= $paginator->paginate(
//            $result,
//            $request->query->getInt('page', 1), /*page number*/
//            1 /*limit per page*/
//        );
        return $this->render('front/blog-grid.html.twig', [
            'l'=>$result,
            'quantite'=>$quantite
        ]);
    }


    /**
     * @Route("/addpanier/{idproduit}", name="addpanier")
     */
    public function addpanier(Request $request,$idproduit  , FlashyNotifier $flashy): Response
    {

        $panier = new Panier();
        $produit = $this->getDoctrine()->getRepository(Produit::class)->find($idproduit);
        $panier->setIdproduit($produit);

        $em = $this->getDoctrine()->getManager();
        $em->persist($panier);
        $em->flush();
       $flashy->success('Produit Ajouté Avec Succès ');

        return $this->redirectToRoute("show");
    }


    /**
     * @Route("/deleteinpanier/{idpanier}", name="deleteinpanier")
     *
     */
    public function deleteInPanier($idpanier , FlashyNotifier $flashy ): Response
    {

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'DELETE App\Entity\Panier r
               WHERE r.idproduit = '.$idpanier);

        ;
        $query->execute();
        $flashy->success('Produit Supprimé Avec Succès ');
        return $this->redirectToRoute("showg");
    }

}
