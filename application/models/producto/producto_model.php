<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto_model extends CI_Model {

	function new_producto(){
			$data = array(
				'nombreProducto' => ucwords($this->input->post('producto')),
				'codigoProducto' => $this->input->post('codigo'),
				'idCategoria' => $this->input->post('categoria'),
				'idMedida' => $this->input->post('medida')
			);
			return $this->db->insert('producto', $data);
	}	


	function add_producto(){
			$formato = "%Y-%m-%d";
			$data = array(
				'precioCompra' => $this->input->post('precioc'),
				'precioVenta' => $this->input->post('preciov'),
				'cantidad' => $this->input->post('cantidad'),
				'fechaCompra' => mdate($formato, time()),
				'fechaVencimiento' => mdate($formato, time()),//$this->input->post('medida'),
				'lote' => $this->input->post('lote'),
				'idProd' => $this->input->post('idproducto')
			);
			return $this->db->insert('detalle_stock', $data);
	}

	function buscar($key){

			$this->db->join('detalle_stock','detalle_stock.idProd=producto.idProd');
			$this->db->join('categoria','categoria.idcategoria=producto.idcategoria');

			$this->db->group_by('detalle_stock.idProd');

			$this->db->select('producto.idProd as prod,nombreProducto,codigoProducto,precioCompra,
							   AVG(precioVenta) as precio,SUM(cantidad) as disponible,categoria');
		
			$this->db->like('nombreProducto', $key);
			$this->db->order_by("nombreProducto", "asc");

			return $this->db->get('producto');
		
	}

	function buscador($key){
		$this->db->like('nombreProducto', $key);
		return $this->db->get('producto');
	}

	function update(){

	}

	
	function get_all(){

		$this->db->join('detalle_stock','detalle_stock.idProd=producto.idProd');
			$this->db->join('categoria','categoria.idcategoria=producto.idcategoria');

			$this->db->group_by('detalle_stock.idProd');

			$this->db->select('producto.idProd as prod,nombreProducto,codigoProducto,precioCompra,
							   AVG(precioVenta) as precio,SUM(cantidad) as disponible,categoria');

			$this->db->order_by("nombreProducto", "asc");
		

			return $this->db->get('producto');
	
	}

	

}

/* End of file producto.php */
/* Location: ./application/models/producto/producto.php */