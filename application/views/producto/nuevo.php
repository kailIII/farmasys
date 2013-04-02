<article>
	<section>
		<h1>Nuevo Producto</h1>

		<?php 
			$atributos = array('class' => 'producto',
								'id' => 'nuevo_producto');
			echo form_open('producto/producto/crear',$atributos);
		?>
		<fieldset>

		<label for="producto">Producto:</label>
		<input type="text" name="producto" placeholder="Nombre Producto" value="<?php echo set_value('producto')?>">
		 <?php echo form_error('producto');?>

		<label for="codigo">Codigo:</label><input type="text" name="codigo" placeholder="Codigo Producto" value="<?php echo set_value('codigo')?>">
		<?php echo form_error('codigo');?>

		<label for="categoria">Categoria:</label>
		<select name="categoria" id="categoria">
			<option value="">Seleccione Una Categoria</option>
			<?php 
				$this->db->select('idcategoria,categoria');
				$query = $this->db->get('categoria');
				foreach($query->result() as $valor): 
			?>
			<option value="<?php echo $valor->idcategoria; ?>"><?php echo $valor->categoria; ?></option>
			<?php endforeach; ?>
		</select><?php echo form_error('categoria');?>

		<label for="medida">Medida:</label>
		<select name="medida" id="medida">
			<option value="">Seleccione Una Medida</option>
			<?php 
				$this->db->select('idmedida,medida');
				$query = $this->db->get('medida');
				foreach($query->result() as $valor): ?>
			<option value="<?php echo $valor->idmedida; ?>"><?php echo $valor->medida; ?></option>
		<?php endforeach; ?>
		</select><?php echo form_error('medida');?>
		
		<label for="desc1">Descripcion</label>
		<textarea name="descripcion1" id="descripcion1" cols="30" rows="10" placeholder="Descripcion"><?php echo set_value('descripcion1')?></textarea>
		</fieldset>
		<input type="submit" value="Crear Producto">
			<?php echo form_close(); ?>
	</section>
</article>	