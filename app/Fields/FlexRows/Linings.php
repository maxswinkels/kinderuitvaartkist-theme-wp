<?php

namespace App\Fields\FlexRows;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

use App\Fields\Macros\TextBlockLink;

class Linings extends Partial
{
    public function fields()
    {
        $linings = new FieldsBuilder('linings', [
            'label' => 'Variant blokken',
            'acfe_flexible_thumbnail' => \Roots\asset('linings.png'),
        ]);

        $linings
            ->addFields($this->get(TextBlockLink::class))
                ->removeField('link')

            ->addRepeater('group', [
                'label' => 'Groep',
                'layout' => 'block',
                'button_label' => 'Voeg groep toe',
            ])

                ->addTextarea('title', [
                    'label' => 'Titel',
                    'rows' => 2,
                    'new_lines' => 'br',
                    'instructions' => 'Om een tekst <strong>vet</strong> te maken, voeg je voor en achter de tekst een sterretje toe: *tekst*',
                ])

                ->addRepeater('items', [
                    'label' => 'Items',
                    'layout' => 'table',
                    'button_label' => 'Voeg item toe',
                ])
                    ->addImage('image', [
                        'label' => 'Afbeelding',
                        'preview_size' => 'thumbnail',
                    ])
                        ->setWidth('20')
    
                    ->addText('subtitle', [
                        'label' => 'Titel',
                    ])
                        ->setWidth('20')

                    ->addTextarea('subtext', [
                        'label' => 'Tekst',
                        'rows' => 3,
                        'new_lines' => '',
                    ])
                        ->setWidth('60')

    
                ->endRepeater()

            ->endRepeater();

        return $linings;
    }
}
