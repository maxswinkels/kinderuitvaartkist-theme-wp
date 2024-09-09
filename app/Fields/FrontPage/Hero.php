<?php

namespace App\Fields\FrontPage;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Hero extends Partial
{
    public function fields()
    {
        $hero = new FieldsBuilder('hero');

        $hero
            ->addGroup('hero_group', [
                'label' => ' ',
            ])

                ->addTextarea('title', [
                    'label' => 'Titel',
                    'rows' => 2,
                    'new_lines' => 'br',
                    'instructions' => 'Om een tekst <strong>vet</strong> te maken, voeg je voor en achter de tekst een sterretje toe: *tekst*',
                ])

                ->addImage('background_image', [
                    'label' => 'Achtergrond afbeelding',
                    'preview_size' => 'thumbnail'
                ])
                    ->conditional('has_video', '==', '0')

                ->addTrueFalse('has_video', [
                    'label' => 'Video achtergrond',
                    'default_value' => 0,
                    'ui' => 1,
                    'ui_on_text' => 'Ja',
                    'ui_off_text' => 'Nee',
                ])

                ->addUrl('video', [
                    'label' => 'Video url',
                    'instructions' => 'De video werkt alleen bij een link naar een video bestand (.mp4), een link naar een youtube of vimeo video wordt niet ondersteund.',
                ])
                    ->conditional('has_video', '==', '1')

                ->addImage('video_poster', [
                    'label' => 'Video thumbnail',
                    'instructions' => 'Deze afbeelding wordt weergegeven voordat de video is ingeladen.',
                    'preview_size' => 'thumbnail'
                ])
                    ->conditional('has_video', '==', '1');

        return $hero;
    }
}
