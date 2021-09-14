
<div class="header">
    <div class=" container">
        <div class="d-flex">
            <div class="p-2">Store.vn@gmail.com</div>
            <div class="p-2">Hotline:0121233434</div>
            <div class="ml-auto p-2">
                <div class="input-group md-form form-sm form-2 pl-0">
                    <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <span class="input-group-text red lighten-3" id="basic-text1"><i class="fa fa-search " aria-hidden="true"></i></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<header id="myHeader">

    <nav class="navbar container ">
        <div class="logo">
            <a href="/">
            <img src="/images/logo.png" alt="logo" />
            </a>
        </div>
        <div class="sitenavigation">
            <span class="menu-icon">
                <a href="#" class="menu example5"><span></span></a>
                <div id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </span>
            <ul>
                <li><a href="#">Home</a></li>
                <li class="nav-dropdown"><a href="#">Categories</a>
                    <ul>
                        <li><a href="#">Hot Sellers</a></li>
                        <li><a href="#">On Sale</a></li>
                        <li class="nav-dropdown"><a href="#">Men's</a>
                            <ul>
                                <li><a href="#">T-Shirts</a></li>
                                <li><a href="#">Pants</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Clearance</a></li>
                    </ul>
                </li>
                <li class="nav-dropdown"><a href="#">Others</a>
                    <ul>
                        <li><a href="#">Hot Sellers</a></li>
                        <li><a href="#">On Sale</a></li>
                        <li class="nav-dropdown"><a href="#">Women's</a>
                            <ul>
                                <li><a href="#">Dresses</a></li>
                                <li class="nav-dropdown"><a href="#">Shoes</a>
                                    <ul>
                                        <li>
                                        <li><a href="#">High Heels</a></li>
                                        <li><a href="#">Tennis Shoes</a></li>
                                        <li><a href="#">Flip Flops</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Forth Sub-nav item</a></li>
                    </ul>
                </li>
                <li class="nav-dropdown"><a href="#">Third Item</a>
                    <ul>
                        <li><a href="#">Nav item</a></li>
                        <li class="nav-dropdown"><a href="#">Nav item</a>
                            <ul>
                                <li><a href="#">Nav item</a></li>

                            </ul>
                        </li>
                        <li class="nav-dropdown"><a href="#">Third Sub-nav item</a>
                            <ul>
                                <li><a href="#">Third level nav item</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Forth Sub-nav item</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/cart/">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        (<span class="total-count"></span>)

                    </a>
                </li>
                <?php
                if (isset($_SESSION['login_user'])) {
                    ?>
                    <li><a href="/login/logout.php">Logout</a></li>
                <?php } else { ?>
                    <li><a href="/login/">Login</a></li>
                <?php } ?>
                <li>
                    <a href="/register/"> Register</a>
                </li>

            </ul>
        </div>
    </nav>

</header>