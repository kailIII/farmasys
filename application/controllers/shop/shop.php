<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {

	function index(){
		if($this->input->post('key') != FALSE){

			
			$data['titulo'] ="Carrito de Compras";
			$this->load->model('producto/producto_model');

			$data['records'] = $this->producto_model->buscar($this->input->post('key'));

			$this->load->view('templates/header', $data);
			$this->load->view('shop/shop_view', $data);
			$this->load->view('templates/footer', $data);	

		}
		else{
			$data['titulo'] ="Ventas";
			$data['records'] = $this->producto_model->get_all();
			$this->load->view('templates/header', $data);
			$this->load->view('shop/shop_view', $data);
			$this->load->view('templates/footer', $data);	
		}	
	}

	

}

/* End of file shop.php */
/* Location: ./application/controllers/shop/shop.php */