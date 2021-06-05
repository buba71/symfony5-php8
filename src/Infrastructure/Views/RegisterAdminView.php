<?php

declare(strict_types=1);

namespace App\Infrastructure\Views;

use App\Application\Admin\Register\RegisterAdminRequest;
use App\Infrastructure\Form\RegisterAdminType;
use App\Presentation\Admin\Register\RegisterAdminHtmlViewModel;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

final class RegisterAdminView
{
    /**
     * @var FormFactoryInterface
     */
    private FormFactoryInterface $formFactory;

    /**
     * @var Environment
     */
    private Environment $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private UrlGeneratorInterface $router;

    /**
     * RegisterAdminView constructor.
     * @param Environment $twig
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $router
     */
    public function __construct(Environment $twig, FormFactoryInterface $formFactory, UrlGeneratorInterface $router)
    {
        $this->twig = $twig;
        $this->formFactory = $formFactory;
        $this->router = $router;
    }

    /**
     * @param RegisterAdminRequest $registerAdminRequest
     * @param RegisterAdminHtmlViewModel $viewModel
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function generateView(
        RegisterAdminRequest $registerAdminRequest,
        RegisterAdminHtmlViewModel $viewModel
    ): Response {
        if ($viewModel->isAdminSaved) {
            return new RedirectResponse($this->router->generate('register_completed'));
        }

        $form = $this->formFactory->createBuilder(RegisterAdminType::class, $registerAdminRequest)->getForm();

        return new Response($this->twig->render('BackOffice/createAdmin.html.twig', [
            'form' => $form->createView()
            ]));
    }
}
