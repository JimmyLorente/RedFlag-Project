<?php
    
    $url = Ruta::ctrRuta();
    $url2 = Ruta::ctrRutaBackend();



 ?>


<!--=====================================
BREADCRUMB CARRITO DE COMPRAS
======================================-->

<div class="container-fluid well well-sm">
	
	<div class="container">
		
		<div class="row">
			
			<ul class="breadcrumb fondoBreadcrumb text-uppercase">
				
				<li><a href="<?php echo $url;  ?>">CARRITO DE COMPRAS</a></li>
				<li class="active pagActiva"><?php echo $rutas[0] ?></li>

			</ul>

		</div>

	</div>

</div>

<!--=====================================
TABLA CARRITO DE COMPRAS
======================================-->

<div class="container-fluid">

	<div class="container">

		<div class="panel panel-default">

        	<!--=====================================
			CABECERA CARRITO DE COMPRAS
			======================================-->
            <div class="panel-heading cabeceraCarrito">

               <div class="col-md-6 col-sm-7 col-xs-12 text-center">
					
					<h3>
						<small>PRODUCTO</small>
					</h3>

				</div>

                	<div class="col-md-2 col-sm-1 col-xs-0 text-center">
					
					<h3>
						<small>PRECIO</small>
					</h3>

				</div>

				<div class="col-sm-2 col-xs-0 text-center">
					
					<h3>
						<small>CANTIDAD</small>
					</h3>

				</div>

                <div class="col-sm-2 col-xs-0 text-center">
					
					<h3>
						<small>SUBTOTAL</small>
					</h3>

				</div>


            </div>

            <!--=====================================
			CUERPO CARRITO DE COMPRAS
			======================================-->
            <div class="panel-body cuerpoCarrito">

              

            </div>

            <div class="clearfix"></div>

			<hr>






        </div>

	</div>

</div>