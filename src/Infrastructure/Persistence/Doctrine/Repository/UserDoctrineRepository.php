<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Model\Admin\Admin;
use App\Domain\Model\Admin\AdminRepository;
use App\Infrastructure\Persistence\Doctrine\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserDoctrineRepository extends ServiceEntityRepository implements PasswordUpgraderInterface, AdminRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function nextIdentity(): string
    {
        return Uuid::uuid4()->toString();
    }

    public function addAdmin(Admin $admin): void
    {
        $userDoctrineEntity = new User();
        $userDoctrineEntity->setEmail($admin->getEmail());
        $userDoctrineEntity->setPassword($admin->getPassword());
        $userDoctrineEntity->setRoles(['ROLE_ADMIN']);

        $this->getEntityManager()->persist($userDoctrineEntity);
        $this->getEntityManager()->flush($userDoctrineEntity);
    }

    public function getUserByEmail(string $email): ?User
    {
        $user = $this->findOneBy(['email' => $email]);
        if (!$user) {
            return null;
        }

        return $user;
    }

    public function getAllAdmins(): array
    {
        // TODO: Implement getAllAdmins() method.
    }

    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        $user->setPassword($newEncodedPassword);

        $this->getEntityManager()->flush($user);
    }
}
