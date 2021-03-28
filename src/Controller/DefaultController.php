<?php


namespace ThorWalez\PdfToHtml\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ThorWalez\PdfToHtml\Form\Type\Main;

/**
 * Class DefaultController
 * @package ThorWalez\PdfToHtml\Controller
 */
class DefaultController extends AbstractController
{

    public function index() : Response
    {
        $content = 'class: ' . __CLASS__;

        return new Response(
            "<html><body>$content</body></html>"
        );
    }

    public function create(Request $request)
    {
        $error = '';

        $form = $this->createForm(
            Main::class,
            null,
            [
                'action' => $this->generateUrl('create'),
                'method' => 'POST',

            ]
        );

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

//                /** @var PaymentRepository $repository */
//                $repository = $this->getDoctrine()->getRepository(PaymentEntity::class);
//
//                $hydrator = new PaymentHydrator();
//
//                try {
//
//                    $repository->save($hydrator->hydrate($form->getData()));
//
//                    $this->addFlash( 'success','Bankdaten wurde gespeichert');
//                }catch (OptimisticLockException $e) {
//                    $this->addFlash('error', $e->getMessage());
//                }catch (ORMException $e) {
//                    $this->addFlash('error', $e->getMessage());
//                }
            }
        }

        return $this->render('form/main.html.twig',
            [
                'form' => $form->createView(),
                'error' => $error
            ]);

    }
}