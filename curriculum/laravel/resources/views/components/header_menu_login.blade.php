<section class="section">
    <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease"
        role="banner" class="navbar w-nav">
        <div class="w-container">
            <a href="#" class="w-nav-brand">
                <img src="img/Educure.png" class="image-4">
            </a>
            <nav role="navigation" class="w-nav-menu">
                <a href="/" class="w-nav-link">Home</a>
                <a href="{{ route('itemlist') }}" class="w-nav-link">Item</a>
                <a href="{{ route('cart.index') }}" class="w-nav-link">cart</a>
                <a href="{{ route('logout') }}" class="w-nav-link">Log out</a>
            </nav>
            <div class="w-nav-button">
                <div class="icon-2 w-icon-nav-menu"></div>
            </div>
        </div>
    </div>
</section>
