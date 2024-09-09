<?php

namespace App\Fields\FlexRows;

use App\Fields\Macros\BgColors;
use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

use App\Fields\Macros\Image;
use App\Fields\Macros\TextBlockLink;

class ContentImage extends Partial
{
    public function fields()
    {
        $content_image = new FieldsBuilder('content_image', [
            'label' => 'Tekst met afbeelding',
            'acfe_flexible_thumbnail' => \Roots\asset('content-image.png'),
        ]);

        $content_image
            ->addTab('content', [
                'label' => 'Inhoud',
                'placement' => 'top'
            ])
                ->addFields($this->get(Image::class))

                ->addFields($this->get(TextBlockLink::class))
                    ->modifyField('content', [ 'toolbar' => 'simple_no_format',])

            ->addTab('settings', [
                'label' => 'Instellingen',
                'placement' => 'top'
            ])
                ->addFields($this->get(BgColors::class))

                ->addSelect('image_position', [
                    'label' => 'Posititie afbeelding',
                ])
                    ->addChoices(
                        ['left' => 'Links'],
                        ['right' => 'Rechts'],
                    );

        return $content_image;
    }
}
