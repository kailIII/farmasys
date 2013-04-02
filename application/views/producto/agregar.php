<article>
	<section>
		
		<h1>Agregar <?php echo $nombre;?></h1>
		<?php 
			$atributos = array('class' => 'stock', );
			echo form_open('producto/producto/agregar', $atributos); ?>
		<fieldset>
		<label for="precio_compra">Pre. Compra:</label>
		<input type="text" name="precioc" placeholder="Precio de Compra" value="<?php echo set_value('precioc')?>">
		<input type="hidden" name="nombreP" value="<?php echo $nombre;?>">
		<?php echo form_error('precioc'); ?>

		<label for="precio_venta">Pre. Venta:</label>
		<input type="text" name="preciov" placeholder="Precio de Venta" value="<?php echo set_value('preciov')?>">
		<?php echo form_error('preciov'); ?>

		<label for="cantidad">Cantidad:</label>
		<input type="text" name="cantidad" placeholder="Cantidad Comprada" value="<?php echo set_value('cantidad')?>">
		<?php echo form_error('cantidad'); ?>

		<label for="fechaVencimiento">Vencimiento:</label>
		<input type="date" name="fechav" placeholder="Fecha Vencimiento" value="<?php echo set_value('fechav')?>">
		<?php echo form_error('fechav'); ?>

		<label for="lore">Nro. Lote:</label>
		<input type="text" name="lote" placeholder="Numero de Lote" value="<?php echo set_value('lote')?>">
		<?php echo form_error('lote'); ?>
		<input type="hidden" name="idproducto" value="<?php echo $producto;?>">
		</fieldset>
		<input type="submit" value="Agregar Stock">
		<?php echo form_close(); ?>

	</section>
</article>