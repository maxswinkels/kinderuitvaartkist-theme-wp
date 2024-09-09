<?php

namespace App\Fields\FlexRows;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Macros\Image;

class Teasers extends Partial
{
    public function fields()
    {
        $teasers = new FieldsBuilder('teasers', [
            'label' => 'Teaser blokken',
            'acfe_flexible_thumbnail' => \Roots\asset('teasers.png'),
        ]);


        $teasers
            ->addRepeater('teasers', [
                'label' => 'Teasers',
                'min' => 3,
                'max' => 3,
            ])
                ->addFields($this->get(Image::class))

                ->addText('title', [
                    'label' => 'Titel',
                    'required' => 1,
                ])
                ->addTextarea('content', [
                    'label' => 'Tekst',
                    'rows' => 2,
                    'new_lines' => 'br',
                ])
                ->addLink('link', [
                    'label' => 'Pagina link',
                    'required' => 1,
                ]);

        return $teasers;
    }
}
