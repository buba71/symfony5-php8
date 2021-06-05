<?php

declare(strict_types=1);

namespace App\Infrastructure\Form;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

final class FormHelper
{
    /**
     * FormHelper constructor.
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(private FormFactoryInterface $formFactory)
    {
    }

    /**
     * @param Request $request
     * @param string $typeClass
     * @param array $options
     * @return mixed
     */
    public function getFormData(Request $request, string $typeClass, $options = []): mixed
    {
        $formBuilder = $this->formFactory->createBuilder($typeClass, null, $options);
        $form = $formBuilder->getForm();
        $form->handleRequest($request);

        return $form->getData();
    }
}
