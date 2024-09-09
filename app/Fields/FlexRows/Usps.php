<?php

namespace App\Fields\FlexRows;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

use App\Fields\Macros\TextBlockLink;

class Usps extends Partial
{
    public function fields()
    {
        $usps = new FieldsBuilder('usps', [
            'label' => 'Usps',
            'acfe_flexible_thumbnail' => \Roots\asset('usps.png'),
        ]);

        $usps
            ->addFields($this->get(TextBlockLink::class))
                ->removeField('link')

            ->addRepeater('usps', [
                'label' => 'Usps',
                'layout' => 'block',
                'button_label' => 'Voeg usp toe',
            ])
                ->addImage('icon', [
                    'label' => 'Icoon',
                    'preview_size' => 'thumbnail',
                ])
                    ->setWidth('15')

                ->addText('title', [
                    'label' => 'Titel',
                ])
                    ->setWidth('35')

                ->addTextarea('text', [
                    'label' => 'Tekst',
                ])
                    ->setWidth('50')

            ->endRepeater();

        return $usps;
    }
}
