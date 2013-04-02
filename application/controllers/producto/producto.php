<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function index()
	{
		$data['titulo'] = "Nuevo Producto";
		$this->load->view('templates/header', $data);
		$this->load->view('producto/nuevo', $data);
		$this->load->view('templates/footer', $data);
	}

	function crear(){

			//$this->load->library('form_validation');

			$config = array(
               array(
                     'field'   => 'producto', 
                     'label'   => 'Producto', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'codigo', 
                     'label'   => 'Codigo', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'categoria', 
                     'label'   => 'Categoria', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'medida', 
                     'label'   => 'Medida', 
                     'rules'   => 'required'
                  )

            );

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_message('required', 'El campo %s es requerido');
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
				$this->index();
			}
			else
			{
				$this->producto_model->new_producto();

				$parametros = array('nombreProducto' => $this->input->post('producto'),
									'codigoProducto' => $this->input->post('codigo'));
				$this->db->where($parametros);
				$query = $this->db->get('producto');

				foreach($query->result() as $v):
					$data['producto'] = $v->idProd;
					$data['nombre'] = $v->nombreProducto;
				endforeach;

				$data['titulo'] = "Aumentar Stock";
				$this->load->view('templates/header', $data);
				$this->load->view('producto/agregar', $data);
				$this->load->view('templates/footer', $data);
			}
	}

	function agregar(){

			// $this->load->library('form_validation');

			$config = array(
               array(
                     'field'   => 'preciov', 
                     'label'   => 'Precio de Venta', 
                     'rules'   => 'required|decimal'
                  ),
               array(
                     'field'   => 'precioc', 
                     'label'   => 'Precio de Compra', 
                     'rules'   => 'required|decimal'
                  ),
               array(
                     'field'   => 'cantidad', 
                     'label'   => 'Cantidad', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'lote', 
                     'label'   => 'Lote', 
                     'rules'   => 'required'
                  )

            );

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_message('required', 'El campo %s es requerido');
			$this->form_validation->set_message('decimal', 'El %s No tiene el formato correcto');
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
				$data['titulo'] = "Agregar";
				$data['nombre']= $this->input->post('nombreP');
				$data['producto']=$this->input->post('idproducto');;
				$this->load->view('templates/header', $data);
				$this->load->view('producto/agregar', $data);
				$this->load->view('templates/footer', $data);
			}
			else
			{
				$this->producto_model->add_producto();
				$data['titulo'] = "Ok";
				$this->load->view('templates/header', $data);
				$this->load->view('producto/mensaje', $data);
				$this->load->view('templates/footer', $data);	
			}
	}



	function buscador(){

		$data['titulo'] = "Buscador de Productos";
		$data['resultado'] = NULL;
		$data['mensaje'] = NULL;
		$this->load->view('templates/header', $data);
		$this->load->view('producto/buscador', $data);
		$this->load->view('templates/footer', $data);

	}


	function buscar(){

		$data['titulo'] = "Buscador de Productos";
		$data['resultado'] = $this->producto_model->buscador($this->input->post('key'));
		$this->load->view('templates/header', $data);
		$this->load->view('producto/buscador', $data);
		$this->load->view('templates/footer', $data);
	}


	function aumentar_stock(){
		$id=$this->uri->segment(4);

		$parametros = array('idProd' => $this->uri->segment(4));
		$this->db->where($parametros);
		$query = $this->db->get('producto');

		foreach($query->result() as $v):
			$data['producto'] = $v->idProd;
			$data['nombre'] = $v->nombreProducto;
		endforeach;

		$data['titulo'] = "Aumentar Stock";
		$this->load->view('templates/header', $data);
		$this->load->view('producto/agregar', $data);
		$this->load->view('templates/footer', $data);	
	}

	function stock(){
		
		$config['base_url'] = base_url()."index.php/producto/producto/stock";
		$config['total_rows'] = $this->db->get('producto')->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['num_links'] = 20;
		
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';

		$config['first_link'] = 'Primero';
		$config['last_link'] = 'Ultimo';
		
		$this->pagination->initialize($config);

		$data['titulo'] = "Stock de Productos";
		//$this->db->join();
		$this->db->select('nombreProducto,codigoProducto');
		$data['records'] = $this->db->get('producto',$config['per_page'],$this->uri->segment(4));

		$this->load->view('templates/header', $data);
		$this->load->view('producto/stock', $data);
		$this->load->view('templates/footer', $data);	
	}


}

/* End of file producto.php */
/* Location: ./application/controllers/producto/producto.php */