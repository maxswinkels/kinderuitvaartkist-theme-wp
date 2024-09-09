<?php

namespace App\Fields\Macros;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Image extends Partial
{
    public function fields()
    {
        $image = new FieldsBuilder('image');

        $image
            ->addImage('image', [
                'label' => 'Afbeelding',
                'preview_size' => 'thumbnail'
            ]);

        return $image;
    }
}
