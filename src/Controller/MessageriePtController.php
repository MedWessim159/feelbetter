<?php


namespace App\Controller;

use App\Entity\Expert;
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


class MessageriePtController extends AbstractController
{

	/**
	 * @Route("/AffAction", name="AffAction")
	 */
	public function AffAction(): Response
	{
		$message = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->findAll();

		return $this->render('front/contactuspt.html.twig',
			['message' => $message]);
	}

	/**
	 * @Route("/messageriee/{idexpert}", name="app_messagerie_pt")
	 */
	public function createAction(Request $request, $idexpert)
	{
		$sid = "AC6ba42392c5152f017b72adc19b07be3b";
		$token = "a4284dfae96718806dc8112abf74193a";
		$twilio = new Client($sid, $token);
		$messag = new Messagerie();
		$messag->setDateEnvoi(new \DateTime('now'));
		$messag->setDateRecep(new \DateTime('now'));
		$messag->setIdexpert($idexpert);
		$messag->setIdpatient(10);
		$messag->setIdEnv(10);
		$messag->setIdRec($idexpert);


		$form = $this->createForm(MessagerieType::class, $messag);
		$form->handleRequest($request);

		$expert = $this->getDoctrine()->getManager()->getRepository(Expert::class)->findAll();
		$msg = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->findBy(array('idexpert' => $idexpert , 'idpatient'=>10));
		$nom = $this->getDoctrine()->getManager()->getRepository(Expert::class)->findBy(array('idexpert' => $idexpert));
		if ($form->isSubmitted() && $form->isValid()) {
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
			return $this->redirectToRoute('app_messagerie_pt', array(
				'idexpert' => $idexpert));
		}

		return $this->render('front/contactuspt.html.twig',
			['form' => $form->createView(), 'messag' => $msg, 'expert' => $expert, 'n' => $nom,
			]);
	}


	/**
	 * @Route("/removeptAction/{id}", name="suppptAction")
	 */
	public function suppptAction(Messagerie $msg): Response
	{
		$em = $this->getDoctrine()->getManager();
		$em->remove($msg);
		$em->flush();
		return $this->redirectToRoute('app_messagerie_pt', array(
			'idexpert' => $msg->getIdexpert()));
	}


	/**
	 * @Route("/modifierptAction/{id}", name="modifierptAction")
	 */
	public function modifierptAction(Request $request, $id)
	{
		$message = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->find($id);
		$message->setDateEnvoi(new \DateTime('now'));
		$message->setDateRecep(new \DateTime('now'));

		$form = $this->createForm(MessagerieType::class, $message);

		$form->handleRequest($request);
		$expert = $this->getDoctrine()->getManager()->getRepository(Expert::class)->findAll();
		$msg = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->findBy(array('idexpert' => $message->getIdexpert() ,'idpatient'=> $message->getIdpatient()));
		$nom = $this->getDoctrine()->getManager()->getRepository(Expert::class)->findBy(array('idexpert' => $id));

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->flush();

			return $this->redirectToRoute('app_messagerie_pt', array(
				'idexpert' => $message->getIdexpert()));
		}

		return $this->render('front/contactuspt.html.twig',
			['form' => $form->createView(), 'messag' => $msg, 'expert' => $expert, 'n' => $nom,
			]);
	}

	/**
	 * @Route("/listt/{id}", name="listt")
	 */

	public function listt(Request $request, $id)
	{
		// Configure Dompdf according to your needs
		$pdfOptions = new Options();
		$pdfOptions->set('defaultFont', 'Arial');


		// Instantiate Dompdf with our options
		$dompdf = new Dompdf($pdfOptions);

		$message = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->find($id);
		$msg = $this->getDoctrine()->getManager()->getRepository(Messagerie::class)->findBy(array('idexpert' => $id , 'idpatient' => 10));
		$nom=$this->getDoctrine()->getManager()->getRepository(Expert::class)->findBy(array('idexpert'=>$id));


		// Retrieve the HTML generated in our twig file
		$html = $this->renderView('front/pdf.html.twig', [
			'messag' => $msg, 'nom'=>$nom,
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
