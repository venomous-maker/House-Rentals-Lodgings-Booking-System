$(document).ready(function(){
      $(".addItemBtn").click(function(e){
          e.preventDefault();
          var $form = $(this).closest(".form-submit");
          var pid = $form.find(".pid").val();
          var pname = $form.find(".pname").val();
          var pprice = $form.find(".pprice").val();
          var pcode = $form.find(".pcode").val();

          $.ajax({
            url: 'action.php',
            method: 'post',
            data: {pid:pid, pname:pname,pprice:pprice, pcode:pcode},
            success:function(response){
              $("#message").html(response);
              window.scrollTo(0,0);
              load_cart_item_number();
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