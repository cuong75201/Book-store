<?php
class donhangController extends Controller
{
    public $ctietdonhangModel;
    public $donhangModel;
    public $sachModel;
    public $pnhModel;
    public $userModel;
    function __construct()
    {

        $this->pnhModel = $this->model("pnhModel");
        $this->ctietdonhangModel = $this->model("ctiet_don_hangModel");
        $this->sachModel = $this->model("SachModel");
        $this->donhangModel = $this->model("DonHangModel");
        $this->userModel = $this->model("UserModel");
    }

    function getDonhang()
    {
        $id = $_POST['id'];
        $result = $this->ctietdonhangModel->getCTDH($id);
        $donhang = $this->donhangModel->search($id);
        foreach ($result as &$key) {
            $sach = $this->sachModel->getSachfromID($key['ID_Sach']);
            $key["Ten_Sach"] = $sach[0]['Ten_Sach'];
            $key['Trangthai'] = $donhang['Trang_Thai'];
        }
        echo json_encode($result);
    }
    function setTrangthai()
    {
        $result = $this->donhangModel->setTrangthai($_POST['id'], $_POST['trangthai']);
        echo json_encode($result);
    }
    function locdonhang()
    {
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $status = $_POST['status'];
        $city = $_POST['city'];
        $district = $_POST['district'];
        $donhang = [];
        if ($status != 0) {
            $donhang['Trang_Thai'] = "Trang_Thai =  $status";
        } else {
            $donhang['Trang_Thai'] = "";
        }
        if (!empty($startdate)) {
            // $donhang['startdate'] = $startdate;
            // $donhang['enddate'] = $enddate;
            $donhang['Ngay_Dat_Hang'] = " Ngay_Dat_Hang BETWEEN '$startdate 00:00:00' AND '$enddate 23:59:59'";
        } else {
            $donhang['Ngay_Dat_Hang'] = "";
        }
        if (!empty($district)) {
            $city = strtolower($city);
            $district = strtolower($district);
            $donhang['diachi'] = " LOWER(SUBSTRING_INDEX(Dia_Chi_Giao_Hang, ',', -1)) LIKE '%$city%'
AND LOWER(TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(Dia_Chi_Giao_Hang, ',', 2), ',', -1))) LIKE '%$district%'";
        } elseif (!empty($city)) {
            $donhang['diachi'] = " LOWER(SUBSTRING_INDEX(Dia_Chi_Giao_Hang, ',', -1)) LIKE '%$city%'";
        } else {
            $donhang['diachi'] = "";
        }
        echo json_encode($this->donhangModel->LocDonHang($donhang));
    }
    function getDonhangbyIDKH()
    {
        if (!isset($_POST['start'])) {
            $id = $_POST['id'];
            $result = $this->donhangModel->searchByKhachHang($id);
            echo json_encode($result);
        } else {
            $id = $_POST['id'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $result = $this->donhangModel->getDonHangbyDate($id, $start, $end);
            echo json_encode($result);
        }
    }
    function getNameKH()
    {
        $result = $this->userModel->getAllUser();
        echo json_encode($result);
    }
    function getphieunhap()
    {
        $start = $_POST['start'];
        $end = $_POST['end'];
        if ($start == $end) {
            $result = $this->pnhModel->getPNHByDate($start);
        } else {
            $result = $this->pnhModel->getPNHByDateRange($start, $end);
        }
        echo json_encode($result);
    }
}
