<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Announcements_model extends CI_Model {
    
    public $schema_get = [
        'title',
        'image',
        'announcements.created_at',
        'announcements.id',
        'body',
        'email as author_name',
        'excerpt'
    ];

    public function get_all() {
        return $this->db->select($this->schema_get)
                        ->from('announcements')
                        ->join('users', 'announcements.author_id = users.id')
                        ->where('announcements.deleted_at', null)
                        ->order_by('created_at' ,'desc')
                        ->get()->result();
    }

    /**
     * Get an announcement by its id
     * @param $announcement_id
     * @return true if announcement found
     * @return false if announcement not found or has been deleted
     */
    public function get_by_id($announcement_id)
    {
        $result = $this->db->select($this->schema_get)
                            ->from('announcements')
                            ->join('users', 'announcements.author_id = users.id')
                            ->where('announcements.id', $announcement_id)
                            ->where('announcements.deleted_at', null)
                            ->get()->row();
        
        if (! $result) return false;
        return $result;
    }

    /**
     * Soft Delete an Announcement by id
     * This only change the delete_at field to current time of deletion
     * @param $announcement_id
     * @return true on success deletion
     * @return false if fails
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
        else
        {
            return false;
        }
        return true;
    }
}