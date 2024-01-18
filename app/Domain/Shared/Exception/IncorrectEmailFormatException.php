<?php

namespace App\Domain\Shared\Exception;

final class IncorrectEmailFormatException extends \DomainException
{
    public function __construct()
    {
        parent::__construct('Неверный формат E-mail');

    }
}
