<style>
.cart {
    position: fixed;
    width: 400px;
    right: -410px;
    bottom: 0;
    height: 100vh;
    background: #fff;
    transition: all .3s ease-in-out;
    padding: 150px 30px 30px;
    z-index:99;

}

.cart.active {
    right: 0;
    transition: all .3s ease-in-out;
}

.cart>div {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 4px;
}

.addthis {
    width: 150px;
    padding: 8px;
}

.addthis.added {
    background: var(--prime);
}

.cart button.showcart{
position: absolute;
left:-46px;
top:190px;
transform:rotate(90deg);
background:#fff;
border-radius:0 0 20px 20px;
padding: 20px 10px 10px;
box-shadow:0 0.5rem 1rem rgba(0, 0, 0, 0.10)
}

.cart.active button.showcart img{
    transform:rotate(180deg);
}

.cart button.remove{
    color:var(--sec);
    font-weight:500;
    margin-left:8px;
    font-size:20px;
    position: relative;
    bottom:-3px;
}

.total-container{
    margin:10px 0px;
}
</style>

<section class="positon-relative">
    <div class="cart shadow">
        <button class="showcart"><img src="<?php echo get_template_directory_uri();?>/images/back.svg" alt="" class="img-fluid"></button>
        <div class="heads">
            <div class="text-prime fw-bold">
                Items
            </div>
            <div class="text-prime fw-bold">
                Amount
            </div>
        </div>
        <div class="total-container">
            <div class="text-prime fw-bold">
                Total Rs.
            </div>
            <div class="total text-sec fw-bold"></div>
        </div>
        <div class="justify-content-center">
            <form action="<?php echo site_url()?>/paymentprovider.php" method="POST" target="_blank">
                <input type="hidden" name="amount" class="amount-hidden">
                <button type="submit" class="btn-prime">Proceed to Pay</button>
            </form>
        </div>
    </div>
</section>

<script>
jQuery(document).ready(function($) {
    let cart = $('.cart');
    let totalElement = $('.total');
    let cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];

    function updateCart() {
        let total = 0;
        $('.cart .heads').nextAll('div:not(:last-child):not(.total-container):not(.showcart)').remove();
    
        cartItems.forEach(item => {
            let itemHtml = `<div class="cart-item" data-name="${item.name}">
                <div>
                    ${item.name} 
                    <button class="remove">×</button>
                </div>
                <div class="amount price">${item.amount}</div>
            </div>`;
            $('.cart .heads').after(itemHtml);
            total += parseFloat(item.amount);
        });
    
        totalElement.text(total);
        $('.amount-hidden').val(total);
        sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
    }

    $('.addthis').each(function () {
        let name = $(this).data('name');
        if (cartItems.some(item => item.name === name)) {
            $(this).addClass('added').text('ADDED');
        }
    });

    $('.addthis').click(function () {
        let name = $(this).data('name');
        let amount = $(this).data('amount');
    
        if ($(this).hasClass('added')) {
            cart.addClass('active');
        } else {
            cartItems.push({ name, amount });
            $(this).addClass('added').text('ADDED');
            sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
            updateCart();
            cart.addClass('active');
        }
    });

    updateCart();
    if (cartItems.length > 0) {
        cart.addClass('active');
    }

    $(document).on('click', '.cart-item .remove', function () {
        let name = $(this).closest('.cart-item').data('name');
        cartItems = cartItems.filter(item => item.name !== name);
        sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
        $(`.addthis[data-name='${name}']`).removeClass('added').text('ADD');
        updateCart();
    });

    $('.showcart').click(function() {
        cart.toggleClass('active');
    });
});
</script>