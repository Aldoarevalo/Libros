// JavaScript Validation For Registration Page

$('document').ready(function()
{ 		 		
		 // name validation
		  var nameregex = /^[a-z A-Z-ñ-ó-í-ú-á-é-Á-É-Í-Ó-Ú]+$/;
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 }); 
                   var valicandisponible = /^[0-9]+$/;
		 
		 $.validator.addMethod("valicandisponible", function( value, element ) {
		     return this.optional( element ) || valicandisponible.test( value );
		 });
                    var valiprecio = /^[0-9]+$/;
		 
		 $.validator.addMethod("valiprecio", function( value, element ) {
		     return this.optional( element ) || valiprecio.test( value );
		 });
                   var validfac = /^[0-9]+$/;
		 
		 $.validator.addMethod("validfac", function( value, element ) {
		     return this.optional( element ) || validfac.test( value );
		 });
                 
                   var valitipo = /^[a-z A-Z]+$/;
		 
		 $.validator.addMethod("valitipo", function( value, element ) {
		     return this.optional( element ) || valitipo.test( value );
		 });
                 
                      var valicantotal = /^[0-9]+$/;
		 
		 $.validator.addMethod("valicantotal", function( value, element ) {
		     return this.optional( element ) || valicantotal.test( value );
		 });
		
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });
		
		 $("#user_form").validate({
					
		  rules:
		  {
			Nombre: {
					required: true,
					validname: true,
					minlength: 4
				},
                               Tipo: {
					required: true,
					valitipo: true,
					minlength: 4
				},
			
                                cantdisponible: {
					required: true,
					 valicandisponible: true
					
				},
                                 precio: {
					required: true,
					 valiprecio: true
					
				},
                            
				cantotal: {
					required: true,
					 valicantotal: true	
				},
                                Anio: {
                                    required: true,
				  validfac: true,	
				  maxlength: 4,
                                  minlength: 4
					
				},
                                  Autor: {
                                   required: true,
					validname: true,
					minlength: 4
					
					
					
				}
		   },
		   messages:
		   {
			Nombre: {
					required: "Por Favor Ingrese un Nombre Para el Libro",
					validname: "El Nombre del Libro debe Contener Solo Letras y espacios",
					minlength: "El Nombre es muy corto debe contener minimo 4 caracteres"
					  },
                                          
                                        Tipo: {
					required: "Por Favor Ingrese un Tipo de Libro",
					validname: "El Tipo del Libro debe Contener Solo Letras y espacios",
					minlength: "El Nombre del Tipo es muy corto debe contener minimo 4 caracteres"
					
					
					  },
			
                         cantdisponible: {
		                  required: "Por favor ingrese una cantidad para el ingreso",
			           valicandisponible: "Por Favor ingrese una cantidad valida"
					
					   },
				cantotal:{
					required: "Por favor ingrese una cantidad para existencia maxima",
					valicantotal: "Por Favor ingrese una cantidad valida"
					},
                                      
                                   precio:{
					required: "Por favor ingrese un precio para el libro",
					valiprecio: "Por Favor ingrese un precio valido"
					},   
				Anio:{
					required: "Por favor ingrese un Año",
					validfac: "Debe Ingresar un Año valido ",
                                        maxlength: "el Año debe contener maximo 4 digitos",
                                         minlength:"el Año debe contener minimo 4 digitos"
					},
                                    
                                          Autor:{
					required: "Por Favor Ingrese un Nombre Para el Autor",
					validname: "El Nombre del Autor debe Contener Solo Letras y espacios",
					minlength: "El Nombre del Autor es muy corto debe contener minimo 4 caracteres"
					}
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			  $(element).closest('.form-group').find('.help-block').html('');
		   },
		 
		   		submitHandler: function(form){
				  if(confirm("Confirma Que Desea Grabar los Datos?")) 	 
					 alert(data).data;
     $('#user_form')[0].reset();
     $('#userModal').modal('hide');
     $('#user_form').ajax.reload();
					
				}
				
				/*submitHandler: function() 
							   { 
							   		alert("Submitted!");
									$("#register-form").resetForm(); 
							   }*/
		   
		   }); 
		   
		   
		   /*function submitForm(){
			 
			   
			   /*$('#message').slideDown(200, function(){
				   
				   $('#message').delay(3000).slideUp(100);
				   $("#register-form")[0].reset();
				   $(element).closest('.form-group').find("error").removeClass("has-success");
				    
			   });
			   
			   alert('form submitted...');
			   $("#register-form").resetForm();
			      
		   }*/
});














