<?php

declare(strict_types=1);

namespace App\Presentation\Web\Controller;

use App\Infrastructure\Views\RegisteredCompletedView;
use Symfony\Component\HttpFoundation\Response;

final class RegisterCompletedController
{
    /**
     * @param RegisteredCompletedView $view
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(RegisteredCompletedView $view): Response
    {
        return $view->generateView();
    }
}
