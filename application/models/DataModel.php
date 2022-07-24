<?php
  # data model for handling SQL queries
  class DataModel extends CI_Model {
    # constructor
    public function __construct()
    {
      # load database
      $this->load->database();
    }
    
    # retrieves all items from the mock_data table like column name using data
    # limit results by limit parameter 
    public function get_data_like($columnName = NULL, $data = NULL, $limit = 0) {
      # if columnName and $data not set 
      if ($columnName === NULL || $data === NULL ) {
        # get all mock data 
        $query = $this->db->get('mock_data');
        # return results 
        return $query->result_array();
      }
      
      # form SQL query with parameters
      $this->db->select('*');
      $this->db->from('mock_data');
      $this->db->like($columnName, $data, 'both');
      $this->db->limit($limit);
      $query = $this->db->get();
      
      # return query results 
      return $query->result_array();
    }
    
    // retrieves all items from the mock_data table
    public function get_data($id = FALSE) {
      # if id === false 
      if($id === FALSE)
      {
        # get all items from the mock data table 
        $query = $this->db->get('mock_data');
        
        # return query results 
        return $query->result_array();
      }
      
      # get all data from mock data table === passed id
      $query = $this->db->get_where('mock_data', array("id" => $id));
      
      # return query results
      return $query->row_array();
    }
    
    // delete all items from mock_data table
    public function delete_all_data() {
      $this->db->empty_table('mock_data');
    }
    
    // delete item by id
    public function delete_data($id = NULL) {
      # if no id passed
      if($id === NULL) {
        # return 500 status code
        return 500;
      }
      
      # delete item === passed id 
      $query = $this->db->delete('mock_data', array('id' => $id));
      
      # return 200 status code
      return 200;
    }
    
    // create new item in mock_data table
    public function insert_data($nID = NULL) {
      
      # if not id passed
      if ($nID === NULL) {
        # return 500 error code 
        return 500;
      }
      
      # data array with new ID
      $data = array(
        'id' => $nID,
        'firstName' => '',
        'lastname' => '',
        'email' => '' ,
        'gender' => '',
        'ipAddress' => '',
        'genres' => '',
        'misc' => ''
      );
      
      # insert new id data into mock data table 
      $this->db->insert('mock_data', $data);
      
      # return 200 status code
      return 200;
    }
    
    // overwrites items by id
    public function replace_data($pData = NULL)
    {
      # for each item passed as raw json 
      foreach ($pData["raw_json"] as $key => $value) {
        # create data array from data 
        $data = array(
          'id' => $value->id,
          'firstName' => $value->first_name,
          'lastname' => $value->last_name,
          'email' => $value->email ,
          'gender' => $value->gender,
          'ipAddress' => $value->ip_address,
          'genres' => $value->genres,
          'misc' => $value->misc
        );
        
        # replace item with matching id with current data
        $this->db->replace('mock_data', $data);
      }
      
      # return 200 status code
      return 200;
    }
  }
?>