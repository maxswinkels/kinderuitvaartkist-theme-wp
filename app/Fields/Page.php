<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\FlexRows;
use App\Fields\Page\PageHeader;

class Page extends Field
{
    public function fields()
    {
        $builder = new FieldsBuilder('page', [
            'title' => 'Pagina',
            'position' => 'acf_after_title',
            'hide_on_screen' => ['the_content', 'categories', 'tags', 'featured_image', 'author'],
        ]);

        $builder
            ->addTab('page_header', [
                'label' => 'Header',
            ])
                ->addFields($this->get(PageHeader::class))

            ->addTab('content', [
                'label' => 'Flexibele rijen',
            ])
                ->addFields($this->get(FlexRows::class));

        $builder
        ->setLocation('page_template', '==', 'default')
            ->and('page_type', '!=', 'front_page')
            ->and('page_template', '!=', 'template-contact.blade.php');

        return $builder->build();
    }
}
