<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menus_model extends CI_Model {
    
    /**
     * Get navigation menu from menus database
     * where menu_name equals the menu to be searched
     * @param   $menu_name  menu to be searched
     * @return  the menu
     */
    public function get_all($menu_name)
    {
        return $this->db->select('*')
                        ->from('menus')
                        ->join('menu_items', 'menus.id = menu_items.menu_id')
                        ->where('menus.name', $menu_name)
                        ->get()
                        ->result_array();
    }
}
