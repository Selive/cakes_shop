var cart = {
    cakes: []
};

init();

function AddToCart(cake_id){
    $.ajax({
        method: 'POST',
        url: '/api/getproduct',
        data: { id: cake_id }
      }).done(function(cake) {
        if(ExistsInCart(cake.id)){
            cart.cakes.find(c => c.id === cake.id).count++;
        } else {
            cake.count = 1;
            cart.cakes.push(cake);
        }
        UpdateCart();
      });
}

function CreateCakeRow(cake){ 
    $('<a/>', {
        class: 'dropdown-item cake',
        text: cake.name + " (x " + cake.count +") " + (cake.price * cake.count) + " руб.",
        href: '#'
    }).prependTo('.cart');
}

function UpdateCart(){
    localStorage.setItem('cart', JSON.stringify(cart));
    var count = 0;
    var price = 0;
    $('.dropdown-item.cake').remove();
    cart.cakes.forEach(cake => {
        CreateCakeRow(cake);
        $(".delete-from-cart[cake="+cake.id+"]").show();
        count += cake.count;
        price += cake.price * cake.count;
    });
    $('.count-in-cart').text(count);
    $('#cartPrice').text(price);
    $('#modalprice').val(price + " руб.");
    if(cart.cakes.length > 0){
        $('.count-in-cart').show();
        $('.empty-message').hide();
        $('.dropdown-item.btn-primary').show();
    } else {
        $('.count-in-cart').hide();
        $('.empty-message').show();
        $('.dropdown-item.btn-primary').hide();
    }
}

function ExistsInCart(cake_id){
    var c = cart.cakes.find(c => c.id === cake_id);
    if(c){
        return true;
    }
    return false;
}

function DeleteFromCart(cake_id){
    if(ExistsInCart(cake_id)){
        var c = cart.cakes.find(c => c.id === cake_id);
        if(c){
            if(c.count > 1){
                c.count--;
            }else{
                cart.cakes.splice( $.inArray(c, cart.cakes), 1 );
                $(".delete-from-cart[cake="+cake_id+"]").hide();
            }
        }
        UpdateCart();
    }
}

function CreateOrder(){
    $.ajax({
        method: 'POST',
        url: '/api/createorder',
        data: { data: GetJsonCartForm(), cart: cart.cakes }
      }).done(function(order_id) {
          $("#orderModal").modal('hide');
            alert("Ваш заказа под номером " + order_id+ " принят! Ожидайте сообщение о готовности тортиков!");
            ClearCart();
      });
}

function init(){
    if(localStorage.cart){
        cart = JSON.parse(localStorage.cart);
    }
    window.onload = function(){
        $(".add-to-cart").on("click", function(){
            var id = $(this).attr('cake');
            AddToCart(id);
        });
        $(".delete-from-cart").on("click", function(){
            var id = Number($(this).attr('cake'));
            DeleteFromCart(id);
        });
        $(".create-order").on("click", function(){
            CreateOrder();
        })
        UpdateCart();
    };   
}

function GetJsonCartForm(){
    var formdata = $("#cartForm").serializeArray();
    var data = {};
    $(formdata ).each(function(index, obj){
        data[obj.name] = obj.value;
    });
    return data;
}

function ClearCart(){
    cart.cakes = [];
    UpdateCart();
}