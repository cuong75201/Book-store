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

    }

    function default()
    {
        $this->view("page/loginAdmin", []);
    }
    function product()
    {
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
    function nhanvien()
    {
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
        $list_khachhang = $this->donhangModel->getAllKH();

        foreach ($list_khachhang as &$khachhang) {
            $khachhang['nameKH'] = $this->khachhangModel->getNamebyId($khachhang['ID_Khach_Hang'])[0];
        }
        $list_sach = $this->ctietpnhModel->getAllbyIDSach();
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
        $list_quyen = $this->nhomquyenModel->getAll();
        $this->view("admin_view", [
            "title" => "Phân quyền - Admin Web",
            "content" => "Phân quyền",
            "Page" => "phanquyen",
            'list_quyen' => $list_quyen,
            "script" => "phanquyen",
        ]);
    }
    function checkLogin()
    {

        $sdt = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST["password"]) ? $_POST['password'] : "";
        $result = $this->nhanvienModel->KiemTraNhanVien($sdt, $password);
        if ($result) {


            $nv = $this->nhanvienModel->getNVfromSDT($sdt);
            $idnv = $nv['ID_NV'];
            $ctiet = $this->ctietquyenModel->getById($nv['MaQuyen'])[0];
            $hanhdong = [];
            foreach ($ctiet as $ct) {
                $hanhdong[] = $ct['hanhdong'];
            }
            if (!setcookie("id_nv", 5, time() + 3600 * 248 * 30, "/")) {
                return;
            };
            echo "Đăng nhập thành công";
        } else {
            echo "Fail";
        }
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
    public function getSach() {
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
function phieunhap() {
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
function getChiTietPhieu() {
    if (isset($_POST['id'])) {
        echo json_encode($this->phieunhapModel->getChiTietPhieu($_POST['id']));
    }
}
public function getNCC() {
    header('Content-Type: application/json');
    echo json_encode($this->nhaCungCapModel->getAllNCC());
}


// API: Xử lý thêm phiếu
function addPhieuNhap()
{
    // Nhận dữ liệu JSON gửi từ client
    $data = json_decode(file_get_contents('php://input'), true);

    // Kiểm tra dữ liệu đầu vào
    if (!isset($data['NgayNhap']) || !isset($data['ID_NCC']) || !isset($data['ChiTiet']) || !is_array($data['ChiTiet'])) {
        echo json_encode([
            'success' => false,
            'message' => 'Dữ liệu không hợp lệ!'
        ]);
        return;
    }

    // Tách dữ liệu
    $ngayNhap = $data['NgayNhap'];
    $idNCC = $data['ID_NCC'];
    $chiTiet = $data['ChiTiet']; // Mảng chứa các sách: [ ['ID_Sach'=>..., 'SoLuong'=>..., 'GiaNhap'=>...], ...]

    // Gọi model để thêm phiếu nhập
    $result = $this->phieunhapModel->addPhieuNhap($ngayNhap, $idNCC, $chiTiet);

    // Trả về kết quả JSON
    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Them phieu nhap thanh cong']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Thêm phiếu nhập thất bại.']);
    }
}


// API: Xóa phiếu
function deletePhieu() {
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

}
