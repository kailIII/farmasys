<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$data['titulo'] = "Inicio de farmaSYS";
		$this->load->view('templates/header', $data);
		$this->load->view('inicio');
		$this->load->view('templates/footer');
	}

}

/* End of file site.php */
/* Location: ./application/controllers/site.php */