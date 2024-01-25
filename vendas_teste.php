<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="center-wrapper">
    <div class="content">
        <nav>
            <a href="#" class="menu">Menu</a>
            <h1 class="logo">DiveShop</h1>
            <div class="icons">
                <i class="fas fa-search"></i>
                <i class="fas fa-shopping-bag"></i><span style="margin-left: 0.3rem;">1</span>
            </div>
        </nav>
        <div class="top-bar">
            <i class="fas fa-arrow-left"></i>
            <span>Continue shopping</span>
        </div>
        <div class="bag">
            <p class="bag-head"><span style="text-transform: uppercase">Your Bag</span> - 1 item</p>
        </div>
        <div class="bag-product">
            <div class="image">
                <img src="https://www.elenanelmes.com/images/test/ui/suunto_d4i_novo_sun_front_dive_metric.png" class="product-image">
            </div>
            <div class="description">
                <p class="product-code small muted">Product code: SS022592000</p>
                <h1>Suunto D4i Novo</h1>
                <p>Sun</p>
                <p class="description-text">An easy-to-use dive computer with freedive mode and air integration.</p>
                <p style="margin-bottom: 0.5rem;">One Size</p>
                <h2>$825.00</h2>
                <div class="quantity-wrapper">
                    <div>
                        <label for="quantity" style="margin-right: 0.5rem;">Quantity:</label>
                        <select name="quantity" style="margin-bottom: 1rem;">
                            <option value disabled>Please select</option>
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <button class="btn-remove">Remove</button>
                </div>
            </div>
        </div>
        <div class="bag-total">
            <div class="subtotal">
                <p class="small">Subtotal:</p>
                <p class="small">$825.00</p>
            </div>
            <div class="delivery">
                <p class="small">Delivery (Standard - 2 working days):<br>
                    <span class="change-delivery">Change delivery method</span></p>
                <p class="small">Free</p>
            </div>
            <div class="total">
                <h3>Total:</h3>
                <h3>$825.00</h3>
            </div>
            <div class="promo-checkbox">
                <input type="checkbox" name="promo-check" checked>
                <label for="promo-check">I have a promo code</label>
            </div>
            <div class="promo-code">
                <input type="text" name="promo-checkbox" placeholder="Enter your promo code here" checked>
                <button class="apply">Apply</button>
            </div>
            <button class="btn-go-checkout">
                <i class="fas fa-lock"></i>
                <span>Go to Checkout</span>
            </button>
        </div>
        <div class="help">
            <p>Need help? Call free 01234 567 890</p>
        </div>
    </div>
</div>
<div class="bg"></div>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<style>
    @import url('https://fonts.googleapis.com/css?family=Lato:400,700|Space+Mono:700');

    * { margin: 0; padding: 0; box-sizing: border-box; }

    $font-head: "Space Mono", sans-serif;
    $font-txt: "Lato", sans-serif;
    $small: 0.8rem;
    $blue: dodgerblue;
    $violet: lighten(rebeccapurple, 20%);
    $yellow: lemonchiffon;

    html,
    body {
        height: 100%;
        font-size: 16px;
        font-weight: 400; }

    //body { padding: 0.5rem !important; }

    html,
    body,
    button,
    input[type="text"] { font-family: $font-txt;  }

    .center-wrapper {
        padding: 0.5rem;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        min-height: 100%; }

    .content {
        margin: 0 auto;
        max-width: 600px;
        border: 1px solid $yellow;
        background: white; }

    nav,
    .top-bar,
    .bag,
    .bag-total,
    .help { padding: 0.5rem 1rem; }

    nav,
    a,
    .btn-go-checkout { color: white; }

    nav {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-flow: row nowrap;
        flex-flow: row nowrap;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        background: $blue;  }

    a {
        padding: 0.2rem 0.5rem;
        border: 2px solid white;
        text-decoration: none; }

    .logo { font-family: $font-head; }

    .logo,
    button { text-transform: uppercase; }

    .fa-search,
    .fa-arrow-left,
    .fa-lock { margin-right: 1rem; }

    .top-bar,
    .bag-head::after,
    .bag-total::before { background: whitesmoke; }

    .bag-head::after,
    .bag-total::before,
    .btn-remove { display: block; }

    .bag-head::after,
    .bag-total::before,
    .description-text,
    .promo-checkbox { margin: 0.5rem 0; }

    .bag-head::after,
    .bag-total::before {
        content: "";
        width: 100%;
        height: 3px; }

    .muted { color: grey; }

    .change-delivery,
    ::placeholder,
    .product-code,
    .help { font-size: $small; }

    h1 { font-size: 1.6rem; }

    h2 { font-size: 1.4rem; }

    .image {
        width: 40%;
    img.product-image { max-width: 100%; } }

    .description {
        padding-right: 1rem;
        width: 60%; }

    select {
        padding: 0.3rem;
        width: 60px; }

    select,
    button,
    input[type="text"] { height: 40px; }

    button {
        cursor: pointer;
        width: 100px;
        background: none;
        border: 2px solid $violet;
        border-radius: 4px; }

    .quantity-wrapper {
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-flow: row wrap;
        flex-flow: row wrap;
        margin: 1rem 0 0.5rem; }

    select {
        width: 50px;
        margin-right: 1rem; }

    .bag-product,
    .quantity-wrapper,
    .subtotal,
    .delivery,
    .total,
    .promo-code {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between; }

    .subtotal,
    .delivery,
    input[type="checkbox"],
    .help { margin-bottom: 0.5rem; }

    .total { margin-bottom: 1rem; }

    button,
    .change-delivery { color: $violet; }

    input[type="text"],
    .btn-go-checkout { font-size: 1rem; }

    input[type="text"] {
        width: calc(100% - 100px - 1rem);
        padding: 0.5rem; }

    .btn-go-checkout {
        margin-top: 1rem;
        width: 100%;
        height: 40px;
        background: $violet;
        box-shadow: 0 3px 6px 2px darken(whitesmoke, 10%); }

    .help {	text-align: center; }

    html {
        background: repeating-linear-gradient(
        -45deg,
        $yellow,
        $yellow 10px,
        darken($yellow, 10%) 10px,
        darken($yellow, 10%) 20px,
        ); }
</style>