<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Search extends CI_Controller{
    protected $value;
    
    public function __construct() {
        parent::__construct();
        
        //$this->gen->checklogin();
        
        $this->genlib->ajaxOnly();
        
        $this->load->model(['transaction', 'item']);
        
        $this->load->helper('text');
        
        $this->value = $this->input->get('v', TRUE);
    }
    
  
    
    
    public function index(){
        /**
         * function will call models to do all kinds of search just to check whether there is a match for the searched value
         * in the search criteria or not. This applies only to global search
         */
        
        
        
        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
    
    
    
    
    
    public function itemSearch(){
        $data['allItems'] = $this->item->itemsearch($this->value);
        $data['sn'] = 1;
        $data['cum_total'] = $this->item->getItemsCumTotal();
        
        $json['itemsListTable'] = $data['allItems'] ? $this->load->view('items/itemslisttable', $data, TRUE) : "No match found";
        
        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
    
    
    
    
    public function transSearch(){
        $data['allTransactions'] = $this->transaction->transsearch($this->value);
        $data['sn'] = 1;
        
        $json['transTable'] = $data['allTransactions'] ? $this->load->view('transactions/transtable', $data, TRUE) : "No match found";
        
        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
    
    
   
    public function otherSearch(){
        
        
        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
    

}
