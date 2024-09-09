<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    protected static $views = [
        '*',
    ];

    public function with()
    {
        return [
            'page_title' => $this->title(),
            'contact_details' => $this->contact_details(),
            'shop_settings' => $this->shop_settings(),
        ];
    }

    public function title()
    {
        if(is_product_category()) {
            $alternative_title = get_field('alternative_title', get_queried_object());

            if($alternative_title) {
                return $alternative_title;
            }

            return html_entity_decode(get_the_archive_title());
        }
        else if (is_archive()) {
            return html_entity_decode(get_the_archive_title());
        }
        else if (is_404()) {
            return __('Pgina niet gevonden!', 'van-wijk');
        }
        return html_entity_decode(get_the_title());
    }

    public function contact_details()
    {
        return (object) get_field('contact_details', 'options') ?: null;
    }

    public function shop_settings()
    {
        return (object) get_field('shop_settings', 'options') ?: null;
    }
}
