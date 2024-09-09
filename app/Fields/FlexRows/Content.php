<?php

namespace App\Fields\FlexRows;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Macros\TextBlockLink;
use App\Fields\Macros\BgColors;
class Content extends Partial
{
    public function fields()
    {
        $content = new FieldsBuilder('content', [
            'label' => 'Tekst',
            'acfe_flexible_thumbnail' => \Roots\asset('content.png'),
        ]);

        $content
            ->addTab('content', [
                'label' => 'Inhoud',
                'placement' => 'top'
            ])
                ->addFields($this->get(TextBlockLink::class))

            ->addTab('settings', [
                'label' => 'Instellingen',
                'placement' => 'top'
            ])
                ->addFields($this->get(BgColors::class));

        return $content;
    }
}
