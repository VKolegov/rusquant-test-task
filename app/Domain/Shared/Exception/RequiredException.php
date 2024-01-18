<?php

namespace App\Domain\Shared\Exception;

use DomainException;

class RequiredException extends DomainException
{
    public function __construct($fieldName)
    {
        parent::__construct(
            trans('validation.required', ['attribute' => $fieldName])
        );
    }
}
