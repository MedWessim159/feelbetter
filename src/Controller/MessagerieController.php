<?php

namespace App\Controller;

use App\Entity\Messagerie;
use App\Entity\Patient;
use App\Form\MessagerieType;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Knp\Bundle\SnappyBundle\Snappy\Response\JpegResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Snappy\Image;
use Twilio\Rest\Client;
use Knp\Snappy\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;



class MessagerieController extends AbstractController
{

	/**
	 * @Route("/AffAction", name="AffAction")
	 */
	public function AffAction():Response
	{
		$message = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->findAll();

		return $this->render('front/contactus.html.twig',
			[ 'message' => $message]);
	}

	/**
	 * @Route("/messagerie/{idpatient}", name="app_messagerie")
	 */
		public function createAction (Request $request ,$idpatient)
	{
		$sid    = "AC6ba42392c5152f017b72adc19b07be3b";
		$token  = "a4284dfae96718806dc8112abf74193a";
		$twilio = new Client($sid, $token);
		$messag = new Messagerie();
		$messag->setDateEnvoi(new \DateTime('now'));
		$messag->setDateRecep(new \DateTime('now'));
		$messag->setIdexpert(1);
		$messag->setIdpatient($idpatient);
		$messag->setIdEnv(1);
		$messag->setIdRec($idpatient);



		$form = $this->createForm(MessagerieType::class,$messag);
		$form->handleRequest($request);

		$patient = $this->getDoctrine()->getManager()->getRepository(Patient::class)->findAll();
		$msg = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->findBy(array('idpatient'=>$idpatient,'idexpert'=>1));
        $nom = $this->getDoctrine()->getManager()->getRepository(Patient::class)->findBy(array('idPatient'=>$idpatient));
		if($form->isSubmitted() && $form->isValid())
		{
			$em = $this->getDoctrine()->getManager();
			$em->persist($form->getData());
			$em->flush();
			##	$message = $twilio->messages
			##	->create("+21697746500", // to
			##		array(
			##				"messagingServiceSid" => "MG074b930eca5067c6ba0c435b3d810f40",
			##			"body" => "Vous avez reçu un nouveau message vérifiez votre messagerie"
			##		)
			##	);
		    ##	print($message->sid);
			return $this->redirectToRoute('app_messagerie', array(
				'idpatient' => $idpatient )) ;
		}

		return $this->render('front/contactus.html.twig',
			 [ 'form' => $form->createView(),'messag' => $msg ,'patient'=>$patient , 'n' =>$nom ,
			 ]);
	}


	/**
	 * @Route("/removeAction/{id}", name="suppAction")
	 */
	public function suppAction(Messagerie $msg):Response
	{
		$em = $this->getDoctrine()->getManager();
		$em->remove($msg);
		$em->flush();
		return $this->redirectToRoute('app_messagerie', array(
			'idpatient' => $msg->getIdpatient() )) ;
	}



	/**
	 * @Route("/modifierAction/{id}", name="modifierAction")
	 */
	public function modifierAction (Request $request,$id)
	{
		$message = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->find($id);
		$message->setDateEnvoi(new \DateTime('now'));
		$message->setDateRecep(new \DateTime('now'));

		$form = $this->createForm(MessagerieType::class,$message);

		$form->handleRequest($request);
		$patient = $this->getDoctrine()->getManager()->getRepository(Patient::class)->findAll();
		$msg = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->findBy(array('idpatient'=>$message->getIdpatient() , 'idexpert' => $message->getIdexpert()));
		$nom = $this->getDoctrine()->getManager()->getRepository(Patient::class)->findBy(array('idPatient'=>$id));
		if($form->isSubmitted() && $form->isValid())
		{
			$em = $this->getDoctrine()->getManager();
			$em->flush();

			return $this->redirectToRoute('app_messagerie', array(
				'idpatient' => $message->getIdpatient()));
		}

		return $this->render('front/contactus.html.twig',
			[ 'form' => $form->createView(),'messag' => $msg ,'patient'=>$patient , 'n' =>$nom ,
			]);
	}

	/**
	 * @Route("/list/{id}", name="list")
	 */

	public function list(Request $request ,$id){
		// Configure Dompdf according to your needs
		$pdfOptions = new Options();
		$pdfOptions->set('defaultFont', 'Arial');


		// Instantiate Dompdf with our options
		$dompdf = new Dompdf($pdfOptions);

		$message = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->find($id);
		$msg = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->findBy(array('idpatient' => $id , 'idexpert' => 1));
		$nom=$this->getDoctrine()->getManager()->getRepository(Patient::class)->findBy(array('idPatient'=>$id));


		$html = $this->renderView('front/pdf.html.twig', [
			'messag' => $msg ,  'nom' => $nom  ,
		]);

		// Load HTML to Dompdf
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
		$dompdf->setPaper('A4', 'portrait');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser (force download)
		$dompdf->stream("mypdf.pdf", [
			"Attachment" => true
		]);
	}





}
