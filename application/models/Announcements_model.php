<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Announcements_model extends CI_Model {
    
    public function get_all_announcements() {
        return $this->db->select('title, image, announcements.created_at, announcements.id, body, email, excerpt')
            ->from('announcements')
            ->join('users', 'announcements.author_id = users.id')
            ->where('announcements.deleted_at', null)
            ->order_by('created_at' ,'desc')
            ->get()->result();                          
    }

    public function get_announcement_by_id($announcement_id)
    {
        $result = $this->db->get_where('announcements', ['id' => $announcement_id])->row();
        
        if (! $result) return false;
        return ($result->deleted_at === null)? $result: false;
    }
    /**
     * Soft Delete an Announcement by id
     * This only change the delete_at field to this time
     * @params $announcement_id
     */
    public function soft_delete_by_id($announcement_id) {
        $result = $this->db->get_where('announcements', ['id' => $announcement_id])->row();

        // If announcement not found, return false
        if (! $result)
        {
            return false;
        }
        if (! $result->deleted_at)
        {
            $this->db->set('deleted_at', date('Y-m-d H:i:s'))
                    ->where('id', $announcement_id)
                    ->update('announcements');
        }
        return true;
    }
}