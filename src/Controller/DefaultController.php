<?php


namespace ThorWalez\PdfToHtml\Controller;


use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package ThorWalez\PdfToHtml\Controller
 */
class DefaultController
{

    public function index() : Response
    {
        $content = 'class: ' . __CLASS__;

        return new Response(
            "<html><body>$content</body></html>"
        );
    }
}