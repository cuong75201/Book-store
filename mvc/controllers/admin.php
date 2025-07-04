<?php
class Admin extends Controller
{
    public $nhanvienModel;
    public $sachModel;
    public $theloaiModel;
    public $danhmucModel;
    public $donhangModel;
    public $ctietdonhangModel;
    public $nhomquyenModel;
    public $khachhangModel;
    public $ctietpnhModel;
    public $ctietquyenModel;
    public $phieunhapModel;
    public $nhaCungCapModel;

    function __construct()
    {
        if (!isset($_SESSION)) session_start();
        parent::__construct();
        $this->ctietquyenModel = $this->model("ctiet_quyenModel");
        $this->ctietpnhModel = $this->model("ctiet_pnhModel");
        $this->khachhangModel = $this->model("UserModel");
        $this->sachModel = $this->model("SachModel");
        $this->nhanvienModel = $this->model("NhanVienModel");
        $this->theloaiModel = $this->model("TheLoaiModel");
        $this->danhmucModel = $this->model("DanhMucModel");
        $this->donhangModel = $this->model("DonHangModel");
        $this->ctietdonhangModel = $this->model("ctiet_don_hangModel");
        $this->nhomquyenModel = $this->model("NhomQuyenModel");
        $this->phieunhapModel = $this->model("PhieuNhapModel");
        $this->nhaCungCapModel = $this->model("NhaCungCapModel");
       // $this->nccModel = $this->model("NccModel");
    }

    function default($params = "")
    {
        if (!empty($params)) {
            $this->view("page/myerrol", [
                'href' => 'login'
            ]);
            return;
        }
        if (isset($_SESSION['hanhdong'])) {
            $this->dashboard();
        } else {
            $this->view("page/loginAdmin", []);
        }
    }

    function dashboard()
    {
        $this->view("admin_view", [
            "title" => "Trang chủ - Admin Web",
            "content" => "Trang chủ",
            "Page" => "dashboard"
        ]);
    }

