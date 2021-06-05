<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\InMemory\Repository;

use App\Domain\Model\Admin\Admin;
use App\Domain\Model\Admin\AdminRepository;
use Ramsey\Uuid\Uuid;

class InMemoryAdminRepository implements AdminRepository
{

    /**
     * InMemoryAdminRepository constructor.
     * @param Admin[]
     */
    public function __construct(private array $admins = [])
    {
    }

    /**
     * @return string
     */
    public function nextIdentity(): string
    {
        return Uuid::uuid4()->toString();
    }

    /**
     * @param Admin $admin
     * @return void
     */
    public function addAdmin(Admin $admin): void
    {
        $this->admins[] = $admin;
    }

    /**
     * @return Admin[]
     */
    public function getAllAdmins(): array
    {
        return $this->admins;
    }
}
