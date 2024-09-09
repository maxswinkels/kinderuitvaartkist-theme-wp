<?php

namespace App\Fields\GeneralSettings;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Usps extends Partial
{
    public function fields()
    {
        $usps = new FieldsBuilder('usps');

        $usps
            ->addRepeater('usps', [
                'label' => 'Usps',
                'layout' => 'table',
                'button_label' => 'Voeg item toe',
            ])

                ->addText('text', [
                    'label' => 'Tekst',
                ])

            ->endRepeater();

        return $usps;
    }
}
