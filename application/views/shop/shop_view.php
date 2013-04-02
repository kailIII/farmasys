<article>
<section>
<h1>Nueva Venta</h1>
<?php 
	$atributos = array('class' => 'buscador', 
						'id' => 'form_busqueda');
	echo form_open('shop/shop', $atributos); ?>
	<fieldset>
		<input type="text" name="key" placeholder="Buscar Producto..." value=""
         onfocus="if (this.value == 'Buscar Producto...') {this.value = '';}" 
         onblur="if (this.value == '') {this.value = 'Buscar Producto...';}">
		<input type="submit" value="?">
	</fieldset>
	
	

<?php echo form_close(); 
 echo "</section>";
if ($records->num_rows() > 0 ) {?>
<section>
  	<table>
   		<tr>
   			<th>Producto</th>
   			<th>Categoria</th>
   			<th>Disponible</th>
   			<th>Precio(Bs.)</th>
   			<th>Venta</th>
   		</tr>

   		<?php 
   			$i=1;

   		    foreach($records->result() as $valor):
				$atributos = array('class' => 'stock_producto',
									  'id' => 'producto'.$i);
				echo form_open('shop/shop_cart/add', $atributos);

   	 	?>
   		<tr>
   			
   			<td><?php echo $valor->nombreProducto;?>
   				<input type="hidden" name="name" value="<?php echo $valor->nombreProducto?>" id="<?=$i?>">
   				<input type="hidden" name="id" value="<?php echo $valor->prod;?>">
   				<input type="hidden" name="codigo" value="<?php echo $valor->codigoProducto;?>">
   			</td>
   			<td><?php echo $valor->categoria?><input type="hidden" name="categoria" value="<?php echo $valor->categoria?>"></td>
   			<td><?php echo $valor->disponible?></td>
   			<td><?php echo round($valor->precio * 100)/100;?><input type="hidden" name="precio" value="<?php echo round($valor->precio * 100)/100?>"></td>
   			<td>			
   				<input type="text" name="pedido" placeholder="Venta" size="3">
   				<input type="submit" value="+" class="add">
   			</td>   			
   		</tr>
   		
   	<?php 
   		echo form_close(); 
   		$i++;
   		endforeach; 
   		
   	?>
   	</table>
   	

<?php }?>
</section>
</article>
<?php if($cart = $this->cart->contents()):?>
<aside>
		<h3>Carrito</h3>
		<table>
				<tr>
					<th>Producto</th>
					<th>Unid(Bs.)</th>
					<th>Unid(Cant)</th>
					<th>SubTotal</th>
					<th>Opciones</th>
				</tr>
				<?php
				$i=1; 
					foreach ($cart as $producto): 
						$atributos_carrito = array('class' => 'carrito' , 
											'id' => 'shopping_cart'.$i);
						echo form_open('shop/shop_cart/update', $atributos_carrito); 	

						?>

				<tr>
					<td>
						<?php echo $producto['name']; ?>

						<input type="hidden" name="rowid<?=$i?>" value="<?php echo $producto['rowid'];?>">
						<input type="hidden" name="cont" value="<?=$i?>">
					</td>
					<td><?php echo $producto['price']; ?></td>
					<td>
						<input type="text" name="qty<?=$i?>" value="<?php echo $producto['qty'];?>" size="1">
					</td>
					<td><?php echo $producto['subtotal']; ?></td>
					<td>
						<input type="submit" value="+" id="form<?=$i?>" class="add">
						<a href="<?php echo base_url()?>index.php/shop/shop_cart/remove/<?php echo $producto['rowid'];?>" class="restar">x</a>
					</td>
				</tr>
			<?php
				$i++; 
				echo form_close();
				endforeach; ?>
			<tr>
				<th colspan="4"  class="total">TOTAL</th>
				<th  class="total"><?php echo $this->cart->total();?></th>
			</tr>
			
			<tr>
				<td colspan="5">
				   <a href="<?php base_url()?>shop_cart/venta" class="add">[$]Vender</a>
			    </td>
		    </tr>
			</table>	
	  
</aside>
<?php endif; ?>