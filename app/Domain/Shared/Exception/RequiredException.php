<?php

namespace App\Domain\Shared\Exception;

class RequiredException extends \DomainException
{
    public function __construct($fieldName)
    {
        parent::__construct(
            trans('validation.required', ['attribute' => $fieldName])
        );
    }
}
