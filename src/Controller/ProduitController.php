<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Produit;
use App\Form\SearchForm;
use App\Repository\ProduitRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use MercurySeries\FlashyBundle\FlashyNotifier;
use App\Form\SpudType;
class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="app_produit")
     */
    public function index(): Response
    {



        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }
    /**
     * @Route("/show", name="show")
     */
    public function affiche(PaginatorInterface $paginator, Request $request): Response
    {

        $data= new SearchData();
        $form = $this->createForm(SearchForm::class,$data);
        $form->handleRequest($request);

        $r = $this->getDoctrine()->getRepository(Produit::class);


        $donnees = $r->findSearch($data);

        $list= $paginator->paginate(
            $donnees,
            $request->query->getInt('page', 1), /*page number*/
            1 /*limit per page*/
        );
        return $this->render('front/doctor-layout-1.html.twig', ['l' => $list,
            'form'=>$form->createView()
        ]);
    }
    /**
     * @Route("/suppC/{idproduit}", name="suppC")
     *
     */
    public function suppC($idproduit): Response {
        $produit=$this->getDoctrine()->getRepository(Produit::class)->find($idproduit) ;
        $em=$this->getDoctrine()->getManager();
        $em->remove($produit);
        $em->flush();
        return $this->redirectToRoute('show');
    }
    /**
     * @Route("/addproduit" , name = "addproduit")
     */
    public function addproduit(request $request )
    {
        $produit = new Produit();
        $form = $this->createForm(SpudType::class, $produit);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();
            return $this->redirectToRoute('show');
        }
        return $this->render
        ("back/dashboard-my-listings.html.twig", ['f' => $form->createView()]);
    }
    /**
     * @Route("/showc", name="showc")
     */
    public function affichec(): Response
    {
        $r = $this->getDoctrine()->getRepository(Produit::class);
        $list = $r->findAll();
        return $this->render('back/dashboard-my-favorites.html.twig', ['l' => $list ]);
    }



}
