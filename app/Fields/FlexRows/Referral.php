<?php

namespace App\Fields\FlexRows;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Macros\Image;
use App\Fields\Macros\TextBlockLink;

class Referral extends Partial
{
    public function fields()
    {
        $referral = new FieldsBuilder('referral', [
            'label' => 'Contact',
            'acfe_flexible_thumbnail' => \Roots\asset('referral.png'),
        ]);

        $referral
            ->addFields($this->get(Image::class))

            ->addFields($this->get(TextBlockLink::class))
                ->modifyField('content', [ 'toolbar' => 'simple_no_format',]);

        return $referral;
    }
}
