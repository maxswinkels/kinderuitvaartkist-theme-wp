<?php

namespace App\Fields\FlexRows;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class CategoryHighlights extends Partial
{
    public function fields()
    {
        $categoryhighlights = new FieldsBuilder('category_highlights', [
            'label' => 'Uitgelichte categorieën',
            'acfe_flexible_thumbnail' => \Roots\asset('product-highlights.png'),
        ]);

        $categoryhighlights
            ->addTextarea('title', [
                'label' => 'Titel',
                'rows' => 2,
                'new_lines' => 'br',
                'instructions' => 'Om een tekst <strong>vet</strong> te maken, voeg je voor en achter de tekst een sterretje toe: *tekst*',
            ])

            ->addLink('assortment_link', [
                'label' => 'Link naar assortiment',
            ]);

        return $categoryhighlights;
    }
}
