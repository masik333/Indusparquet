
 $(document).ready(function() {
      $("#formulario-subcategoria").on('submit', (function(e) {
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
                    if (resp == "SubCategoría registrada con éxito") {
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
 });