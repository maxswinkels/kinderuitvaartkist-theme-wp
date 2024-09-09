<?php

namespace App\Fields\Page;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Macros\Image;
use App\Fields\Macros\TextBlockLink;

class PageHeader extends Partial
{
    public function fields()
    {
        $page_header = new FieldsBuilder('page_header');

        $page_header
            ->addGroup('page_header_group', [
                'label' => ' ',
            ])

                ->addFields($this->get(TextBlockLink::class))
                    ->modifyField('title', ['label'=>'Alternative pagina titel'])
                    ->modifyField('content', [ 'toolbar' => 'simple_no_format',])
                    ->removeField('link')

                ->addFields($this->get(Image::class))
                    ->modifyField('image', ['label'=>'Achtergrond afbeelding']);

        return $page_header;
    }
}
