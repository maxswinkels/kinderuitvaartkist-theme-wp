<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\GeneralSettings\ContactInfo;
use App\Fields\GeneralSettings\ShopSettings;
use App\Fields\GeneralSettings\Usps;

class GeneralSettings extends Field
{
    public function fields()
    {
        $builder = new FieldsBuilder('general_settings', [
            'title' => 'Algemene instellingen',
        ]);

        $builder
            ->addTab('contact_info_tab', [
                'label' => 'Contact gegevens',
                'placement' => 'left'
            ])
                ->addFields($this->get(ContactInfo::class))

            ->addTab('shop_setting', [
                'label' => 'Shop instellingen',
                'placement' => 'left'
            ])
                ->addFields($this->get(ShopSettings::class))

            ->addTab('usps', [
                'label' => 'Usps',
                'placement' => 'left'
            ])
                ->addFields($this->get(Usps::class));

        $builder
            ->setLocation('options_page', '==', 'general-settings');

        return $builder->build();
    }
}
