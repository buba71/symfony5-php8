<?php

declare(strict_types=1);

namespace App\Infrastructure\ParamConverter;

use App\Infrastructure\Form\FormHelper;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

final class FormToRequestConverter implements ParamConverterInterface
{
    /**
     * FormToRequestConverter constructor.
     * @param FormHelper $formHelper
     */
    public function __construct(private FormHelper $formHelper)
    {
    }

    /**
     * @param Request $request
     * @param ParamConverter $configuration
     * @return bool
     */
    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $specificRequest = $this->formHelper->getFormData($request, $configuration->getOptions()['form']);
        if ($specificRequest === null) {
            return false;
        }
        $request->attributes->set($configuration->getName(), $specificRequest);

        return true;
    }

    /**
     * @param ParamConverter $configuration
     * @return bool
     */
    public function supports(ParamConverter $configuration): bool
    {
        return !empty($configuration->getOptions()['form']) && $configuration->getName() === 'formToRequest';
    }
}
