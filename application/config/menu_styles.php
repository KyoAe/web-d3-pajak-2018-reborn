<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Styling configuration for multi_menu
 * @author KyoAe
 * @created_at 2020 12 07
 */

$config_menu_styling['dashboard'] = array(
    'nav_tag_open'         => '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">',
    "nav_tag_close"        => '</ul>',
    "item_tag_open"        => '<li class="nav-item">', 
    "item_tag_close"       => '</li>',	
    "parent_tag_open"      => '<li class="nav-item has-treeview">',	
    "parent_tag_close"     => '</li>',	
    "item_anchor"          => '<a href="%s" class="nav-link">%s</a>',	
    "parent_anchor"        => '<a href="%s" class="nav-link">%s</a>',
    "children_tag_open"    => '<ul class="nav nav-treeview">',	
    "children_tag_close"   => '</ul>',	
    "label_tag_open"       => '<p>',	
    "label_tag_close"      => '</p>',
    "has_children_icon"    => 'right fas fa-angle-left',
    "menu_icon_prefix"     => 'nav-icon'
);

$config['menu_styles']['dashboard'] = $config_menu_styling['dashboard'];