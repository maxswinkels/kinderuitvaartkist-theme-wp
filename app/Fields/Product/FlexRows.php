<?php

namespace App\Fields\Product;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

use App\Fields\Product\FlexRows\Content;
use App\Fields\Product\FlexRows\ContentImage;
use App\Fields\Product\FlexRows\Image;

class FlexRows extends Partial
{
    public function fields()
    {
        $flexRows = new FieldsBuilder('flex_rows');

        $flexRows
            ->addFlexibleContent('flex_rows', [
                'label' => ' ',
                'button_label' => '<b>Rij invoegen</b>',
            ])
                ->addLayout($this->get(Content::class))
                ->addLayout($this->get(ContentImage::class))
                ->addLayout($this->get(Image::class));

        return $flexRows;
    }
}
