<?php

namespace App\Enums;

enum PageEnum: string
{
    case AUTH               = 'login';
    case HOME               = 'home';
    case ABOUT              = 'about_us';
    case CONTACT            = 'contact_us';
    case TERMSCONDITIONS    = 'Terms & Conditions';
    case PRIVACYPOLICY      = 'Privacy Statment';
    case COMMON             = 'common';
}
