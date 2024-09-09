<?php

namespace App;

function boldWordFormat($text) {
	$pattern = '/(.*)\*(.*)\*(.*)/';
	$replacement = '$1<strong>$2</strong>$3';
	return preg_replace($pattern, $replacement, $text);
}

function substr_text_only($string, $limit, $end = '...')
{
   return \Illuminate\Support\Str::limit($string, $limit, $end);
}

function custom_get_nav_menu_items($menu_name) {
    $return = array();
    if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name]))
    {
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        $parent_id = 0;

        foreach((array)$menu_items as $key => $menu_item)
        {
            if($menu_item->menu_item_parent == 0)
            {
                $parent_id = $menu_item->db_id;
                $title = $menu_item->title;
                $url = $menu_item->url;
                $target = $menu_item->target;
                $order = $menu_item->menu_order;
                $classes = $menu_item->classes;

                array_push($return, [
                    "title" => $title,
                    "url" => $url,
                    "target" => $target,
                    "order" => $order,
                    "classes" => implode(" ", $classes),
                    "child" => []
                ]);
            }
            else if($menu_item->menu_item_parent == $parent_id)
            {
                $title = $menu_item->title;
                $url = $menu_item->url;
                $target = $menu_item->target;
                $order = $menu_item->menu_order;
                $classes = $menu_item->classes;

                array_push($return[count($return) - 1]["child"], [
                    "title" => $title,
                    "url" => $url,
                    "order" => $order,
                    "target" => $target,
                    "classes" => implode(" ", $classes),
                ]);
            }
            else{}
        }
    }
    return $return;
}
