<?php

namespace App\Domain\Shared\Exception;

class TextTooLong extends \DomainException
{
    public function __construct(string $fieldName, int $minLength)
    {
        parent::__construct(
            trans('validation.max.string', ['attribute' => $fieldName, 'max' => $minLength])
        );
    }
}
