<?php

namespace App\Fields\Product;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ProductVariants extends Partial
{
    public function fields()
    {
        $product_variants = new FieldsBuilder('product_variants');

        $product_variants
            ->addPostObject('product_variants', [
                'label' => 'Producten',
                'instructions' => 'Volgorde kan aangepast worden door de items te verslepen.',
                'post_type' => ['product'],
                'return_format' => 'id',
                'allow_archives' => 0,
                'allow_null' => 0,
                'multiple' => 1,
            ]);

        return $product_variants;
    }
}
