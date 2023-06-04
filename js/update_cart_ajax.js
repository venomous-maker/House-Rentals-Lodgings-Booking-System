$(document).ready(function(){

    $(".itemQty").on('change', function(){
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);

      $.ajax({
          url: 'action.php',
          method: 'post',
          cache: false,
          data: {qty:qty, pid:pid, pprice:pprice},
          success: function(response){
            console.log(response);
          }
      });
    });

      load_cart_item_number();

      function load_cart_item_number(){
        $.ajax({
          url: 'action.php',
          method: 'get',
          data: {cartItem:"cart_item"},
          success:function(response){
            $("#cart-item").html(response);
          }
        });
      }
});