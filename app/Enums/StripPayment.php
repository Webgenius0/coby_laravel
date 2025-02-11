<?php

namespace App\Enums;

enum StripPayment: string
{
    case SUCCESS   = 'https://journeyman-services-web.netlify.app/success';
    case FAIL      = 'https://journeyman-services-web.netlify.app/error';
}
