/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
VISUALIZAR LOS PRODUCTOS EN LA PÁGINA CARRITO DE COMPRAS
=============================================*/
if (localStorage.getItem("listaProductos") != null) {
    
    var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));

} else {

    $(".cuerpoCarrito").html('<div class="well">Aún no hay productos en el carrito de compras.</div>');
    

}

listaCarrito.forEach(funcionForEach);

function funcionForEach(item, index) { 


    $(".cuerpoCarrito").append(


        ' <div class="row itemCarrito">'+

                    '<div class="col-sm-1 col-xs-12">'+
						
						'<br>'+

					      '<center>'+
									
								'<button class="btn btn-default backColor quitarItemCarrito" idProducto="'+item.idProducto+'" peso="'+item.peso+'">'+
										
									'<i class="fa fa-times"></i>'+

									'</button>'+

							'</center>'+	

					'</div>'+

                

                    '<div class="col-sm-1 col-xs-12">'+
                            
                            '<figure>'+
                                
                                '<img src="'+item.imagen+'" class="img-thumbnail">'+

                            '</figure>'+

                    '</div>'+

                    '<div class="col-sm-4 col-xs-12">'+

                            '<br>'+

                            '<p class="tituloCarritoCompra text-left">'+item.titulo+'</p>'+

                    '</div>'+

                    '<div class="col-md-2 col-sm-1 col-xs-12">'+

                            '<br>'+

                            '<p class="precioCarritoCompra text-center">USD $<span>'+item.precio+'</span></p>'+

                    '</div>'+


                    '<div class="col-md-2 col-sm-3 col-xs-8">'+

                            '<br>'+	

                            '<div class="col-xs-8">'+

                             	'<center>'+
									
										'<input type="number" class="form-control cantidadItem" min="1" value="'+item.cantidad+'" tipo="'+item.tipo+'" precio="'+item.precio+'" idProducto="'+item.idProducto+'" item="'+index+'">'+	

									'</center>'+

                            '</div>'+

                    '</div>'+


                    '<div class="col-md-2 col-sm-1 col-xs-4 text-center">'+
                            
                            '<br>'+

                          	'<p class="subTotal'+index+' subtotales">'+
									
									'<strong>USD $<span>'+(Number(item.cantidad)*Number(item.precio))+'</span></strong>'+

								'</p>'+

                    '</div>'+

                '</div>');




   








}








/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
AGREGAR AL CARRITO
=============================================*/
$(".agregarCarrito").click(function () {


    var idProducto = $(this).attr("idProducto");
    var imagen = $(this).attr("imagen");
	var titulo = $(this).attr("titulo");
	var precio = $(this).attr("precio");
	var tipo = $(this).attr("tipo");
    var peso = $(this).attr("peso");

    agregarAlCarrito = false;


    /*=============================================
	CAPTURAR DETALLES
	=============================================*/
    if(tipo == "virtual"){

		agregarAlCarrito = true;

    } else {

        var seleccionarDetalle = $(".seleccionarDetalle");

        for (var i = 0; i < seleccionarDetalle.length; i++) { 

            if ($(seleccionarDetalle[i]).val() == "") { 

                swal({
					  title: "Debe seleccionar Talla y Color",
					  text: "",
					  type: "warning",
					  showCancelButton: false,
					  confirmButtonColor: "#DD6B55",
					  confirmButtonText: "¡Seleccionar!",
					  closeOnConfirm: false
                })
                

                return;

            } else {

                titulo = titulo + "-" + $(seleccionarDetalle[i]).val();
                
                agregarAlCarrito = true;      

            }

        }

    }


    /*=============================================
	ALMACENAR EN EL LOCALSTARGE LOS PRODUCTOS AGREGADOS AL CARRITO
	=============================================*/


    if (agregarAlCarrito) { 

        /*=============================================
		RECUPERAR ALMACENAMIENTO DEL LOCALSTORAGE
		=============================================*/

        if(localStorage.getItem("listaProductos") == null){

			listaCarrito = [];

        } else {

            var listaProductos = JSON.parse(localStorage.getItem("listaProductos"));

            for (var i = 0; i < listaProductos.length; i++) {

                if (listaProductos[i]["idProducto"] == idProducto && listaProductos[i]["tipo"] == "virtual") {


                 swal({
					  title: "El producto ya está agregado al carrito de compras",
					  text: "",
					  type: "warning",
					  showCancelButton: false,
					  confirmButtonColor: "#DD6B55",
					  confirmButtonText: "¡Volver!",
					  closeOnConfirm: false
					})

					return;
                    

                }
                
            
            }

            listaCarrito.concat(localStorage.getItem("listaProductos"));


        }


    

            listaCarrito.push({"idProducto":idProducto,
                                "imagen":imagen,
                                "titulo":titulo,
                                "precio":precio,
                                "tipo":tipo,
                                "peso":peso,
                                "cantidad": "1"});
            

            console.log(listaCarrito)

		    localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));
        




        /*=============================================
		MOSTRAR ALERTA DE QUE EL PRODUCTO YA FUE AGREGADO
		=============================================*/

		swal({
			  title: "",
			  text: "¡Se ha agregado un nuevo producto al carrito de compras!",
			  type: "success",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  cancelButtonText: "¡Continuar comprando!",
			  confirmButtonText: "¡Ir a mi carrito de compras!",
			  closeOnConfirm: false
			},
			function(isConfirm){
				if (isConfirm) {	   
					 window.location = rutaOculta+"carrito-de-compras";
				} 
		});

  
        
        
        
        
        

    }

})