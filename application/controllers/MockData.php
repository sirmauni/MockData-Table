<?php
  # mock data class for viewing entire data set 
  class MockData extends CI_Controller {
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
      # store mock data into data object
      $data['dataModel'] = $this->dataModel->get_data();
      # store title into data object
      $data['title'] = 'Mock Data';
      # load view for mock data while passing data to view
      $this->load->view('mockData/index', $data);
    }
    
    # view function for request with parameters
    public function view($var = NULL, $var2 = NULL, $var3 = 0)
    {
      # get data based on passed parameters
      # store results into data object 
      $data['data_item'] = $this->dataModel->get_data_like($var, $var2, $var3);
      
      # if data is not in data object 
      if(empty($data['data_item'])) 
      { 
        # get all data from mock data table 
        # store results into data object
        $data['data_item'] = $this->dataModel->get_data();  
      }
      
      # stringify and present data via response
      echo json_encode($data['data_item']);
    }
  }
?>