<?php

namespace App\Fields\Product;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class RelatedProducts extends Partial
{
    public function fields()
    {
        $related_products = new FieldsBuilder('related_products');

        $related_products
            ->addTrueFalse('hide_related_products', [
                'label' => 'Verberg gerelateerde producten',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Ja',
                'ui_off_text' => 'Nee',
            ]);

        return $related_products;
    }
}
