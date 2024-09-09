<?php

namespace App\Fields\GeneralSettings;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ContactInfo extends Partial
{
    public function fields()
    {
        $contact_info = new FieldsBuilder('contact_info');

        $contact_info
            ->addGroup('contact_details', [
                'label' => ' ',
            ])
                ->addTextarea('address', [
                    'label' => 'Adres',
                    'rows' => 3,
                    'new_lines' => 'br',
                ])

                ->addText('email', [
                    'label' => 'E-mailadres'
                ])

                ->addText('phone_display', [
                    'label' => 'Telefoonnummer (weergaven)'
                ])

                ->addText('phone_raw', [
                    'label' => 'Telefoonnummer'
                ])

                ->addText('whatsapp_display', [
                    'label' => 'Whatsapp telefoonnummer'
                ])

                ->addUrl('whatsapp_link', [
                    'label' => 'Whatsapp link',
                    'instructions' => 'Gebruik https://wa.me/<nummer> waarbij het <nummer> een volledig telefoonnummer in internationaal formaat is. Laat nullen, haakjes of streepjes weg bij het toevoegen van het telefoonnummer in internationaal formaat.'
                ]);

        return $contact_info;
    }
}
