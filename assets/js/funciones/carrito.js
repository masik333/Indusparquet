
 $(document).ready(function() {

      var TotalValue = 0;
      var totalCarrito = $(".totalCarrito").attr("value");

          $(".precioProducto").each(function(){
          TotalValue += parseInt($(this).find('.precio').text());

      }); 

      $(".total").html("$" + TotalValue);

         $(".formulario-carrito").on('submit', (function(e) {
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

                    if (resp == "El producto ha sido añadido a su carrito de compras") {
                        totalCarrito = parseInt(totalCarrito) + 1;
                        $(".totalCarrito").text(totalCarrito); 
                    }

                    $("form").trigger("reset");
                 }
             });
        }));

      $('.delete-product').click(function(e) {
            e.preventDefault();

            var deletePrice = $(this).closest('tr').find(".precio").text();
             
            var href = $(this).attr("href");
                $.ajax({
                    url: href,
                    type: 'POST',
                    data: {},
                    cache: false,
                    dataType: 'json',
                    success:function(resp) {
                    }
            }); 

                $(".precioProducto").each(function() {
                  TotalValue = $('.total').text().replace("$", "") - parseInt(deletePrice);
                });

            $(this).closest('tr').remove();

            $(".total").html("$" + TotalValue);

            return false;   
      });
  });