<?php

namespace App\Fields\FrontPage;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Macros\TextBlockLink;

class Intro extends Partial
{
    public function fields()
    {
        $intro = new FieldsBuilder('intro');

        $intro
            ->addGroup('intro_group', [
                'label' => ' ',
            ])

                ->addFields($this->get(TextBlockLink::class));

        return $intro;
    }
}
