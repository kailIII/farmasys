<article>
	<section>
<h1>Agregar Productos</h1>
<?php 
$atributos = array('class' => 'buscador' , 'id' => 'buscador_producto');
echo form_open('producto/producto/buscar', $atributos); ?>
<fieldset>

<input type="text" name="key" placeholder="Buscar Producto..." value=""
onfocus="if (this.value == 'Buscar Producto...') {this.value = '';}" 
onblur="if (this.value == '') {this.value = 'Buscar Producto...';}">

<input type="submit" value="?">

</fieldset>
<?php echo form_close();
echo "</section>";
if(!empty($resultado)){
  $mensaje ="Resultado de Busqueda";
  ?>

    <section>
		<table>
			<tr>
				<th>Producto</th>
				<th>Codigo</th>
				<th>Agregar</th>
			</tr>
			<?php foreach($resultado->result() as $dato): ?>
			<tr>
				<td><?php echo $dato->nombreProducto;?> </td>
				<td><?php echo $dato->codigoProducto;?> </td>
				<td><a href="<?php base_url()?>aumentar_stock/<?php echo $dato->idProd;?>" class="add">[+]</a></td>
			</tr>
			<?php endforeach; ?>
		</table>
    </section>
  <?php }?>

</article>