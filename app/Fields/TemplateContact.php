<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Page\PageHeader;
use App\Fields\Macros\Image;

class TemplateContact extends Field
{
    public function fields()
    {
        $builder = new FieldsBuilder('contact_page', [
            'title' => 'Contact pagina',
            'position' => 'acf_after_title',
            'hide_on_screen' => ['the_content', 'categories', 'tags', 'featured_image', 'author'],
        ]);

        $builder
            ->addTab('page_header', [
                'label' => 'Header',
            ])
                ->addFields($this->get(PageHeader::class))

            ->addTab('content', [
                'label' => 'Inhoud',
            ])
                ->addWysiwyg('contact_intro_content', [
                    'label' => 'Intro tekst',
                    'media_upload' => 0,
                    'toolbar' => 'simple',
                ])

                ->addTextarea('contact_form_title', [
                    'label' => 'Titel contact formulier',
                    'rows' => 2,
                    'new_lines' => 'br',
                    'instructions' => 'Om een tekst <strong>vet</strong> te maken, voeg je voor en achter de tekst een sterretje toe: *tekst*',
                ])

                ->addText('contact_form_shortcode', [
                    'label' => 'Contact form 7 code',
                    'instructions' => 'voorbeeld: <i>[contact-form-7 id="id" title="title"]</i>'
                ])

                ->addPageLink('faq_link', [
                    'label' => 'Veelgestelde vragen pagina link'
                ])

                ->addFields($this->get(Image::class))
                    ->modifyField('image', ['label'=>'Extra afbeelding']);

        $builder
            ->setLocation('page_template', '==', 'template-contact.blade.php');

        return $builder->build();
    }
}
