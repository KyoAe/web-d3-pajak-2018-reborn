<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menus_model extends CI_Model {
    
    public $schema_get = [
        'menu_items.*'
    ];

    /**
     * Get navigation menu from menus database
     * where menu_name equals the menu to be searched
     * get based on user permission. Use $ignore_auth = true
     * to get all menu without authentication
     * @param   $menu_name  menu to be searched
     * @param   $ignore_auth    ignore authenticantion and get all nav_item
     * @return  the menu as an array
     */
    public function get_by_name($menu_name, $ignore_auth = false)
    {
        if ($ignore_auth or $this->aauth->is_admin())
        {
            return $this->db->select('*')
                            ->from('menus')
                            ->join('menu_items', 'menus.id = menu_items.menu_id')
                            ->where('menus.name', $menu_name)
                            ->get()
                            ->result_array();
        }
        else
        {
            $user_id = $this->aauth->get_user_id();
            $result = $this->db->distinct()
                            ->select($this->schema_get)
                            ->from('user_to_group')
                            ->join('perm_to_group', 'user_to_group.group_id = perm_to_group.group_id')
                            ->join('perms', 'perm_to_group.perm_id = perms.id')
                            ->join('menu_items', 'perms.name = menu_items.perm_name')
                            ->join('menus', 'menu_items.menu_id = menus.id')
                            ->where('menus.name', $menu_name)
                            ->where('user_to_group.user_id', $user_id)
                            ->get()
                            ->result_array();
            return $result;
        }
    }
}
