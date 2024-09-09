<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Field Type Settings
    |--------------------------------------------------------------------------
    |
    | Here you can set default field group and field type configuration that
    | is then merged with your field groups when they are composed.
    |
    | This allows you to avoid the repetitive process of setting common field
    | configuration such as `ui` on every `trueFalse` field or your
    | preferred `instruction_placement` on every `fieldGroup`.
    |
    */

    'defaults' => [
        'fieldGroup' => [
            'acfe_flexible_settings_size' => 'medium',
        ],
        'flexibleContent' => [
            'acfe_flexible_advanced' => 1,
            'acfe_flexible_stylised_button' => 1,
            'acfe_flexible_disable_ajax_title' => 1,
            'acfe_flexible_copy_paste' => 1,
            'acfe_flexible_layouts_ajax' => 1,
            'acfe_flexible_layouts_remove_collapse' => 0,
            'acfe_flexible_layouts_thumbnails' => 1,
            'acfe_flexible_title_edition' => 0,
            'acfe_flexible_toggle' => 0,
            'acfe_flexible_close_button' => 0,
            'acfe_flexible_modal_edition' => 0,
            'acfe_flexible_modal' => array(
                'acfe_flexible_modal_enabled' => '1',
                'acfe_flexible_modal_title' => '<b>Bibliotheek</b>',
                'acfe_flexible_modal_size' => 'full',
                'acfe_flexible_modal_col' => '5',
                'acfe_flexible_modal_categories' => '1',
            ),
            'acfe_flexible_layouts_state' => 'collapsed',
            'acfe_flexible_layouts_remove_collapse' => 0,
        ],
        'repeater' => [
            'layout' => 'block',
            'acfe_repeater_stylised_button' => 1
        ],
        'trueFalse' => [
            'ui' => 1
        ],
        'postObject' => [
            'ui' => 1,
            'return_format' => 'object'
        ],
        'tab' => [
            'placement' => 'left'
        ],
    ],
];
