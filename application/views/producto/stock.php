<article>
	<section>
	 	<h1>Stock de Productos</h1>
		<?php
			if($records->num_rows() > 0){
				echo $this->table->generate($records);
				echo $this->pagination->create_links();
			}else{	
				echo "<h3>Stock vacio!!!</h3>";
			}
		?>
	</section>
</article>  	