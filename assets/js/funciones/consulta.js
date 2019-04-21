  
  $(document).ready(function() {
  	   $("#formulario-consulta").on('submit', (function(e) {
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
                    /*if (resp == "El usuario ha sido registrado con éxito") {
                        location.reload();
                    }*/
                 }
             });
        }));   
  });