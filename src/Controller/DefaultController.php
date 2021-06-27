<?php
/**
 * Copyright (c) 2021.
 * Created By
 *
 * @author    Mike Hartl
 * @copyright 2021  Mike Hartl All rights reserved
 * @license   The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created   4.04.2021
 * @version   0.0.0
 */

namespace ThorWalez\PdfToHtml\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ThorWalez\PdfToHtml\Converters\PostScriptToPdfConverter;
use ThorWalez\PdfToHtml\Form\Type\Main;
use ThorWalez\PdfToHtml\Helper\RemoveFileFromList;
use ThorWalez\PdfToHtml\Mappers\RequestToModel;
use ThorWalez\PdfToHtml\Models\MainModel;
use ThorWalez\PdfToHtml\PostScripts\Creator\Insert;
use ThorWalez\PdfToHtml\Readers\TNTPostScriptReader;
use ThorWalez\PdfToHtml\Viewer\FileListViewer;
use ThorWalez\PdfToHtml\Writers\TNTPostScriptWriter;

/**
 * Class DefaultController
 *
 * @package ThorWalez\PdfToHtml\Controller
 */
class DefaultController extends AbstractController
{

    /**
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('layout/welcome.html.twig');
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse|Response
     */
    public function create(Request $request)
    {
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
     *
     * @return BinaryFileResponse
     */
    public function viewFile(Request $request)
    {
        $filename = $request->query->get('filename');
        $response = new BinaryFileResponse(FileListViewer::FILE_PATH . $filename);
        $response->headers->set('Content-type', 'application/pdf');

        return $response;
    }

    /**
     * @param Request $request
     *
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