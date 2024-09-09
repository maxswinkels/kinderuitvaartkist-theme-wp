<?php

namespace App\Fields\FlexRows;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Accordion extends Partial
{
    public function fields()
    {
        $accordion = new FieldsBuilder('accordion', [
            'label' => 'Inklapbare teksten',
            'acfe_flexible_thumbnail' => \Roots\asset('accordion.png'),
        ]);

        $accordion
            ->addText('title', [
                'label' => 'Titel',
            ])

            ->addRepeater('items', [
                'label' => '',
                'layout' => 'row',
                'button_label' => 'Voeg een item toe',
            ])

                ->addText('label', [
                    'label' => 'Titel'
                ])

                ->addWysiwyg('content', [
                    'label' => 'Tekst',
                    'media_upload' => 0,
                    'toolbar' => 'simple',
                ])

            ->endRepeater();

        return $accordion;
    }
}
