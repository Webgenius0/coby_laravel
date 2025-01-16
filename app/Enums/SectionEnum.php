<?php

namespace App\Enums;

enum SectionEnum: string
{
    const BG = 'bg_image';

    case HOME_BANNER = 'home_banner';
    case HOME_BANNERS = 'home_banners';
    case HOME_MARQUEE = 'home_marquee';
    case HOW_IT_WORK = 'how_it_work';
    case HOW_IT_WORKS = 'how_it_works';
    case FAQ = 'faq';
    case FAQS = 'faqs';
    case HOME_QOUTE = 'home_qoute';
    case TESTIMONIAL = 'testimonial';

    case ABOUT_ARTICLE_ONE = 'about_article_one';
    case ABOUT_ARTICLE_TWO = 'about_article_two';
    case MISSION_VISSION = 'mission_vission';
    case CORE_VALUE = 'core_value';
    case CORE_VALUES = 'core_values';

    //Footer
    case FOOTER = 'footer';



    // Home page section
    public static function HomePage()
    {
        return [
            self::HOME_BANNER->value => ['item' => 1, 'type' => 'first'],
            self::HOME_BANNERS->value => ['item' => 3, 'type' => 'get'],
            self::HOME_MARQUEE->value => ['item' => 10, 'type' => 'get'],
            self::HOW_IT_WORK->value => ['item' => 1, 'type' => 'first'],
            self::HOW_IT_WORKS->value => ['item' => 4, 'type' => 'get'],
            self::FAQ->value => ['item' => 1, 'type' => 'first'],
            self::FAQS->value => ['item' => 10, 'type' => 'get'],
            self::HOME_QOUTE->value => ['item' => 1, 'type' => 'first'],
            self::TESTIMONIAL->value => ['item' => 10, 'type' => 'get'],
        ];

        // Check if the requested section exists
        if (! in_array(request()->section, array_keys(self::HomePage()))) {
            abort(404);
        }
    }

    public static function AboutPage()
    {
        return [
            self::ABOUT_ARTICLE_ONE->value => ['item' => 1, 'type' => 'first'],
            self::ABOUT_ARTICLE_TWO->value => ['item' => 1, 'type' => 'first'],
            self::MISSION_VISSION->value => ['item' => 2, 'type' => 'get'],
            self::CORE_VALUE->value => ['item' => 1, 'type' => 'first'],
            self::CORE_VALUES->value => ['item' => 6, 'type' => 'get'],
        ];
    }

    public static function getCommon(){
        return [
            self::FOOTER->value => ['item' => 1, 'type' => 'first'],
        ];
    }
    
}
