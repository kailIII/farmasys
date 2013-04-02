<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop_cart extends CI_Controller {

	function add(){
		
		$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => $this->input->post('pedido'),
			'price'   => $this->input->post('precio'),
			'name'    => $this->input->post('name')
		);

		$this->cart->insert($data);

		redirect('shop/shop');
	}


	function update(){
		 $i = $this->input->post('cont');
		 $a = 'rowid'.$i;
		 $b = 'qty'.$i;

			$data = array(
				'rowid'   => $this->input->post($a),
				'qty'     => $this->input->post($b)
			);

			$this->cart->update($data);

		redirect('shop/shop');
	}

	function remove($id){
		$data = array(
			'rowid'      => $id,
			'qty'     => 0
		);

		$this->cart->update($data);
		redirect('shop/shop');
	}

	function destroy(){

		$this->cart->destroy();
	}

	function total(){
		echo $this->cart->total();
	}


	function venta(){
		$this->destroy();

		$data['titulo'] ="Venta Realizada";
		$this->load->view('templates/header', $data);
		$this->load->view('shop/message', $data);
		$this->load->view('templates/footer', $data);	


	}

}

/* End of file shop_cart.php */
/* Location: ./application/controllers/shop/shop_cart.php */