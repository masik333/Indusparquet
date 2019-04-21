
 $(document).ready(function() {
 	  $("#formulario").on('submit', (function(e) {
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
                    if (resp == "El usuario ha sido registrado con éxito") {
                        location.reload();
                    }
                 }
             });
        }));

        $("#edicion-formulario").on('submit', (function(e) {
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
                    if (resp == "La clave del usuario ha sido modificada con éxito") {
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
                        alert(resp);
                        location.reload();
                    }
                 });  
         });

        $('#btn-login').on("click", function(e) {  
           e.preventDefault();
           login();
     });
           
          function login() {
          $.ajax({
               url: base_url + 'CLogin/login',
               type: $('#formulario-login').attr('method'),
               data: $('#formulario-login').serialize(),
               dataType: 'json',
               success:function(resp) {
                   if (resp == "Login Exitoso") {
                        $(this).unbind('submit').submit();
                        window.location.href = base_url + 'CAdminListadoProductos';
                     } else {
                        alert(resp);
                   }
               }
          });
          }
      });