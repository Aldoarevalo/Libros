// JavaScript Validation For Registration Page

$('document').ready(function()
{ 		 		
		 // name validation
		  var nameregex = /^[a-z A-Z]+$/;
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 }); 
                   var valiedad = /^[0-9]+$/;
		 
		 $.validator.addMethod("valiedad", function( value, element ) {
		     return this.optional( element ) || valiedad.test( value );
		 });
                   var valicedula = /^[0-9]+$/;
		 
		 $.validator.addMethod("valicedula", function( value, element ) {
		     return this.optional( element ) || valicedula.test( value );
		 });
                 
                   var validir = /^[a-z A-Z]+$/;
		 
		 $.validator.addMethod("validir", function( value, element ) {
		     return this.optional( element ) || validir.test( value );
		 });
                 
                      var valitel = /^[0-9]+$/;
		 
		 $.validator.addMethod("valitel", function( value, element ) {
		     return this.optional( element ) || valitel.test( value );
		 });
		
		 var validemail = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || validemail.test( value );
		 });
		
		 $("#lector_form").validate({
					
		  rules:
		  {
			Nombre: {
					required: true,
					validname: true,
					minlength: 4
				},
                               Dir: {
					required: true,
					validir: true,
					minlength: 4
				},
			
                                Edad: {
					required: true,
					valiedad: true,
                                        maxlength: 3,
                                        minlength: 1
					
				},
                            
				Cedula: {
					required: true,
					 valicedula: true	
				},
                                Tel: {
                                    required: true,
				   valitel: true,	
				   minlength: 9
					
				},
                               
                                Email: {
					required: true,
					validemail: true
				}
		   },
		   messages:
		   {
			Nombre: {
					required: "Por Favor Ingrese un Nombre Para el Lector",
					validname: "El Nombre del Lector debe Contener Solo Letras y espacios",
					minlength: "El Nombre es muy corto debe contener minimo 4 caracteres"
					  },
                                          
                                     Edad: {
		                   required: "Por Favor Ingrese una Edad",
			           valiedad: "Por Favor ingrese una Edad valida",
			           minlength:"La Edad debe contener minimo 1 digitos",
                                    maxlength:"La Edad debe contener maximo 3 digitos"
					   },
				Cedula:{
					required: "Por Favor Ingrese un Numero de Documento",
					valicedula: "Por Favor Ingrese un Numero de Documento Valido"
					},
                                      
                                      
				Tel:{
					required: "Por Favor Ingrese un Numero de Telefono",
					valitel: "Debe Ingresar un Numero de Telefono valido ",
                                        minlength:"el Numero de Telefono debe contener minimo 9 digitos"
					},
                                    
                                       Email: {
					 required: "Por Favor Ingrese un Email",
					 validemail: "Debe Ingresar Un Email Valido"
					   },
                                       Dir:{
					required: "Por Favor Ingrese una Direccion",
					validir: "Debe Ingresar una Direccion Valida ",
                                        minlength:"La Direccion debe contener minimo 4 Caracteres"
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
     $('#lector_form')[0].reset();
     $('#lectorModal').modal('hide');
     $('#lector_form').ajax.reload();
					
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














