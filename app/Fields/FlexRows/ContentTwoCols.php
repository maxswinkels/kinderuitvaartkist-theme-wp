<?php

namespace App\Fields\FlexRows;

use App\Fields\Macros\BgColors;
use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

use App\Fields\Macros\TextBlockLink;

class ContentTwoCols extends Partial
{
    public function fields()
    {
        $content_two_cols = new FieldsBuilder('content_two_cols', [
            'label' => 'Tekst (2 koloms)',
            'acfe_flexible_thumbnail' => \Roots\asset('content-two-cols.png'),
        ]);

        $content_two_cols
            ->addTab('content', [
                'label' => 'Inhoud',
                'placement' => 'top'
            ])
                ->addGroup('content_col_1', [
                    'label' => '',
                    'wrapper' => [
                        'width' => '50%',
                    ],
                ])
                    ->addFields($this->get(TextBlockLink::class))
                ->endGroup()

                ->addGroup('content_col_2', [
                    'label' => '',
                    'wrapper' => [
                        'width' => '50%',
                    ],
                ])
                    ->addFields($this->get(TextBlockLink::class))
                ->endGroup()


            ->addTab('settings', [
                'label' => 'Instellingen',
                'placement' => 'top'
            ])
                ->addFields($this->get(BgColors::class));

        return $content_two_cols;
    }
}
