  <!-- HEADER  -->
   
  <header>
      <div class="w-75 mx-auto">
          <div class="row">
              <a href="" class="header__logo col-3">
                  <img src="media/logo-banner/logo.jpg" alt="Logo">
              </a>
              <div class="input-group mb-3 col-7 header__search">
                  <input id="tuKhoa" type="text" class="form-control" placeholder="Tìm kiếm...">
                  <div id="timkiem" class="input-group-append">
                      <span class="input-group-text" id="basic-addon2">
                          <i class="fa fa-search"></i>
                      </span>
                  </div>
                     <span class="input-group-text" id="hienformtimkiem">
                          <button>...</button>
                      </span>
              </div>
              <div class="col-2">
                  <div class="header__item d-flex justify-content-between text-center ">
                        <div class="header__cart">
                            <a href="cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="d-block">Giỏ hàng</span>
                        </a>
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
                                  <a href="account/information">Thông tin</a>
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
      <!-- Nút tìm kiếm nâng cao -->


<!-- Form tìm kiếm nâng cao (ẩn ban đầu) -->

<div id="advancedSearchForm" class="advanced-search-panel bg-light border border-success rounded mt-1 p-3" style="display: none;">
    <h5 class="text-success mb-3"><i class="fa fa-filter mr-2"></i>Tìm kiếm nâng cao</h5>
    
    <div class="row">
        <!-- Cột trái -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-success"><i class="fa fa-book mr-1"></i>Tên sách</label>
                <input type="text" id = "tenSach"class="form-control border-success" placeholder="Nhập tên sách">
            </div>

           

          

            <div class="form-group">
                <label class="text-success"><i class="fa fa-tags mr-1"></i>Thể loại</label>
                <select class="form-control border-success" id ="danhmuc">
                    <option value=''>Tất cả</option>
                    <option value=1>SÁCH MẦM NON</option>
                    <option value=2>SÁCH THIẾU NHI</option>
                    <option value=3>SÁCH KĨ NĂNG</option>
                    <option value=4>SÁCH KINH DOANH</option>
                    <option value=5>SÁCH MẸ VÀ BÉ</option>
                    <option value=6>SÁCH VĂN HỌC</option>
                    <option value=7>SÁCH THAM KHẢO</option>
                    <option value=8>NOTEBOOK</option>
                    <!-- Thêm tùy chọn khác nếu cần -->
                </select>
            </div>
        </div>

        <!-- Cột phải -->
        <div class="col-md-6">
            
            <div class="form-group">
                <label class="text-success"><i class="fa fa-dollar-sign mr-1"></i>Khoảng giá (VNĐ)</label>
                <div class="input-group">
                    <input type="number"id = "giaBatDau" class="form-control border-success" placeholder="Từ">
                    <div class="input-group-append">
                        <span class="input-group-text border-success">-</span>
                    </div>
                    <input type="number"id = "giaKetThuc" class="form-control border-success" placeholder="Đến">
                </div>
            </div>

            
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <button type="button" class="btn btn-outline-success mr-2" id="resetAdvancedSearch">
            <i class="fa fa-undo mr-1"></i>Đặt lại
        </button>
        <button type="button" class="btn btn-outline-success mr-2" id="timkiemnangcao">
            <i class="fa fa-check mr-1" ></i>Tìm kiếm
        </button>
    </div>
</div>

  </header>

