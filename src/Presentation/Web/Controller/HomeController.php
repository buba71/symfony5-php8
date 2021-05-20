<?php

declare(strict_types=1);

namespace App\Presentation\Web\Controller;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController
{
    public function index(Environment $environment)
    {
        return new Response($environment->render('FrontOffice/home.html.twig'));
    }


}
