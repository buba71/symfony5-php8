<?php

declare(strict_types=1);

namespace App\Presentation\Web\Controller;

use Symfony\Component\HttpFoundation\Response;

final class AdminController
{
    public function index(): Response
    {
        return new Response('Admin space');
    }
}
