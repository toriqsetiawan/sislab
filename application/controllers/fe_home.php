<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * Description: Login controller class
 */

class Fe_home extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $this->home();
    }
    
    private function home()
    {
        $this->load->view('fe/fe-header');
        $this->load->view('fe/fe-body');
        $this->load->view('fe/fe-footer');
    }
}
?>