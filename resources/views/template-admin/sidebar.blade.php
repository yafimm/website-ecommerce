<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('images/icon/logo.png') }}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li>
                              <a href="{{ url('') }}">
                                  <i class="fas fa-tachometer-alt"></i>Go to website
                              </a>
                          </li>
                        <li class="">
                            <a class="js-arrow" href="{{ route('transaksi.index') }}">
                                <i class="fas fa-dollar-sign"></i>Transaction
                            </a>
                        </li>
                        <li class="">
                            <a class="js-arrow" href="{{ route('produk.index') }}">
                                <i class="fas fa-shopping-cart"></i>Product
                            </a>
                        </li>
                        <li class="">
                            <a class="js-arrow" href="{{ route('kategori.indexx') }}">
                                <i class="fab fa-product-hunt"></i>Category
                            </a>
                        </li>
                        <li class="">
                            <a class="js-arrow" href="{{ route('konfirmasi.index') }}">
                                <i class="fas fa-dollar-sign"></i>Confirmation
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
