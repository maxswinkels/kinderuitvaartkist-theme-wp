<?php

namespace App\Fields\Product;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class General extends Partial
{
    public function fields()
    {
        $general = new FieldsBuilder('general');

        $general
            ->addText('product_subtitle', [
                'label' => 'Subtitel',
            ])

            ->addWysiwyg('product_description', [
                'label' => 'Algemene beschrijving',
                'media_upload' => 0,
                'toolbar' => 'simple_no_format',
            ])

            ->addTextarea('product_description_lining', [
                'label' => 'Binnenbekleding',
                'rows' => 2,
                'new_lines' => 'br',
            ])

            ->addGroup('product_internal_dimensions', [
                'label' => 'Maatvoering inwendig',
                'layout' => 'row',
                'wrapper' => [
                    'width' => '50%',
                ],
            ])
                ->addNumber('length', [
                    'label' => 'Lengte',
                    'append' => 'cm',
                ])
                ->addNumber('width', [
                    'label' => 'Breedte',
                    'append' => 'cm',
                ])
                ->addNumber('height', [
                    'label' => 'Hoogte',
                    'append' => 'cm',
                ])
            ->endGroup()

            ->addGroup('product_external_dimensions', [
                'label' => 'Maatvoering uitwendig',
                'layout' => 'row',
                'wrapper' => [
                    'width' => '50%',
                ],
            ])
                ->addNumber('length', [
                    'label' => 'Lengte',
                    'append' => 'cm',
                ])
                ->addNumber('width', [
                    'label' => 'Breedte',
                    'append' => 'cm',
                ])
                ->addNumber('height', [
                    'label' => 'Hoogte',
                    'append' => 'cm',
                ])
            ->endGroup()

            ->addRepeater('product_extra_descriptions', [
                'label' => 'Extra beschrijvingen',
                'layout' => 'row',
                'button_label' => 'Voeg extra beschrijvingen toe',
            ])
                ->addText('label', [
                    'label' => 'Label'
                ])

                ->addWysiwyg('text', [
                    'label' => 'Text',
                    'media_upload' => 0,
                    'toolbar' => 'simple_no_format',
                ])

            ->endRepeater();

        return $general;
    }
}
