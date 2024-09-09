<?php

namespace App\View\Composers\Partials;

use Roots\Acorn\View\Composer;

class IntroFrontPage extends Composer
{

    public function with()
    {
        return [
            'intro' => $this->intro(),
        ];
    }

    public function intro()
    {
        return (object) get_field('intro_group');
    }
}
