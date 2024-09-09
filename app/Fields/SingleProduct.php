<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Product\FlexRows as ProductFlexRows;
use App\Fields\Product\General;
use App\Fields\Product\RelatedProducts;
use App\Fields\Product\ProductVariants;

class SingleProduct extends Field
{
    public function fields()
    {
        $builder = new FieldsBuilder('single_product', [
            'title' => 'Product information',
            'position' => 'acf_after_title',
            'hide_on_screen' => ['the_content', 'excerpt']
        ]);

        $builder
            ->addTab('general', [
                'label' => 'Algemeen',
            ])
                ->addFields($this->get(General::class))

            ->addTab('product_variants', [
                'label' => 'Varianten',
            ])
                ->addFields($this->get(ProductVariants::class))

            ->addTab('content', [
                'label' => 'Flexibele rijen',
            ])
                ->addFields($this->get(ProductFlexRows::class))

            ->addTab('related_products', [
                'label' => 'Gerelateerde producten',
            ])
                ->addFields($this->get(RelatedProducts::class));

        $builder
            ->setLocation('post_type', '==', 'product');

        return $builder->build();
    }
}
