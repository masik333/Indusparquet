
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
                    if (resp == "Noticia registrada con éxito") {
                        location.reload();
                    }
                 }
             });
        }));

      $('#01').change(function() {
  
             var fileExtension = ['jpg', 'jpeg', 'png'];
                
                if ($.inArray($('#01').val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                     alert("Únicamente los siguiente formatos de archivo son aceptados: " + fileExtension.join(', '));
                     return false;
                }
        });

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
                    if (resp == "Datos de la noticia actualizada con éxito") {
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
                        //$(this).unbind('submit').submit();
                    }
                 });  
         });
 });