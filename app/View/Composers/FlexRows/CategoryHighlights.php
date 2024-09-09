<?php

namespace App\View\Composers\FlexRows;

use Roots\Acorn\View\Composer;

class CategoryHighlights extends Composer
{
    protected static $views = [
        'flex-rows.category-highlights',
    ];

    public function with()
    {
        return [
            'categories' => $this->data(),
        ];
    }

    public function data()
    {
        $categories = get_terms([
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
        ]);

        $data = [];

        foreach ($categories as $category) {
            $data[] = [
                'term_id' => $category->term_id,
                'cat_name' => $category->name,
            ];
        }

        return $data;
    }
}
