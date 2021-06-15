<?php

declare(strict_types=1);

namespace App\Presentation\Web\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class AdminController
{
    public function index(Environment $twig): Response
    {
        return new Response($twig->render('BackOffice/index.html.twig'));
    }
}
