<?php

declare(strict_types=1);

namespace App\Presentation\Web\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class SecurityController
{
    public function login(Environment $environment): Response
    {
        return new Response($environment->render('Security/login.html.twig'));
    }
}
