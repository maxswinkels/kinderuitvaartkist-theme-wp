<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class TemplateWoocommercePage extends Field
{
    public function fields()
    {
        $builder = new FieldsBuilder('template_woocommerce_page', [
            'title' => 'Woocommerce pagina',
            'position' => 'acf_after_title',
            'hide_on_screen' => ['the_content', 'categories', 'tags', 'featured_image', 'author'],
        ]);

        $builder
            ->addText('template_shortcode', [
                'label' => 'Template shortcode',
            ]);

        $builder
            ->setLocation('page_template', '==', 'template-woocommerce-page.blade.php');

        return $builder->build();
    }
}
