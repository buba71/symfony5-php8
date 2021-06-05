<?php

declare(strict_types=1);

namespace App\Presentation\Web\Controller;

use App\Application\Admin\Register\RegisterAdmin;
use App\Application\Admin\Register\RegisterAdminRequest;
use App\Infrastructure\Views\RegisterAdminView;
use App\Presentation\Admin\Register\RegisterAdminHtmlPresenter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CreateAdminController
{
    /**
     * @param Request $request
     * @param RegisterAdmin $useCase
     * @param RegisterAdminView $view
     * @param RegisterAdminHtmlPresenter $presenter
     * @param $formToRequest
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * @ParamConverter("formToRequest", options={"form": "App\Infrastructure\Form\RegisterAdminType"})
     */
    public function __invoke(
        Request $request,
        RegisterAdmin $useCase,
        RegisterAdminView $view,
        RegisterAdminHtmlPresenter $presenter,
        RegisterAdminRequest $formToRequest
    ): Response {
        $registerAdminRequest = new RegisterAdminRequest();
        $useCase->execute($formToRequest, $presenter);

        return $view->generateView($registerAdminRequest, $presenter->viewModel());
    }
}
