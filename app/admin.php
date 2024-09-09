<?php
/**
 * Custom TinyMCE setting
 */
add_filter('tiny_mce_before_init', function ($init) {

    // Text format dropdown options
	$init['block_formats'] = 'p: Lopende tekst=p; h2: Kop=h2; h3: Subkop=h3; h4: Subkop=h4;';

    // Paste text without format by default
    $init['paste_as_text'] = true;

	return $init;
});
