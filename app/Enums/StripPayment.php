<?php

namespace App\Enums;

enum StripPayment: string
{
    case SUCCESS   = 'login';
    case FAIL      = 'home';

    public function redirectRoute(): string
    {
        return match ($this) {
            self::SUCCESS => 'http://localhost:8000/success',
            self::FAIL => 'http://localhost:8000/failure',
        };
    }
}
