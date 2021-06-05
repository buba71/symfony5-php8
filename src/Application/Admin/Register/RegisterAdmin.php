<?php

declare(strict_types=1);

namespace App\Application\Admin\Register;

use App\Application\shared\service\PassWordHash;
use App\Domain\Model\Admin\Admin;
use App\Domain\Model\Admin\AdminRepository;

final class RegisterAdmin
{

    /**
     * RegisterAdmin constructor.
     * @param AdminRepository $repository
     * @param PassWordHash $passwordHasher
     */
    public function __construct(
        private AdminRepository $repository,
        private PassWordHash $passwordHasher
    ) {
    }

    /**
     * @param RegisterAdminRequest $request
     * @param RegisterAdminPresenter $presenter
     * @return void
     */
    public function execute(RegisterAdminRequest $request, RegisterAdminPresenter $presenter): void
    {
        $response = new RegisterAdminResponse();

        // Make some request validations.
        $isValid = $this->checkRequest($request);

        if ($isValid) {
            $this->saveAdmin($request, $response);
        }

        $presenter->present($response);
    }

    /**
     * @param RegisterAdminRequest $request
     * @param RegisterAdminResponse $response
     */
    public function saveAdmin(RegisterAdminRequest $request, RegisterAdminResponse $response): void
    {
        $admin = new Admin(
            $this->repository->nextIdentity(),
            $request->firstName,
            $request->lastName,
            $request->email,
            $this->passwordHasher->hashPassword($request->password)
        );
        $this->repository->addAdmin($admin);
        $response->setRegisteredAdmin($admin);
    }

    /**
     * @param RegisterAdminRequest $request
     * @return bool
     */
    public function checkRequest(RegisterAdminRequest $request): bool
    {
        // Should validate all request attributes.
        return $request->password ? true : false;
    }
}
