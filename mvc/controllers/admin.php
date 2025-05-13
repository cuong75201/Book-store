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
    function __construct()
    {
        $this->sachModel = $this->model("SachModel");
        $this->nhanvienModel = $this->model("NhanVienModel");
        $this->theloaiModel = $this->model("TheLoaiModel");
        $this->danhmucModel = $this->model("DanhMucModel");
        $this->donhangModel = $this->model("DonHangModel");
        $this->ctietdonhangModel = $this->model("ctiet_don_hangModel");
        $this->nhomquyenModel = $this->model("NhomQuyenModel");
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
    function checkLogin()
    {
        $sdt = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST["password"]) ? $_POST['password'] : "";
        $result = $this->nhanvienModel->KiemTraNhanVien($sdt, $password);
        if ($result) {
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
    function getSach()
    {
        if (isset($_POST['id'])) {
            echo json_encode($this->sachModel->getSachfromID($_POST['id']));
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
}
