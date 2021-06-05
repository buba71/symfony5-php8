<?php

declare(strict_types=1);

namespace App\Application\Admin\Register;

final class RegisterAdminRequest
{
    public ?string $firstName = null;
    public ?string $lastName = null;
    public ?string $email = null;
    public ?string $password = null;
}
