<?php

namespace App\Fields\FlexRows;

use App\Fields\Macros\BgColors;
use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

use App\Fields\Macros\Image as MacrosImage;

class Image extends Partial
{
    public function fields()
    {
        $image = new FieldsBuilder('image', [
            'label' => 'Afbeelding',
            'acfe_flexible_thumbnail' => \Roots\asset('image.png'),
        ]);

        $image
            ->addTab('content', [
                'label' => 'Inhoud',
                'placement' => 'top'
            ])
                ->addFields($this->get(MacrosImage::class))

            ->addTab('settings', [
                'label' => 'Instellingen',
                'placement' => 'top'
            ])
                ->addTrueFalse('full_width', [
                    'label' => 'Volledige breedte',
                    'default_value' => false,
                ])
                ->addFields($this->get(BgColors::class));


        return $image;
    }
}
