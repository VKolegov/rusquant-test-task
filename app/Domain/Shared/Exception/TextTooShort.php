<?php

namespace App\Domain\Shared\Exception;

class TextTooShort extends \DomainException
{
    public function __construct(string $fieldName, int $minLength)
    {
        parent::__construct(
            trans('validation.min.string', ['attribute' => $fieldName, 'min' => $minLength])
        );
    }
}
