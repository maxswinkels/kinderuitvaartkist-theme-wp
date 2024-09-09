<?php

namespace App\View\Composers\Partials;

use Roots\Acorn\View\Composer;

class PageHeader extends Composer
{

    public function with()
    {
        return [
            'page_header' => $this->page_header(),
        ];
    }

    public function page_header()
    {
        return (object) get_field('page_header_group');
    }
}
