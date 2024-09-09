<?php

namespace App\Fields\FlexRows;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Macros\TextBlockLink;
use App\Fields\Macros\Image;

class CallToAction extends Partial
{
    public function fields()
    {
        $call_to_action = new FieldsBuilder('call_to_action', [
            'label' => 'Call to action',
            'acfe_flexible_thumbnail' => \Roots\asset('call-to-action.png'),
        ]);


        $call_to_action
            ->addFields($this->get(TextBlockLink::class))
                ->modifyField('content', [ 'toolbar' => 'simple_no_format',])

            ->addFields($this->get(Image::class))
                ->modifyField('image', ['label'=>'Achtergrond afbeelding']);

        return $call_to_action;
    }
}
