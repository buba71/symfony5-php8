<?php

declare(strict_types=1);

namespace App\Domain\Model\Admin;

interface AdminRepository
{
    /**
     * @return string
     */
    public function nextIdentity(): string;

    /**
     * @param Admin $admin
     * @return void
     */
    public function addAdmin(Admin $admin): void;

    /**
     * @return Admin[]
     */
    public function getAllAdmins(): array;
}
