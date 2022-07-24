<?php
  # delete data controller for deleting from mock data table
  class DeleteData extends CI_Controller {
    # constructor
    public function __construct() {
      parent::__construct();
      # load data model 
      $this->load->model('dataModel');
      # load url helper
      $this->load->helper('url_helper');
    }
    
    # index function for request without parameters
    public function index() {
      # set results == 200;
      $data["results"] = "200";
      # delete all data from mock_data table 
      $this->dataModel->delete_all_data();
      # present results via response
      echo json_encode($data);
    }
    
    # view function for deleting specific row by pass ID
    public function view($nID = NULL) {
      # initialize results to 200
      $data['results'] = 200;
      
      # if new ID === NULL
      if($nID === NULL) {
        # set results code to 500
        $data['results'] = 500;
      } else {
        # delete data/row by ID, store results 
        $results["results"] = $this->dataModel->delete_data($nID);
      }
      
      #present results via response
      echo json_encode($results);
    }
  }
?>