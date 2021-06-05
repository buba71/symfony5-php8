<?php

declare(strict_types=1);

namespace App\Application\shared\service;

final class PassWordHash
{
    /**
     * @param string $plainPassword
     * @return string
     */
    public function hashPassword(string $plainPassword): string
    {
        return password_hash($plainPassword, PASSWORD_ARGON2I);
    }

    /**
     * @param string $plainPassword
     * @param string $hashedPassword
     * @return bool
     */
    public function isPasswordValid(string $plainPassword, string $hashedPassword): bool
    {
        return password_verify($plainPassword, $hashedPassword);
    }
}
