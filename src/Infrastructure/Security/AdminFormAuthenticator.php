<?php

declare(strict_types=1);

namespace App\Infrastructure\Security;

use App\Infrastructure\Persistence\Doctrine\Repository\UserDoctrineRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\PasswordUpgradeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\PassportInterface;

final class AdminFormAuthenticator extends AbstractAuthenticator
{
    /**
     * AdminFormAuthenticator constructor.
     * @param FlashBagInterface $flashBag
     * @param UserProviderInterface $userProvider
     * @param UserDoctrineRepository $userRepository
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        private FlashBagInterface $flashBag,
        private UserProviderInterface $userProvider,
        private UserDoctrineRepository $userRepository,
        private UrlGeneratorInterface $urlGenerator
    ) {
    }

    /**
     * @param Request $request
     * @return bool|null
     */
    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'login' && $request->isMethod('POST');
    }

    /**
     * @param Request $request
     * @return PassportInterface
     */
    public function authenticate(Request $request): PassportInterface
    {
        $user = $this->userProvider->loadUserByUsername($request->request->get('email'));

        if (!$user) {
            throw new UsernameNotFoundException();
        }
        
         return new Passport(
             new UserBadge($user->getUsername()),
             new PasswordCredentials($request->request->get('password')),
             [
             new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
             new PasswordUpgradeBadge($request->request->get('password'), $this->userRepository),
                 new RememberMeBadge()
             ]
         );
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @param string $firewallName
     * @return Response|null
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $this->flashBag->add('success', 'you\'re logged in!!');
        return new RedirectResponse($this->urlGenerator->generate('admin'));
    }

    /**
     * @param Request $request
     * @param AuthenticationException $exception
     * @return Response|null
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $this->flashBag->add('error', 'Bad credentials. Try again');
        return new RedirectResponse($this->urlGenerator->generate('login'));
    }
}
