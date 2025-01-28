<?php

namespace App\Enums;

enum StripPayment: string
{
    case SUCCESS   = 'https://journeyman-services.netlify.app/success';
    case FAIL      = 'https://journeyman-services.netlify.app/error';
}
