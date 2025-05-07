document.addEventListener("DOMContentLoaded", function () {
    // Các biến cho sidebar
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    const sidebarBrand = document.getElementById('sidebar-brand');
    const header = document.querySelector('header');

    // Toggle sidebar
    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded');
        header.classList.toggle('expanded');
        if (sidebar.classList.contains('collapsed')) {
            sidebarBrand.style.display = 'none';
        } else {
            sidebarBrand.style.display = 'flex';
        }
    });

    function currency(num) {
        return num.toLocaleString('vi-VN') + ' VND';
    }

    // lưu trữ nhà cung cấp vào localStorage
    // let suppliers = JSON.parse(localStorage.getItem('nhacungcap')) || [
    //     { id: 'SUP-001', name: 'Adidas', address: 'Herzogenaurach, Đức', email: 'contact@adidas.com', phone: '+49 9132 84-0', status: 'Hoạt động' },
    //     { id: 'SUP-002', name: 'Nike', address: 'Beaverton, Mỹ', email: 'contact@nike.com', phone: '+1 503-671-6453', status: 'Hoạt động' },
    //     { id: 'SUP-003', name: 'New Balance', address: 'Boston, Mỹ', email: 'contact@newbalance.com', phone: '+1 800-595-9138', status: 'Hoạt động' },
    //     { id: 'SUP-004', name: 'Puma', address: 'Herzogenaurach, Đức', email: 'contact@puma.com', phone: '+49 9132 81-0', status: 'Hoạt động' },
    //     { id: 'SUP-005', name: 'Converse', address: 'Boston, Mỹ', email: 'contact@converse.com', phone: '+1 888-792-3307', status: 'Hoạt động' },
    //     { id: 'SUP-006', name: 'Vans', address: 'California, Mỹ', email: 'contact@vans.com', phone: '+1 855-909-8267', status: 'Hoạt động' },
    //     { id: 'SUP-007', name: 'Reebok', address: 'Boston, Mỹ', email: 'contact@reebok.com', phone: '+1 866-870-1743', status: 'Hoạt động' },
    //     { id: 'SUP-008', name: 'Asics', address: 'Kobe, Nhật Bản', email: 'contact@asics.com', phone: '+81 78-303-2111', status: 'Hoạt động' },
    //     { id: 'SUP-009', name: 'Under Armour', address: 'Baltimore, Mỹ', email: 'contact@underarmour.com', phone: '+1 888-727-6687', status: 'Hoạt động' },
    //     { id: 'SUP-010', name: 'Fila', address: 'Seoul, Hàn Quốc', email: 'contact@fila.com', phone: '+82 2-3408-5000', status: 'Hoạt động' },
    //     { id: 'SUP-011', name: 'Mizuno', address: 'Osaka, Nhật Bản', email: 'contact@mizuno.com', phone: '+81 6-6536-2800', status: 'Hoạt động' },
    //     { id: 'SUP-012', name: 'Skechers', address: 'Manhattan Beach, Mỹ', email: 'contact@skechers.com', phone: '+1 800-746-3411', status: 'Hoạt động' },
    //     { id: 'SUP-013', name: 'Saucony', address: 'Massachusetts, Mỹ', email: 'contact@saucony.com', phone: '+1 800-365-4933', status: 'Hoạt động' },
    //     { id: 'SUP-014', name: 'Brooks', address: 'Seattle, Mỹ', email: 'contact@brooksrunning.com', phone: '+1 800-227-6657', status: 'Hoạt động' },
    //     { id: 'SUP-015', name: 'Hoka One One', address: 'Goleta, Mỹ', email: 'contact@hoka.com', phone: '+1 877-445-7342', status: 'Hoạt động' },
    //     { id: 'SUP-016', name: 'Salomon', address: 'Annecy, Pháp', email: 'contact@salomon.com', phone: '+33 4 50 65 41 41', status: 'Hoạt động' },
    //     { id: 'SUP-017', name: 'Merrell', address: 'Rockford, Mỹ', email: 'contact@merrell.com', phone: '+1 800-288-3124', status: 'Hoạt động' },
    //     { id: 'SUP-018', name: 'Timberland', address: 'Stratham, Mỹ', email: 'contact@timberland.com', phone: '+1 888-802-9947', status: 'Hoạt động' },
    //     { id: 'SUP-019', name: 'Columbia', address: 'Portland, Mỹ', email: 'contact@columbia.com', phone: '+1 800-622-6953', status: 'Hoạt động' },
    //     { id: 'SUP-020', name: 'ECCO', address: 'Bredebro, Đan Mạch', email: 'contact@ecco.com', phone: '+45 74 91 16 25', status: 'Hoạt động' },
    // ];
    // localStorage.setItem('nhacungcap', JSON.stringify(suppliers));

    // Lưu trữ sản phẩm vào localStorage
    let products = JSON.parse(localStorage.getItem('sanpham')) || [
        { productid: 1, brandid: 'adidas', img: '/imgs/adidas/Response super.jpg', name: 'Adidas Response Super', price: 1750000 },
        { productid: 2, brandid: 'adidas', img: '/imgs/adidas/Lite Racer Rebold.jpg', name: 'Adidas Lite Racer Rebold', price: 1290000 },
        { productid: 3, brandid: 'adidas', img: '/imgs/adidas/Handball Spezial.jpg', name: 'Adidas Handball Spezial', price: 2500000 },
        { productid: 4, brandid: 'nike', img: '/imgs/nike/LeBron Witness 4.jpg', name: 'Nike LeBron Witness 4', price: 1900000 },
        { productid: 5, brandid: 'nike', img: '/imgs/nike/dunk low.jpg', name: 'Nike Dunk Low', price: 2490000 },
        { productid: 6, brandid: 'nike', img: '/imgs/nike/SB dunk low.jpg', name: 'Nike SB Dunk Low', price: 8000000 },
        { productid: 7, brandid: 'newbalance', img: '/imgs/newbalance/550 white blue.jpg', name: 'New Balance 550 White Blue', price: 1520000 },
        { productid: 8, brandid: 'newbalance', img: '/imgs/newbalance/9060 slate grey.jpg', name: 'New Balance 9060 Slate Grey', price: 3900000 },
        { productid: 9, brandid: 'newbalance', img: '/imgs/newbalance/black magnet.jpg', name: 'New Balance Black Magnet', price: 2350000 },
        { productid: 10, brandid: 'puma', img: '/imgs/puma/velophasis layers.jpg', name: 'Puma Velophasis Layers', price: 4200000 },
        { productid: 11, brandid: 'puma', img: '/imgs/puma/trinity black white.jpg', name: 'Puma Trinity Black White', price: 1680000 },
        { productid: 12, brandid: 'adidas', img: '/imgs/adidas/4DFWD.jpg', name: 'Adidas 4DFWD', price: 2750000 },
        { productid: 13, brandid: 'nike', img: '/imgs/nike/Air zoom vomero 5.jpg', name: 'Nike Air Zoom Vomero 5', price: 4200000 },
        { productid: 14, brandid: 'nike', img: '/imgs/nike/Air zoom drive.jpg', name: 'Nike Air Zoom Drive', price: 4490000 },
        { productid: 15, brandid: 'puma', img: '/imgs/puma/forever black.jpg', name: 'Puma Forever Black', price: 9660000 },
        { productid: 16, brandid: 'puma', img: '/imgs/puma/palermo moda XTRA white.jpg', name: 'Puma Palermo Moda XTRA White', price: 2740000 },
        { productid: 17, brandid: 'adidas', img: '/imgs/adidas/Alphacomfy.jpg', name: 'Adidas Alphacomfy', price: 1800000 },
        { productid: 18, brandid: 'adidas', img: '/imgs/adidas/Campus_00s.jpg', name: 'Adidas Campus 00s Grey Cloud', price: 3900000 },
        { productid: 19, brandid: 'nike', img: '/imgs/nike/air jordan 1 high.jpg', name: 'Nike Air Jordan 1 High', price: 12000000 },
        { productid: 20, brandid: 'puma', img: '/imgs/puma/essentinals metallic.jpg', name: 'Puma RS 3.0 Metallic', price: 3700000 },
        { productid: 21, brandid: 'nike', img: '/imgs/nike/air jordan 4.jpg', name: 'Nike Air Jordan 4', price: 5580000 },
        { productid: 22, brandid: 'nike', img: '/imgs/nike/Air max 97 white gum.jpg', name: 'Nike Air Max 97 White Gum', price: 4900000 },
        { productid: 23, brandid: 'adidas', img: '/imgs/adidas/NMD_R1.jpg', name: 'Adidas NMD R1', price: 3315000 },
        { productid: 24, brandid: 'newbalance', img: '/imgs/newbalance/1000 real pink.jpg', name: 'New Balance 1000 Real Pink', price: 3300000 },
        { productid: 25, brandid: 'newbalance', img: '/imgs/newbalance/1906U rich Oak.jpg', name: 'New Balance 1906U Rich Oak', price: 6000000 },
        { productid: 26, brandid: 'newbalance', img: '/imgs/newbalance/9060 shadow.jpg', name: 'New Balance 9060 shadow', price: 2100000 },
        { productid: 27, brandid: 'nike', img: '/imgs/nike/V2K Run.jpg', name: 'Nike V2K Run', price: 3519000 },
        { productid: 28, brandid: 'nike', img: '/imgs/nike/Air Pegasus 2K5.jpg', name: 'Nike Air Pegasus 2K5', price: 4690000 },
        { productid: 29, brandid: 'puma', img: '/imgs/puma/suede club navy.jpg', name: 'Puma Suede Club Navy', price: 2110000 },
        { productid: 30, brandid: 'puma', img: '/imgs/puma/suede jack hammer.jpg', name: 'Puma Suede Jack Hammer', price: 3800000 },
        { productid: 31, brandid: 'adidas', img: '/imgs/adidas/Park street.jpg', name: 'Adidas Park Street', price: 1800000 },
        { productid: 32, brandid: 'nike', img: '/imgs/nike/bape sta.jpg', name: 'Nike Bape Sta', price: 1150000 },
        { productid: 33, brandid: 'newbalance', img: '/imgs/newbalance/9060 sparrow flat taupe.jpg', name: 'New Balance Sparrow Flat Taupe', price: 5000000 },
        { productid: 34, brandid: 'adidas', img: '/imgs/adidas/Samba OG Djen.jpg', name: 'Adidas Samba OG Djen', price: 2700000 },
        { productid: 35, brandid: 'newbalance', img: '/imgs/newbalance/9060 white.jpg', name: 'New Balance 9060 White', price: 6200000 },
        { productid: 36, brandid: 'newbalance', img: '/imgs/newbalance/navy white.jpg', name: 'New Balance Navy White', price: 3690000 },
        { productid: 37, brandid: 'puma', img: '/imgs/puma/speedcat archive team light.jpg', name: 'Puma SpeedCat Archive Team Light', price: 3990000 },
        { productid: 38, brandid: 'puma', img: '/imgs/puma/sude XL black.jpg', name: 'Puma Suede XL Black', price: 2120000 },
        { productid: 39, brandid: 'nike', img: '/imgs/nike/Dunk high.jpg', name: 'Nike Dunk High', price: 1950000 },
        { productid: 40, brandid: 'puma', img: '/imgs/puma/speedcat archive haute.jpg', name: 'Puma SpeedCat Archive Haute', price: 4050000 },
        { productid: 41, brandid: 'adidas', img: '/imgs/adidas/campus 00s black.jpg', name: 'Adidas Campus 00s Black', price: 2600000 },
        { productid: 42, brandid: 'newbalance', img: '/imgs/newbalance/sea salt marsh.jpg', name: 'New Balance Sea Salt Marsh', price: 3380000 },
        { productid: 43, brandid: 'newbalance', img: '/imgs/newbalance/sea salt vintage.jpg', name: 'New Balance Sea Salt Vintage', price: 1790000 },
        { productid: 44, brandid: 'newbalance', img: '/imgs/newbalance/Foam Hierro V6.jpg', name: 'New Balance Foam Hierro V6', price: 1950000 },
    ];
    localStorage.setItem('sanpham', JSON.stringify(products));
    let users = JSON.parse(localStorage.getItem('users')) || [];
    let editingUserId = null;




    //    function logout(){
    //     window.location.href = 'admin.html';
    //    }

    // Sản Phẩm-----------------------------------------------------------------------------------------------------------------
    function trangSanPham() {
        const mainElement = document.querySelector('main');
        mainElement.innerHTML = `
            <div>
                <h3>Thêm sản phẩm mới</h3>
                <button class="add-product-btn" id="add-product-btn">
                    <i class="las la-plus-circle"></i> Thêm sản phẩm
                </button>
            </div>
            <div id="products-list"></div>
        `;
        const products = JSON.parse(localStorage.getItem('sanpham')) || [];
        danhSachSanPham(products);
    }

    function danhSachSanPham(products) {
        const productsList = document.getElementById("products-list");
        productsList.innerHTML = '';

        for (let i = 0; i < products.length; i++) {
            const product = products[i];
            const productElement = document.createElement("div");
            productElement.classList.add("product");

            productElement.innerHTML = `
                <img src="${product.img}" alt="${product.name}" width="100px" height="100px">
                <h3>${product.name}</h3>
                <p>Thương hiệu: ${product.brandid}</p>
                <p>Giá: ${currency(product.price)}</p>
                <button class="edit-btn" data-id="${product.productid}">Chỉnh sửa</button>
                <button class="delete-btn" data-id="${product.productid}">Xóa</button>
            `;

            productElement.querySelector('.edit-btn').addEventListener('click', () => suaSanPham(product.productid));
            productElement.querySelector('.delete-btn').addEventListener('click', () => xoaSanPham(product.productid));

            productsList.appendChild(productElement);
        }

    }
    // Khach hang-------------------------------------------------------------------------------------------------
    function trangKhachHang() {
        const mainElement = document.querySelector('main');
        mainElement.innerHTML = `
                <div>
                    <h3>Quản lý người dùng</h3>
                    <button class="add-user-btn" id="add-user-btn">
                        <i class="las la-plus-circle"></i> Thêm người dùng
                    </button>
                </div>
    
                <div id="user-list">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên người dùng</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                <th>Địa chỉ</th>
                                <th>Vai trò</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </section>
        `;
        khachHang();
    }

    function khachHang() {
        const userList = document.querySelector('#user-list tbody');
        if (!userList) {
            console.error('Không tìm thấy phần tử <tbody>');
            return;
        }
        userList.innerHTML = '';

        for (let i = 0; i < users.length; i++) {
            const user = users[i];
            let statusClass = user.status === 'active' ? 'active' : 'blocked';
            let statusText = user.status === 'active' ? 'Hoạt động' : 'Đã Khóa';
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${i + 1}</td>
                <td>${user.username}</td>
                <td>${user.phone}</td>
                <td>${user.email}</td>
                <td>${user.password}</td>
                <td>${user.address}</td>
                <td>${user.role}</td>
                <td><span class="status_KH ${statusClass}">${statusText}</span></td>
                <td>
                    <button class="edit-btn2" data-id="${i}">Sửa</button>
                    <button class="delete-btn" data-id="${i}">Xóa</button>
                    <button class="block-btn" data-id="${i}">Khóa</button>
                </td>
            `;

            // Kiểm tra sự tồn tại của button trước khi gắn sự kiện
            const editButton = row.querySelector('.edit-btn2');
            const deleteButton = row.querySelector('.delete-btn');
            const blockButton = row.querySelector('.block-btn');

            if (editButton) {
                editButton.addEventListener('click', () => suaNguoiDung(i));
            }
            if (deleteButton) {
                deleteButton.addEventListener('click', () => xoaNguoiDung(i));
            }
            if (blockButton) {
                blockButton.addEventListener('click', () => trangThai(i));
            }

            userList.appendChild(row);
        }
    }

    taoMenu();
    taiTrang();

    const addProductBtn = document.getElementById("add-product-btn");
    const modal = document.getElementById("product-modal");
    const closeBtn = document.querySelector(".close-btn1");
    const submitProductBtn = document.getElementById("submit-product");
    let editingProductId = null;
    let lastProductId = products.length > 0 ? Math.max(...products.map(p => p.productid)) : 0;

    addProductBtn.addEventListener('click', () => {
        editingProductId = null;
        document.getElementById("product-name").value = "";
        document.getElementById("product-brand").value = "";
        document.getElementById("product-price").value = "";
        document.getElementById("product-image").value = "";
        modal.style.display = 'flex';
    });

    closeBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    submitProductBtn.addEventListener("click", function (event) {
        event.preventDefault();
        const name = document.getElementById("product-name").value;
        const brandid = document.getElementById("product-brand").value;
        const price = document.getElementById("product-price").value;
        const img = document.getElementById("product-image").value;

        if (name && brandid && price && img) {
            if (editingProductId != null) {
                capNhatSanPham(editingProductId, brandid, img, name, price);
            } else {
                themSanPham(brandid, name, price, img);
            }
            modal.style.display = "none";
        } else {
            alert("Vui lòng điền đầy đủ thông tin!");
        }
    });

    function themSanPham(brandid, name, price, img) {
        const newProduct = {
            productid: ++lastProductId,
            name: name,
            brandid: brandid,
            price: parseInt(price),
            img: img
        };

        let isDuplicate = products.some(product => product.name === newProduct.name);

        if (!isDuplicate) {
            products.push(newProduct);
            localStorage.setItem('sanpham', JSON.stringify(products));
            danhSachSanPham(products);
        } else {
            alert("Sản phẩm đã tồn tại.");
        }
    }

    function capNhatSanPham(productid, brandid, img, name, price) {
        const product = products.find(product => product.productid === productid);
        if (product) {
            product.brandid = brandid;
            product.img = img;
            product.name = name;
            product.price = parseInt(price);
            localStorage.setItem('sanpham', JSON.stringify(products));
            danhSachSanPham(products);
        }
    }

    function suaSanPham(productid) {
        const product = products.find(product => product.productid === productid);
        if (product) {
            editingProductId = product.productid;
            document.getElementById("product-name").value = product.name;
            document.getElementById("product-brand").value = product.brandid;
            document.getElementById("product-price").value = product.price;
            document.getElementById("product-image").value = product.img;
            modal.style.display = "flex";
        }
    }

    function xoaSanPham(productid) {
        if (confirm("Bạn có chắc muốn xóa sản phẩm này?")) {
            products = products.filter(product => product.productid !== productid);
            localStorage.setItem('sanpham', JSON.stringify(products));
            danhSachSanPham(products);
        }
    }

    // Nhà cung cấp-------------------------------------------------------------------------------------------------
    function trangNhaCungCap() {
        const mainElement = document.querySelector('main');
        mainElement.innerHTML = `
            <div>
                <h3>Thêm nhà cung cấp mới</h3>
                <button class="add-supplier-btn" id="add-supplier-btn">
                    <i class="las la-plus-circle"></i> Thêm nhà cung cấp
                </button>
            </div>
            <div id="suppliers-list"></div>
        `;
        const suppliers = JSON.parse(localStorage.getItem('nhacungcap')) || [];
        danhSachNhaCungCap(suppliers);
    }

    function danhSachNhaCungCap(suppliers) {
        const suppliersList = document.getElementById("suppliers-list");
        suppliersList.innerHTML = '';

        for (let i = 0; i < suppliers.length; i++) {
            const supplier = suppliers[i];
            const supplierElement = document.createElement("div");
            supplierElement.classList.add("supplier");

            supplierElement.innerHTML = `
                <h3>${supplier.name}</h3>
                <p>Địa chỉ: ${supplier.address}</p>
                <p>Email: ${supplier.email}</p>
                <p>Điện thoại: ${supplier.phone}</p>
                <p>Trạng thái: ${supplier.status}</p>
                <button class="edit-btn" data-id="${supplier.id}">Chỉnh sửa</button>
                <button class="delete-btn" data-id="${supplier.id}">Xóa</button>
            `;

            supplierElement.querySelector('.edit-btn').addEventListener('click', () => suaNhaCungCap(supplier.id));
            supplierElement.querySelector('.delete-btn').addEventListener('click', () => xoaNhaCungCap(supplier.id));

            suppliersList.appendChild(supplierElement);
        }
    }

    const addSupplierBtn = document.getElementById("add-supplier-btn");
    const modal2 = document.getElementById("supplier-modal");
    const closeBtn2 = document.querySelector(".close-btn2");
    const submitSupplierBtn = document.getElementById("submit-supplier");
    let editingSupplierId = null;
    let lastSupplierId = suppliers.length > 0 ? Math.max(...suppliers.map(s => parseInt(s.id.slice(-3)))) : 0;
    
});

