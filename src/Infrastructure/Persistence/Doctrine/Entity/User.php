<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class User
 * @package App\Infrastructure\Persistence\Doctrine\Entity
 * @ORM\Entity()
 */
class User implements UserInterface
{
    /**
    * @var int
    * @ORM\Id()
    * @ORM\GeneratedValue()
    * @ORM\Column(type="integer", name="id")
    */
    private int $id;

    /**
    * @var string
    * @ORM\Column(type="string", name="user_email", unique=true)
    */
    private string $email;

    /**
    * @var string
    * @ORM\Column(type="string", name="user_password")
    */
    private string $password;

    /**
    * @ORM\Column(type="json", name="user_roles")
    */
    private mixed $roles = [];

    public function getRoles()
    {
        return $this->roles;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function getUsername(): string
    {
        return $this->email;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string[] $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }
}
