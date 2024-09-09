<?php

namespace App\View\Composers\Woocommerce;

use Roots\Acorn\View\Composer;

class ContentProduct extends Composer
{

    public function with()
    {
        return [
            'product_subtitle' => $this->product_subtitle(),
        ];
    }

    public function product_subtitle() {
       return get_field('product_subtitle');
    }
}
