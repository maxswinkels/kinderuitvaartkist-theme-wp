<?php

namespace App\View\Composers\Partials;

use Roots\Acorn\View\Composer;

class HeroFrontPage extends Composer
{
    public function with()
    {
        return [
            'hero' => $this->hero(),
            'usps' => $this->usps(),
        ];
    }

    public function hero()
    {
        return (object) get_field('hero_group');
    }

    public function usps()
    {
        return (object) get_field('usps', 'option');
    }
}
