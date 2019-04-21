 
 $(document).ready(function() {
      $("#idCat").on("change", function() {
      	   var value = $(this).val();

      	   $.ajax({
      	   	   url: "http://localhost:8080/Indusparquet/CAdminNuevoProducto/traerSubCategoria",
      	   	   type: "POST",
      	   	   data: {idCat: value},
      	   	   dataType: 'json',
      	   	   success: function(resp) {
      	   	   	   var subs = eval(resp);

                   $("#subcategoria").html('<option value="">Ninguno</option>');
      	   	   	   for (var i = 0 ; i < subs.length ; i++) { 
                        $("#subcategoria").append('<option value=' + subs[i].id + '>' + subs[i].subCategoria + '</option>');
      	   	   	   }
      	   	   }
      	   });
      });

      //Validación para la imagen 1

      $('#01').change(function() {
  
             var fileExtension = ['jpg', 'jpeg', 'png'];
                
                if ($.inArray($('#01').val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                     alert("Únicamente los siguiente formatos de archivo son aceptados: " + fileExtension.join(', '));
                     return false;
                }
        });

      //Validación para la imagen 2

      $('#02').change(function() {
  
             var fileExtension = ['jpg', 'jpeg', 'png'];
                
                if ($.inArray($('#02').val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                     alert("Únicamente los siguiente formatos de archivo son aceptados: " + fileExtension.join(', '));
                     return false;
                }
        });

      //Validación para la imagen 3

      $('#03').change(function() {
  
             var fileExtension = ['jpg', 'jpeg', 'png'];
                
                if ($.inArray($('#03').val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                     alert("Únicamente los siguiente formatos de archivo son aceptados: " + fileExtension.join(', '));
                     return false;
                }
        });

      $("#formulario-producto").on('submit', (function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                 type: 'POST',
                 url: $(this).attr('action'),
                 data: formData,
                 cache: false,
                 contentType: false,
                 processData: false,
                 dataType: 'json',
                 success: function (resp) {
                    alert(resp);
                    if (resp == "Producto registrado con éxito") {
                        location.reload();
                    }
                 }
             });
        }));

      $('.delete').click(function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
                $.ajax({
                    url: href,
                    type: 'GET',
                    data: {},
                    cache: false,
                    dataType: 'json',
                    success:function(resp) {
                        location.reload();
                    }
                 });  
         });

      //Método de las subcategorías para la edición del producto...

      var valueC = $('#categoria').val();     

      $("#categoria").on("change", function() {
           var value = $(this).val();

           $.ajax({
               url: "http://localhost:8080/Indusparquet/CAdminEdicionProducto/traerSubCategoria",
               type: "POST",
               data: {categoria: value},
               dataType: 'json',
               success: function(resp) {
                   var subs = eval(resp);

                   $("#subcategoria").html('<option value="">Ninguno</option>');
                   for (var i = 0 ; i < subs.length ; i++) { 
                        $("#subcategoria").append('<option value=' + subs[i].id + '>' + subs[i].subCategoria + '</option>');
                   }
               }
           });
      });

      $("#edicion-formulario-producto").on('submit', (function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                 type: 'POST',
                 url: $(this).attr('action'),
                 data: formData,
                 cache: false,
                 contentType: false,
                 processData: false,
                 dataType: 'json',
                 success: function (resp) {
                    alert(resp);
                    if (resp == "Los datos del producto han sido modificados con éxito") {
                        location.reload();
                    }
                 }
             });
        }));

 });