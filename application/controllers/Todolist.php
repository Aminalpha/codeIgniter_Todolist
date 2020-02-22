<?php

class Todolist extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('todolist_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['todolists'] = $this->todolist_model->todolists();
        //print_r($data);die();
        $this->load->view('index', $data);
    }

    public function add()
    {
        //$data['title'] = 'Create Todolist';
        $this->load->view('add', $data);
    }
     
    public function edit($id)
    {
        $id = $this->uri->segment(3, 3);
        $data = array();
 
        if (empty($id))
        { 
         show_404();
        }else{
          $data['todolist'] = $this->todolist_model->get_todolist_by_id($id);
          $this->load->view('edit', $data);
        }
    }

    public function store()
    {
 
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
 
        $id = $this->input->post('id');
 
        if ($this->form_validation->run() === FALSE)
        {  
            if(empty($id)){
              redirect( base_url('todolist/add') ); 
            }else{
             redirect( base_url('todolist/edit/'.$id) ); 
            }
        }
        else
        {
            $data['todolist'] = $this->todolist_model->createOrUpdate();
            redirect( base_url() ); 
        }
         
    }
     
     
    public function delete()
    {
        $id = $this->uri->segment(3);
         
        if (empty($id))
        {
            show_404();
        }
                 
        $todolist = $this->todolist_model->delete($id);
         
        redirect( base_url('todolist') );        
    }
    
}