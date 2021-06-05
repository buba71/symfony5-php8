<?php

declare(strict_types=1);

namespace App\Application\Admin\Register;

use App\Domain\Model\Admin\Admin;

final class RegisterAdminResponse
{
    /**
     * @var Admin|null
     */
    private ?Admin $admin = null;

    /**
     * @param Admin $admin
     * @return Void
     */
    public function setRegisteredAdmin(Admin $admin): void
    {
        $this->admin = $admin;
    }

    /**
     * @return Admin|null
     */
    public function admin(): ?Admin
    {
        return $this->admin;
    }
}
