<?php
# mock data class for inserting data into mock data table 
  class InsertData extends CI_Controller {
    # constructor
    public function __construct() {
      parent::__construct();
      # load data model 
      $this->load->model('dataModel');
      # load url helper
      $this->load->helper('url_helper');
    }
    
    # index function for request without parameters
    public function index()
    {
      # parse post data, then store results 
      $post_data = json_decode(file_get_contents("php://input"));
      # insert new id from post data into mock data table, store results 
      $data['results'] = $this->dataModel->insert_data($post_data->new_id);
      # present results via response
      echo json_encode($data);
    }
  }
?>