    function product()
    {
        if (!isset($_SESSION['hanhdong'])) {
            // $this->view("page/loginAdmin", []);
            header("Location: login");
            return;
        } else {
            if (!in_array(1, $_SESSION['hanhdong'])) {
                $this->view("page/myerrol", [
                    'href' => 'dashboard'
                ]);
                return;
            }
        }
        $list_product = $this->sachModel->getSach();
        foreach ($list_product as &$product) {
            $product['DanhMuc'] = $this->danhmucModel->getNamebyId($product['ID_DanhMuc'])[0];
            $product['TheLoai'] = $this->theloaiModel->getNamebyIDTL($product['ID_TheLoai'])[0];
        }
        $this->view("admin_view", [
            "title" => "Sản phẩm - Admin Web",
            "content" => "Sản phẩm",
            "Page" => "product",
            "list_product" => $list_product,
            "script" => "product",
        ]);
    }
    function khachhang()
    {
        if (!isset($_SESSION['hanhdong'])) {
            // $this->view("page/loginAdmin", []);
            header("Location: login");
            return;
        } else {
            if (!in_array(4, $_SESSION['hanhdong'])) {
                $this->view("page/myerrol", [
                    'href' => 'dashboard'
                ]);
                return;
            }
        }
        $list_user = $this->khachhangModel->getAllUser();
        $this->view("admin_view", [
            "title" => "Khách hàng - Admin Web",
            "content" => "Khách hàng",
            "Page" => "khachhang",
            "list_khachhang" => $list_user,
            "script" => "khachhang",
        ]);
    }
    function nhacungcap()
    {
        if (!isset($_SESSION['hanhdong'])) {
            // $this->view("page/loginAdmin", []);
            header("Location: login");
            return;
        } else {
            if (!in_array(2, $_SESSION['hanhdong'])) {
                $this->view("page/myerrol", [
                    'href' => 'dashboard'
                ]);
                return;
            }
        }
        $list_ncc = $this->nhaCungCapModel->getAllNCC1();
        $this->view("admin_view", [
            "title" => "Nhà cung cấp - Admin Web",
            "content" => "Nhà cung cấp",
            "Page" => "nhacungcap",
            "list_nhacungcap" => $list_ncc,
            "script" => "nhacungcap",
        ]);
    }
    function nhanvien()
    {
        if (!isset($_SESSION['hanhdong'])) {
            // $this->view("page/loginAdmin", []);
            header("Location: login");
            return;
        } else {
            if (!in_array(3, $_SESSION['hanhdong'])) {
                $this->view("page/myerrol", [
                    'href' => 'dashboard'
                ]);
                return;
            }
        }
        $list_nhanvien = $this->nhanvienModel->getAll();
        foreach ($list_nhanvien as &$nhanvien) {
            $nhanvien['TenQuyen'] = $this->nhomquyenModel->getNamebyId($nhanvien['MaQuyen'])[0];
        }
        $this->view("admin_view", [
            "title" => "Nhân viên - Admin Web",
            "content" => "Nhân viên",
            "Page" => "nhanvien",
            'list_nhanvien' => $list_nhanvien,
            "script" => "nhanvien",
        ]);
    }
    function donhang()
    {
        if (!isset($_SESSION['hanhdong'])) {
            // $this->view("page/loginAdmin", []);
            header("Location: login");
            return;
        } else {
            if (!in_array(5, $_SESSION['hanhdong'])) {
                $this->view("page/myerrol", [
                    'href' => 'dashboard'
                ]);
                return;
            }
        }
        $list_donhang = $this->donhangModel->getAll();
        $this->view("admin_view", [
            "title" => "Đơn hàng - Admin Web",
            "content" => "Đơn hàng",
            "Page" => "donhang",
            "list_donhang" => $list_donhang,
            "script" => "donhang",
        ]);
    }
    function thongke()
    {
        if (!isset($_SESSION['hanhdong'])) {
            // $this->view("page/loginAdmin", []);
            header("Location: login");
            return;
        } else {
            if (!in_array(7, $_SESSION['hanhdong'])) {
                $this->view("page/myerrol", [
                    'href' => 'dashboard'
                ]);
                return;
            }
        }
        $list_khachhang = $this->donhangModel->getAllKH();

        foreach ($list_khachhang as &$khachhang) {
            $khachhang['nameKH'] = $this->khachhangModel->getNamebyId($khachhang['ID_Khach_Hang'])[0];
        }
        $list_sach = $this->ctietdonhangModel->getAllbyIDSach();
        foreach ($list_sach as &$sach) {
            $sach['name_sach'] = $this->sachModel->getSachfromID($sach['ID_Sach'])[0];
        }

        $this->view("admin_view", [
            "title" => "Thống kê - Admin Web",
            "content" => "Thống kê",
            "Page" => "thongke",
            'list_kh' => $list_khachhang,
            'list_sach' => $list_sach,
            "script" => "thongke",
        ]);
    }
    function phanquyen()
    {
        if (!isset($_SESSION['hanhdong'])) {
            // $this->view("page/loginAdmin", []);
            header("Location: login");
            return;
        } else {
            if (!in_array(8, $_SESSION['hanhdong'])) {
                $this->view("page/myerrol", [
                    'href' => 'dashboard'
                ]);
                return;
            }
        }
        $list_quyen = $this->nhomquyenModel->getAll();
        $this->view("admin_view", [
            "title" => "Phân quyền - Admin Web",
            "content" => "Phân quyền",
            "Page" => "phanquyen",
            'list_quyen' => $list_quyen,
            "script" => "phanquyen",
        ]);
    }
    function login()
    {
        session_destroy();
        $this->view("page/loginAdmin", []);
    }
    function checkLogin()
    {
        $sdt = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST["password"]) ? $_POST['password'] : "";
        $result = $this->nhanvienModel->KiemTraNhanVien($sdt, $password);
        
