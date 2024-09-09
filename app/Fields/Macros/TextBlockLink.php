<?php

namespace App\Fields\Macros;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class TextBlockLink extends Partial
{
    public function fields()
    {
        $text_block_link = new FieldsBuilder('text_block_link');

        $text_block_link
            ->addTextarea('title', [
                'label' => 'Titel',
                'rows' => 2,
                'new_lines' => 'br',
                'instructions' => 'Om een tekst <strong>vet</strong> te maken, voeg je voor en achter de tekst een sterretje toe: *tekst*',
            ])

            ->addWysiwyg('content', [
                'label' => 'Tekst',
                'media_upload' => 0,
                'toolbar' => 'simple',
            ])

            ->addLink('link', [
                'label' => 'Pagina link',
            ]);

        return $text_block_link;
    }
}
