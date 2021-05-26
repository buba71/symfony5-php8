<?php

declare(strict_types=1);

namespace App\Presentation\Web\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class HomeController
{
    /**
     * @param Environment $environment
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index(Environment $environment): Response
    {
        return new Response($environment->render('FrontOffice/home.html.twig'));
    }
}