        if ($result) {
            $nv = $this->nhanvienModel->getNVfromSDT($sdt);
            $_SESSION['id_nv'] = $nv['ID_NV'];
            
            // Khởi tạo mảng trước khi sử dụng
            $_SESSION['hanhdong'] = []; // <-- Thêm dòng này
            
            $ctiet = $this->ctietquyenModel->getById($nv['MaQuyen']);
            foreach ($ctiet as $ct) {
                $_SESSION['hanhdong'][] = $ct['hanhdong']; // <-- Sử dụng [] để thêm phần tử
            }
        }
        echo json_encode($result);
    }
    function getDanhMuc()
    {
        if (isset($_POST['danhmuc'])) {
            echo json_encode($this->danhmucModel->getAllDanhMuc());
        }
    }
    function getTheLoai()
    {
        if (isset($_POST['theloai'])) {
            echo json_encode($this->theloaiModel->getAllTL());
        }
    }
    function uploadImage()
    {
        $namesach = $_POST['namesach'];
        $tacgia = $_POST['tacgia'];
        $name_nxb = $_POST['name_nxb'];
        $namxb = $_POST['namxb'];
        $giaban = $_POST['giaban'];
        $giamgia = $_POST['giamgia'];
        $danhmuc = $_POST['danhmuc'];
        $theloai = $_POST['theloai'];
        $mota = $_POST['mota'];
        if (isset($_FILES['image'])) {
            $targetDir = "media/img_product/";
            if (!is_dir($targetDir)) {
                // Thông báo lỗi
                echo json_encode([
                    "status" => "error",
                    "message" => "Thư mục '$targetDir' không tồn tại."
                ]);
                exit;
            }
            $fileName = uniqid() . "-" . basename($_FILES['image']['name']);
            $targetFilePath = $targetDir . $fileName;
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

            // Kiểm tra định dạng file hợp lệ
            $allowedTypes = array("jpg", "jpeg", "png", "gif");
            if (!in_array($fileType, $allowedTypes)) {
                echo json_encode(["status" => "error", "message" => "Chỉ chấp nhận file JPG, JPEG, PNG, GIF."]);
                exit;
            }

            // Di chuyển file vào thư mục "media"
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                $result = $this->sachModel->create($namesach, $tacgia, $name_nxb, $namxb, $danhmuc, $theloai, $giaban, $giamgia, 0, $mota, $fileName, 1);
                echo json_encode($result);
            } else {
                echo json_encode(["status" => "error", "message" => "Lỗi khi tải lên file."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Không tìm thấy file."]);
        }
    }
    public function getSach()
    {
        if (!empty($_POST['id']) && $_POST['id'] !== 'all') {
            echo json_encode($this->sachModel->getSachfromID($_POST['id']));
        } else {
            echo json_encode($this->sachModel->getSach());
        }
    }

    function UpdateProduct()
    {
        $id_sach = $_POST['idsach'];
        $namesach = $_POST['namesach'];
        $tacgia = $_POST['tacgia'];
        $name_nxb = $_POST['name_nxb'];
        $namxb = $_POST['namxb'];
        $giaban = $_POST['giaban'];
        $giamgia = $_POST['giamgia'];
        $danhmuc = $_POST['danhmuc'];
        $theloai = $_POST['theloai'];
        $mota = $_POST['mota'];
        $soluong = $_POST['soluong'];
        if (isset($_FILES['image'])) {
            $targetDir = "media/img_product/";
            if (!is_dir($targetDir)) {
                // Thông báo lỗi
                echo json_encode([
                    "status" => "error",
                    "message" => "Thư mục '$targetDir' không tồn tại."
                ]);
                exit;
            }
            $fileName = uniqid() . "-" . basename($_FILES['image']['name']);
            $targetFilePath = $targetDir . $fileName;
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

            // Kiểm tra định dạng file hợp lệ
            $allowedTypes = array("jpg", "jpeg", "png", "gif");
            if (!in_array($fileType, $allowedTypes)) {
                echo json_encode(["status" => "error", "message" => "Chỉ chấp nhận file JPG, JPEG, PNG, GIF."]);
                exit;
            }

            // Di chuyển file vào thư mục "media"
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                $result = $this->sachModel->update($id_sach, $namesach, $tacgia, $name_nxb, $namxb, $danhmuc, $theloai, $giaban, $giamgia, $soluong, $mota, $fileName);
                echo json_encode($result);
            } else {
                echo json_encode(["status" => "error", "message" => "Lỗi khi tải lên file."]);
            }
        } else {
            $image = $_POST['image'];
            $result = $this->sachModel->update($id_sach, $namesach, $tacgia, $name_nxb, $namxb, $danhmuc, $theloai, $giaban, $giamgia, $soluong, $mota, $image);
            echo json_encode($result);
        }
    }
    function XoaSanPham()
    {
        $id = $_POST['id'];
        $list_product = $this->ctietdonhangModel->searchBySanPham($id);
        if (empty($list_product)) {
            $result = $this->sachModel->delete($id);
        } else {
            $result = $this->sachModel->setTrangThai($id);
        }
        echo json_encode($result);
    }
    function getQuyen()
    {
        if (isset($_POST['quyen'])) {
            echo json_encode($this->nhomquyenModel->getAll());
        }
    }
    function getNhanVien()
    {
        if (isset($_POST['id'])) {
            echo json_encode($this->nhanvienModel->getNhanVienfromID($_POST['id']));
        }
    }
    function addNhanVien()
    {
        $name = $_POST['name'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $luong = $_POST['luong'];
        $quyen = $_POST['quyen'];
        $status = $_POST['status'];
        $pass = md5($_POST['pass']);
        $result = $this->nhanvienModel->add($name, $diachi, $sdt, $luong, $quyen, $pass, $status);
        echo json_encode($result);
    }
    function udtNhanVien()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $luong = $_POST['luong'];
        $quyen = $_POST['quyen'];
        $status = $_POST['status'];
        $pass = !empty($_POST['pass']) ? md5($_POST['pass']) : "";

        $result = $this->nhanvienModel->update($id, $name, $diachi, $sdt, $luong, $quyen, $pass, $status);
        echo json_encode($result);
    }
    function XoaNhanVien()
    {
        $id = $_POST['id'];
        $result = $this->nhanvienModel->remove($id);
        echo json_encode($result);
    }
    // Action chính
    function phieunhap()
    {
        // Kiểm tra session tồn tại
        if (!isset($_SESSION) || !isset($_SESSION['hanhdong'])) {
            $this->view("page/loginAdmin", []);
            return;
        }

        // Kiểm tra quyền với mảng đã được khởi tạo
        if (!in_array(6, $_SESSION['hanhdong'])) {
            $this->view("page/myerrol", ['href' => 'dashboard']);
            return;
        }

        $listPhieu = $this->phieunhapModel->getAllPhieuNhap();
        $this->view("admin_view", [
            "title" => "Quản lý Phiếu nhập",
            "content" => "Phiếu nhập",
            "Page" => "phieunhap",
            "script" => "phieunhap",
            "listPhieu" => $listPhieu
        ]);
    }
    function getPhieuNhap()
    {
        if (isset($_POST['id'])) {
            echo json_encode($this->phieunhapModel->getphieunhap($_POST['id']));
        }
    }
    function getChiTietPhieu()
    {
        if (isset($_POST['id'])) {
            echo json_encode($this->phieunhapModel->getChiTietPhieu($_POST['id']));
        }
    }
    public function getNCC()
    {
        header('Content-Type: application/json');
        echo json_encode($this->nhaCungCapModel->getAllNCC());
    }


    // API: Xử lý thêm phiếu
    function addPhieuNhap() {
    // Nhận dữ liệu JSON gửi từ client
    $data = json_decode(file_get_contents('php://input'), true);

    // Kiểm tra session nhân viên
    if (!isset($_SESSION['id_nv'])) {
        echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập']);
        return;
    }

    // Lấy ID_NV từ session
    $id_nv = $_SESSION['id_nv'];

    // Kiểm tra dữ liệu đầu vào (LOẠI BỎ KIỂM TRA id_nv TRONG $data)
    if (!isset($data['NgayNhap']) || !isset($data['ID_NCC']) || !isset($data['ChiTiet']) || !is_array($data['ChiTiet'])) {
        echo json_encode([
            'success' => false,
            'message' => 'Dữ liệu không hợp lệ!'
        ]);
        return;
    }

    // Gọi model và truyền ID_NV từ session
    $result = $this->phieunhapModel->addPhieuNhap(
        $data['NgayNhap'], 
        $data['ID_NCC'], 
        $data['ChiTiet'], 
        $id_nv // Truyền ID_NV từ session vào đây
    );

    // Trả về kết quả
    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Thêm phiếu nhập thành công']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Thêm phiếu nhập thất bại.']);
    }
}
    // API: Xóa phiếu
    function deletePhieu()
    {
        $id = $_POST['id'];
        $result = $this->phieunhapModel->deletePhieuNhap($id);
        echo json_encode(['success' => $result]);
    }

    function updatePhieuNhap()
    {
        $id_phieunhap = $_POST['id_phieunhap'];
        $id_ncc = $_POST['id_ncc'];
        $ngaynhap = $_POST['ngaynhap'];
        $tongtien = $_POST['tongtien'];
        $id_nv = $_POST['id_nv'];

        $result = $this->phieunhapModel->updatephieunhap($id_phieunhap, $id_ncc, $ngaynhap, $tongtien, $id_nv);
        echo json_encode($result);
    }
   function getUser()
    {
        if (isset($_POST['idkhachhang'])) {

            echo json_encode($this->khachhangModel->getUserById($_POST['idkhachhang']));
        }
    }
    function getNCCap()
    {
        if (isset($_POST['id'])) {

            echo json_encode($this->nhaCungCapModel->getNCC1($_POST['id']));
        }
    }
    function themKhachHang()
    {
        $lastName = (isset($_POST["lastName"])) ? $_POST["lastName"] : "";
        $firstName = (isset($_POST["firstName"])) ? $_POST["firstName"] : "";
        $email = (isset($_POST["email"])) ? $_POST["email"] : "";
         $matKhau = (isset($_POST["matKhau"])) ? $_POST["matKhau"] : "";
        // $phone = (isset($_POST["phone"])) ? $_POST["phone"] : "";
     //   $diaChi = (isset($_POST["diaChi"])) ? $_POST["diaChi"] : "";
        $ngayDangKy = (isset($_POST["ngayDangKy"])) ? $_POST["ngayDangKy"] : "";

        $check = $this->khachhangModel->createByAdmin($lastName, $firstName, $email, $matKhau, $ngayDangKy);
        if (!$check) {
            echo json_encode("không thành coong");
        }
        echo json_encode("thành coong");
    }
    function suaKhachHang()
    {
        $name = (isset($_POST["name"])) ? $_POST["name"] : "";
        $id = (isset($_POST["id"])) ? $_POST["id"] : "";
        $email = (isset($_POST["email"])) ? $_POST["email"] : "";

        $check = $this->khachhangModel->updateUserByAdmin1($id, $name, $email);
        if (!$check) {
            echo json_encode("không thành coong");
        }
        echo json_encode("thành coong");
    }
    function setStatusKhachHang()
    {
        $id = (isset($_POST["id"])) ? $_POST["id"] : "";
        $status = (isset($_POST["status"])) ? $_POST["status"] : "";
        $check = $this->khachhangModel->setStatusByAdmin($id, $status);
        if (!$check) {
            echo json_encode("không thành coong");
        }
        echo json_encode("thành coong");
    }
    function xoaKhachHang()
    {
        $id = (isset($_POST["id"])) ? $_POST["id"] : "";
        $check = $this->khachhangModel->xoaUserByAdmin($id);
        if (!$check) {
            echo json_encode("không thành coong");
        }
        echo json_encode("thành coong");
    }
    function layDanhSachKhachHang()
    {
        // Lấy danh sách khách hàng từ model
       $data['list_khachhang'] = $this->khachhangModel->getAllUser();

        foreach ($data['list_khachhang'] as $user) {
            $trangThai = ($user["status"] == 0) ? "bị khóa" : "hoạt động";
            echo '
        <tr  id="' . $user["ID_Khach_Hang"] . '">
            <td>' . $user["ID_Khach_Hang"] . '</td>
            <td>' . $user["Ten_Khach_Hang"] . '</td>
            <td>' . $user["Email"] . '</td>
            <td>' . $user["Ngay_Dang_Ky"] . '</td>
            <td>' . $trangThai . '</td>
        </tr>
        ';
        }
    }
    function themNhaCungCap()
    {
        $name = (isset($_POST["name"])) ? $_POST["name"] : "";
        $lienHe = (isset($_POST["lienHe"])) ? $_POST["lienHe"] : "";
        $diaChi = (isset($_POST["diaChi"])) ? $_POST["diaChi"] : "";
        $email = (isset($_POST["email"])) ? $_POST["email"] : "";
        $check = $this->nhaCungCapModel->addNCC1($name, $diaChi, $lienHe,$email);
        if (!$check) {
            echo json_encode("không thành coong");
        }
        echo json_encode("thành coong");
    }
    function suaNhaCungCap()
    {
        $name = (isset($_POST["name"])) ? $_POST["name"] : "";
        $lienHe = (isset($_POST["lienHe"])) ? $_POST["lienHe"] : "";
        $diaChi = (isset($_POST["diaChi"])) ? $_POST["diaChi"] : "";
        $id = (isset($_POST["id"])) ? $_POST["id"] : "";

        $check = $this->nhaCungCapModel->updateNCC1($id, $name, $diaChi, $lienHe);
        if (!$check) {
            echo json_encode("không thành coong");
        }
        echo json_encode("thành coong");
    }
    function setStatusNCC()
    {
        $id = (isset($_POST["id"])) ? $_POST["id"] : "";
        $status = (isset($_POST["status"])) ? $_POST["status"] : "";
        $check = $this->nhaCungCapModel->setStatus1($id, $status);
        if (!$check) {
            echo json_encode("không thành coong");
        }
        echo json_encode("thành coong");
    }
    function xoaNhaCungCap()
    {
        $id = (isset($_POST["id"])) ? $_POST["id"] : "";
        $check = $this->nhaCungCapModel->xoaNhaCungCap1($id);
        if (!$check) {
            echo json_encode("không thành coong");
        }
        echo json_encode("thành coong");
    }
    function layDanhSachNCC()
    {
        // Lấy danh sách khách hàng từ model
        $result = $this->nhaCungCapModel->getAllNCC1();
        foreach ($result as $ncc) {
            echo '
        <tr  id="' . $ncc["ID_NCC"] . '">
            <td>' . $ncc["ID_NCC"] . '</td>
            <td>' . $ncc["Ten_NCC"] . '</td>
            <td>' . $ncc["Dia_Chi"] . '</td>
            <td>' . $ncc["SDT"] . '</td>
            <td>' . $ncc["Email"] . '</td>
        </tr>
        ';
        }
    }
    public function checkPhone()
    {
        $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
          $id = isset($_POST['id']) ? $_POST['id'] : ""; 
        $result = $this->khachhangModel->getAllUser();
        foreach ($result as $user) {
            if ($user["So_Dien_Thoai"] === $phone && $user["ID_Khach_Hang"] != $id ) {
                echo "1";
                return;
            }
        }
        echo "0";
    }
    public function checkEmail()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : "";
          $id = isset($_POST['id']) ? $_POST['id'] : ""; 
        $result = $this->khachhangModel->getAllUser();
        foreach ($result as $user) {
            if ($user["Email"] === $email&& $user["ID_Khach_Hang"] != $id) {
                echo "1";
                return;
            }
        }
        echo "0";
    }
    public function checkEmailNCC()
{
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $id = isset($_POST['id']) ? $_POST['id'] : ""; // Lấy ID hiện tại

    $result = $this->nhaCungCapModel->getAllNCC1();
    foreach ($result as $ncc) {
        // Nếu email trùng và KHÁC id thì mới báo trùng
        if ($ncc["Email"] === $email && $ncc["ID_NCC"] != $id) {
            echo "1";
            return;
        }
    }
    echo "0";
}

     public function checkPhoneNCC()
    {
        $phone = isset($_POST['lienhe']) ? $_POST['lienhe'] : "";
          $id = isset($_POST['id']) ? $_POST['id'] : ""; 
        $result = $this->nhaCungCapModel->getAllNCC1();
        foreach ($result as $ncc) {
            if ($ncc["SDT"] === $phone&& $ncc["ID_NCC"] != $id) {
                echo "1";
                return;
            }
        }
        echo "0";
    }
    function searchPhieuNhap() {
    $type = $_POST['type'];
    $keyword = $_POST['keyword'];
    
    $result = $this->phieunhapModel->searchPhieu($type, $keyword);
    echo json_encode($result);
}
}
