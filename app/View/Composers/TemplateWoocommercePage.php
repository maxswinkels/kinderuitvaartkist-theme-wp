<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\AcfFields;

class TemplateWoocommercePage extends Composer
{
    use AcfFields;

    public function with()
    {
        return [
            'fields' => (object) collect($this->fields())->toArray()
        ];
    }
}
