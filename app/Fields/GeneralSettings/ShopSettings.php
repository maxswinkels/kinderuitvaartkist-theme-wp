<?php

namespace App\Fields\GeneralSettings;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ShopSettings extends Partial
{
    public function fields()
    {
        $shop_settings = new FieldsBuilder('shop_settings');

        $shop_settings
            ->addGroup('shop_settings', [
                'label' => ' ',
            ])

                ->addText('filters_shortcode', [
                    'label' => 'YITH filters shortcode  - Product overzicht',
                    'instructions' => 'Voorbeeld: <i>[yith_wcan_filters slug="naam"]</i>'
                ])

                ->addLink('accordion_inner_lining_link', [
                    'label' => 'Link binnenbekleding - Product detail',
                    'instructions' => 'Deze link wordt getoond in de uitklapbare sectie "binnenbekleding" op de product detail pagina.',
                ])

                ->addLink('accordion_dimensions_link', [
                    'label' => 'Link maatvoering - Product detail',
                    'instructions' => 'Deze link wordt getoond in de uitklapbare sectie "maatvoering" op de product detail pagina.',
                ]);

        return $shop_settings;
    }
}
