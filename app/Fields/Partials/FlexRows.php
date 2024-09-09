<?php

namespace App\Fields\Partials;

use App\Fields\FlexRows\Accordion;
use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

use App\Fields\FlexRows\Content;
use App\Fields\FlexRows\ContentImage;
use App\Fields\FlexRows\ContentImageAlt;
use App\Fields\FlexRows\Image;
use App\Fields\FlexRows\Teasers;
use App\Fields\FlexRows\BrochureForm;
use App\Fields\FlexRows\CallToAction;
use App\Fields\FlexRows\ContentTwoCols;
use App\Fields\FlexRows\Linings;
use App\Fields\FlexRows\ProductHighlights;
use App\Fields\FlexRows\Referral;
use App\Fields\FlexRows\Usps;

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
                ->addLayout($this->get(ContentTwoCols::class))
                ->addLayout($this->get(ContentImage::class))
                ->addLayout($this->get(ContentImageAlt::class))
                ->addLayout($this->get(Image::class))
                ->addLayout($this->get(Linings::class))
                ->addLayout($this->get(Teasers::class))
                ->addLayout($this->get(BrochureForm::class))
                ->addLayout($this->get(CallToAction::class))
                ->addLayout($this->get(Referral::class))
                ->addLayout($this->get(Usps::class))
                ->addLayout($this->get(Accordion::class))
                ->addLayout($this->get(ProductHighlights::class));

        return $flexRows;
    }
}
