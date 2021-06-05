<?php

declare(strict_types=1);

namespace App\Application\Admin\Register;

interface RegisterAdminPresenter
{
    /**
     * @param RegisterAdminResponse $response
     * @return void
     */
    public function present(RegisterAdminResponse $response): void;
}
