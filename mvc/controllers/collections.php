<?php
class Collections extends Controller
{
    public $bookModel;
    public $theloaiModel;
    public $danhmucModel;
    function __construct()
    {
        $this->danhmucModel = $this->model("DanhMucModel");
        $this->bookModel = $this->model("SachModel");
        $this->theloaiModel = $this->model("TheLoaiModel");
    }
    function default($params)
    {
        $danhmuc = ['sach-mam-non', 'sach-thieu-nhi', 'sach-ki-nang', 'sach-kinh-doanh', 'sach-me-va-be', 'sach-van-hoc', 'sach-tham-khao', 'notebook'];
        $i = 0;
        foreach ($danhmuc as $dm) {
            $i++;
            if ($params == $dm) {
                $list_category = $this->theloaiModel->getTenbyID($i);
                $list_product = $this->listSachPage(1, $i, 0);
                $total_page = $this->bookModel->getToTalPageDanhMuc($i, 6);
                $this->view("main_layout", [
                    "Title" => $this->danhmucModel->getNamebyId($i)[0] . "- MINH LONG BOOK",
                    'page' => 'category',
                    "plugin" => [
                        'list_product' => 1
                    ],
                    'list_product' => $list_product,
                    'list_category' => $list_category,
                    'id_danhmuc' => $i,

                    'id_theloai' => $this->theloaiModel->getIDbyIDdanhmuc($i),
                    'total_page' => $total_page,
                    'name' => $this->danhmucModel->getNamebyId($i)[0],
                    'params' => $params,
                    'script' => 'pagination',
                    "path_dm" => $params

                ]);
                return;
            }
        }
        $arr = explode("-", $params);
        $id_tl = (int)end($arr);
        $id_dm = $this->theloaiModel->getIDDanhMucbyIDTL($id_tl)[0];

        $list_category = $this->theloaiModel->getTenbyID($id_dm);
        $list_product = $this->listSachPage(1, $id_dm, $id_tl);
        $total_page = $this->bookModel->getToTalPageTheLoai($id_tl, 6);
        $this->view("main_layout", [
            "Title" => $this->theloaiModel->getNamebyIDTL($id_tl)[0] . "- MINH LONG BOOK",
            'page' => 'category',
            "plugin" => [
                'list_product' => 1
            ],
            'list_product' => $list_product,
            'list_category' => $list_category,
            'id_danhmuc' => $id_dm,
            'id_theloai' => $this->theloaiModel->getIDbyIDdanhmuc($id_dm),
            'total_page' => $total_page,
            'name' => $this->theloaiModel->getNamebyIDTL($id_tl)[0],
            'params' => $params,
            'script' => 'pagination',
            "path_dm" => $danhmuc[$id_dm - 1]

        ]);
    }

    function listSachPage($page, $id_danhmuc, $id_theloai)
    {
        if ($id_theloai != 0) {
            $id_sach = $this->bookModel->getSachfromTheLoai($id_theloai);
        } else {
            $id_sach = $this->bookModel->getIDfromDanhMuc($id_danhmuc);
        }

        $limit = 6;
        $offset = ($page - 1) * $limit;
        if ($offset + $limit > count($id_sach)) {
            $limit = count(($id_sach)) - $offset;
        }
        $product = [];
        for ($i = 0; $i < $limit; $i++) {
            $product = array_merge($product, $this->bookModel->getSachfromID($id_sach[$offset + $i]));
        }
        return $product;
    }
    public function pagination()
    {
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $id_tl = isset($_POST['id_tl']) ? $_POST['id_tl'] : 0;
        $id_dm = isset($_POST['id_dm']) ? $_POST['id_dm'] : 1;
        $list_product = $this->listSachPage($page, $id_dm, $id_tl);

        echo json_encode($list_product);
    }
}
