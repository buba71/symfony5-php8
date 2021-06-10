<?php

declare(strict_types=1);

namespace App\Presentation\Web\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

final class SecurityController
{
    /**
     * SecurityController constructor.
     * @param Environment $twig
     * @param Security $security
     * @param RouterInterface $router
     */
    public function __construct(
        private Environment $twig,
        private Security $security,
        private RouterInterface $router
    ) {
    }

    /**
     * @param AuthenticationUtils $authenticationUtils
     * @param Environment $environment
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return new Response($this->twig->render('Security/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error
        ]));
    }

    public function logout()
    {

    }
}
