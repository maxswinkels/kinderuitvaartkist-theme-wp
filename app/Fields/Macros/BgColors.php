<?php

namespace App\Fields\Macros;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class BgColors extends Partial
{
    public function fields()
    {
        $bg_colors = new FieldsBuilder('bg_colors');

        $bg_colors
            ->addSelect('bg_color', [
                'label' => 'Achtergrondkleur',
            ])
                ->addChoices(
                    ['' => 'Wit'],
                    ['bg-light-gold' => 'Licht goud'],
                );

        return $bg_colors;
    }
}
