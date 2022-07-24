<?php
  # post data class for updating/replacing data in mock data table  
  class PostData extends CI_Controller {
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
      $post_data["raw_json"] = json_decode(file_get_contents("php://input"));
      # update/replace data with post data, store results 
      $data['results'] = $this->dataModel->replace_data($post_data);
      # present results via response
      echo json_encode($data);
    }
  }
?>