<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Macros\Image;

class TaxonomyProductCat extends Field
{
    public function fields()
    {
        $builder = new FieldsBuilder('taxonomy_product_cat', [
            'title' => 'Categorie - extra velden',
        ]);

        $builder
            ->addFields($this->get(Image::class))
                ->modifyField('image', ['label'=>' Afbeelding pagina header'])

            ->addTextarea('alternative_title', [
                'label' => 'Alternative titel',
                'rows' => 2,
                'new_lines' => 'br',
                'instructions' => 'Om een tekst <strong>vet</strong> te maken, voeg je voor en achter de tekst een sterretje toe: *tekst*',
            ])

            ->addText('subtitle', [
                'label' => 'Subtitel',
                'instructions' => 'Wordt weergegeven onder de titel in het categorieen overzicht',
            ])

            ->addRepeater('banners', [
                'label' => 'Banners',
                'layout' => 'block',
                'instructions' => 'Extra blok die toegevoegd kan worden aan het product overzicht.',
                'button_label' => 'Voeg een banner toe',
            ])

                ->addNumber('position', [
                    'label' => 'Positie'
                ])

                ->addTextarea('title', [
                    'label' => 'Titel',
                    'rows' => 2,
                    'new_lines' => 'br',
                    'instructions' => 'Om een tekst <strong>vet</strong> te maken, voeg je voor en achter de tekst een sterretje toe: *tekst*',
                ])

                ->addImage('image', [
                    'label' => 'Afbeelding',
                    'preview_size' => 'thumbnail'
                ])

                ->addLink('link', [
                    'label' => 'Knop (url)',
                ])

            ->endRepeater();

        $builder
            ->setLocation('taxonomy', '==', 'product_cat');

        return $builder->build();
    }
}

