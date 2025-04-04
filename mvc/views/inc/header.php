  <!-- HEADER  -->
  <header>
      <div class="w-75 mx-auto">
          <div class="row">
              <a href="" class="header__logo col-3">
                  <img src="media/logo-banner/logo.jpg" alt="Logo">
              </a>
              <div class="input-group mb-3 col-7 header__search">
                  <input type="text" class="form-control" placeholder="Tìm kiếm...">
                  <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2">
                          <i class="fa fa-search"></i>
                      </span>
                  </div>
              </div>
              <div class="col-2">
                  <div class="header__item d-flex justify-content-between text-center ">
                      <div class="header__cart">
                          <i class="fa fa-shopping-cart"></i>
                          <span class="d-block">Giỏ hàng</span>
                      </div>
                      <?php
                        if (isset($_COOKIE['user_email'])) {
                            echo ' <div class="header__user">
                          <a>
                              <i class="fa fa-user"></i>
                              <span class="d-block">Tài khoản</span>
                          </a>
                          
                          <ul class="dropdown-menu">
                             
                              <li>

                                  <i class="fa fa-user"></i>
                                  <a href="#">Thông tin</a>
                              </li>
                              <li>
                                  <i class="fa fa-sign-in-alt"></i>
                                  <a href="account/logout">Đăng xuất</a>
                              </li>
                          </ul>
                      </div>';
                        } else {
                            echo '<div class="header__user">
                          <a>
                              <i class="fa fa-user"></i>
                              <span class="d-block">Tài khoản</span>
                          </a>
                          
                          <ul class="dropdown-menu">
                             
                              <li>

                                  <i class="fa fa-sign-in-alt"></i>
                                  <a href="account/login">Đăng nhập</a>
                              </li>
                              <li>
                                  <i class="fa fa-registered"></i>
                                  <a href="#">Đăng ký</a>
                              </li>
                          </ul>
                      </div>';
                        }
                        ?>

                  </div>
              </div>
          </div>
      </div>
  </header>