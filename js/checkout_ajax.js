$(document).ready(function(){

      $('#placeOrder').submit(function(e){
        e.preventDefault();
        $.ajax({
          url: 'action.php',
          method:'post',
          data: $('form').serialize()+"&action=order",
          success: function(response){
            $("#order").html(response);
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