<?php

declare(strict_types=1);

namespace App\Infrastructure\Views;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

final class RegisteredCompletedView
{
    /**
     * RegisterAdminView constructor.
     * @param Environment $twig
     * @param UrlGeneratorInterface $router
     */
    public function __construct(
        private Environment $twig,
        private UrlGeneratorInterface $router
    ) {
    }

    /**
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function generateView(): Response
    {
        return new Response($this->twig->render('BackOffice/registerCompleted.html.twig'));
    }
}
