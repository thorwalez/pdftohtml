<?php
/**
 * Copyright (c) 2021.
 * Created By
 * @author    Mike Hartl
 * @copyright 2021  Mike Hartl All rights reserved
 * @license   The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created   4.04.2021
 * @version   0.0.0
 */

namespace ThorWalez\WaybillCreator\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ThorWalez\WaybillCreator\Converters\PostScriptToPdfConverter;
use ThorWalez\WaybillCreator\Form\Type\Main;
use ThorWalez\WaybillCreator\Helper\RemoveFileFromList;
use ThorWalez\WaybillCreator\Mappers\RequestToModel;
use ThorWalez\WaybillCreator\Models\MainModel;
use ThorWalez\WaybillCreator\PostScripts\Creator\Insert;
use ThorWalez\WaybillCreator\Readers\TNTPostScriptReader;
use ThorWalez\WaybillCreator\Viewer\FileListViewer;
use ThorWalez\WaybillCreator\Workers\WorkerProcessRunner;
use ThorWalez\WaybillCreator\Writers\TNTPostScriptWriter;

/**
 * Class DefaultController
 * @package ThorWalez\WaybillCreator\Controller
 */
class DefaultController extends AbstractController
{

    /**
     * @return Response
     */
    public function index() : Response
    {
        return $this->render('layout/welcome.html.twig');
    }

    /**
     * @param Request         $request
     * @param LoggerInterface $logger
     * @return RedirectResponse|Response
     */
    public function create(Request $request, LoggerInterface $logger)
    {

        $workerProcess = new WorkerProcessRunner($logger, $this->container->get('session')->getFlashBag());
        $workerProcess->start();

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
                try {
                    $mapper = new RequestToModel();

                    $postRequest = $request->request->all();

                    /** @var MainModel $model */
                    $model = $mapper->map($postRequest['main']);

                    $reader = new TNTPostScriptReader();

                    $inserter = new Insert();

                    $content = $inserter->insert($reader->read(), $model);

                    $writer = new TNTPostScriptWriter();
                    $filenameWithPath = $writer->write($content);

                    $converter = new PostScriptToPdfConverter(
                        $filenameWithPath
                    );
                    $converter->convert();

                    $this->addFlash('success', 'Erfolgreich gesichert');

                    return $this->redirectToRoute('create');
                } catch (\Exception $e) {
                    $this->addFlash('error', $e->getMessage());
                }
            }
        }

        $viewer = new FileListViewer();

        return $this->render(
            'layout/tntFileFormat.html.twig',
            [
                'form' => $form->createView(),
                'fileList' => $viewer->view(),
            ]
        );
    }

    /**
     * @param Request $request
     * @return BinaryFileResponse
     */
    public function viewFile(Request $request)
    {
        try {
            $filename = $request->query->get('filename');
            $response = new BinaryFileResponse(FileListViewer::FILE_PATH.$filename);
            $response->headers->set('Content-type', 'application/pdf');

            return $response;
        }catch (\Exception $ex){
            return $this->render('error/error.html.twig');
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function removeFile(Request $request)
    {
        $filename = $request->query->get('filename');
        $helper = new RemoveFileFromList();
        $helper->remove($filename);

        return $this->redirectToRoute('create');
    }
}
