<?php

namespace App\Fields\FlexRows;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

use App\Fields\Macros\Image;
use App\Fields\Macros\TextBlockLink;

class ContentImageAlt extends Partial
{
    public function fields()
    {
        $content_image_alt = new FieldsBuilder('content_image_alt', [
            'label' => 'Tekst met afbeelding (highlight)',
            'acfe_flexible_thumbnail' => \Roots\asset('content-image-alt.png'),
        ]);

        $content_image_alt
            ->addFields($this->get(Image::class))

            ->addFields($this->get(TextBlockLink::class))
                ->modifyField('content', [ 'toolbar' => 'simple_no_format',]);

        return $content_image_alt;
    }
}
