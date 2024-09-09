<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\FlexRows;
use App\Fields\FrontPage\Hero;
use App\Fields\FrontPage\Intro;
use App\Fields\FrontPage\Teasers;

class FrontPage extends Field
{
    public function fields()
    {
        $builder = new FieldsBuilder('front_page', [
            'title' => 'Homepagina',
            'position' => 'acf_after_title',
            'hide_on_screen' => ['the_content', 'categories', 'tags', 'featured_image', 'author'],
        ]);

        $builder
            ->addTab('hero', [
                'label' => 'Hero',
            ])
                ->addFields($this->get(Hero::class))

            ->addTab('intro', [
                'label' => 'Intro',
            ])
                ->addFields($this->get(Intro::class))

            ->addTab('content', [
                'label' => 'Flexibele rijen',
            ])
                ->addFields($this->get(FlexRows::class));

        $builder
            ->setLocation('page_type', '==', 'front_page');

        return $builder->build();
    }
}
