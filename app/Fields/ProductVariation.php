<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Product\FlexRows as ProductFlexRows;
use App\Fields\Product\General;
use App\Fields\Product\RelatedProducts;
use App\Fields\Product\ProductVariants;

class ProductVariation extends Field
{
    public function fields()
    {
        $builder = new FieldsBuilder('product_variation', [
            'title' => 'Product information',
            'position' => 'acf_after_title',
            'hide_on_screen' => ['the_content', 'excerpt']
        ]);

        $builder


        $builder
        // location variation
            ->setLocation('post_type', '==', 'product');

        return $builder->build();
    }
}
