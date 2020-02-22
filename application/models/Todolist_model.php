<?php
class Todolist_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function todolists()
    {
        $query = $this->db->get('todolist');
        return $query->result();
    }

    public function get_todolist_by_id($id)
    {
        $query = $this->db->get_where('todolist', array('id' => $id));
        return $query->row();
    }
     
    public function createOrUpdate()
    {
        $this->load->helper('url');
        $id = $this->input->post('id');
 
        $data = array(
            'title' => $this->input->post('title'),
            'details' => $this->input->post('description')
        );
        if (empty($id)) {
            return $this->db->insert('todolist', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('todolist', $data);
        }
    }
     
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('todolist');
    }
}