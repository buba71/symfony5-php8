<?php

declare(strict_types=1);

namespace App\Presentation\Admin\Register;

use App\Application\Admin\Register\RegisterAdminPresenter;
use App\Application\Admin\Register\RegisterAdminResponse;

final class RegisterAdminHtmlPresenter implements RegisterAdminPresenter
{
    /**
     * @var RegisterAdminHtmlViewModel
     */
    private RegisterAdminHtmlViewModel $viewModel;

    /**
     * @param RegisterAdminResponse $response
     */
    public function present(RegisterAdminResponse $response): void
    {
        $this->viewModel = new RegisterAdminHtmlViewModel();
        $this->viewModel->isAdminSaved = $response->admin() !== null;
    }

    /**
     * @return RegisterAdminHtmlViewModel
     */
    public function viewModel(): RegisterAdminHtmlViewModel
    {
        return $this->viewModel;
    }
}
