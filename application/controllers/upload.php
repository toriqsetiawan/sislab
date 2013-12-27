<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		if($this->session->userdata('validated') != true) redirect('e-admin');
	}

	function index()
	{
		$this->session->set_userdata('msg', '');
        $this->home();
	}

	private function home() 
	{
		$this->load->view('admin/header');
		$this->load->view('admin/upload_form', array('error' => '' , 'msg' => '' ));
		$this->load->view('admin/footer');
	}

	function do_upload()
	{
		$img = $this->session->userdata('id');
		$config['file_name'] = $img;
		$config['upload_path'] = './assets/image/';
		$config['allowed_types'] = 'jpg'; //gif|jpg|png
		$config['max_size']	= '100';
		$config['max_width']  = '400'; //1024
		$config['max_height']  = '400'; //768

		$this->load->library('upload', $config);
		$this->upload->overwrite = true;

		if ( ! $this->upload->do_upload()) {
			$error = array('error' => '<div class="alert alert-danger alert-dismissable">
				                            <h4>
				                                <center>'.$this->upload->display_errors().'</center>
				                            </h4>
				                        </div>', 
						   'msg' => "failure");

			$this->load->view('admin/header');
			$this->load->view('admin/upload_form', $error);
			$this->load->view('admin/footer');
		}
		else {
			$error = array('error' => '<div class="alert alert-success alert-dismissable">
				                            <h4>
				                                <center>Success</center>
				                            </h4>
				                        </div>',
						   'msg' => "success");

			$this->load->view('admin/header');
			$this->load->view('admin/upload_form', $error);
			$this->load->view('admin/footer');
		}
	}
}
?>