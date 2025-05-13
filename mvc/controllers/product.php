<?php
class Product extends Controller
{
    public $bookModel;

    public function __construct()
    {
        $this->bookModel = $this->model("SachModel");
    }

    public function detail($slugAndId)
    {
        // Tách ID từ slug-url (VD: sach-hay-cuc-hay-12 → ID = 12)
        $parts = explode("-", $slugAndId);
        $id = (int)end($parts);

        $product = $this->bookModel->getSachfromID($id);

        if (empty($product)) {
            // Không tìm thấy sách
            $this->view("main_layout", [
                "page" => "404"
            ]);
            return;
        }

        $this->view("main_layout", [
            "Title" => $product[0]['Ten_Sach'],
            "page" => "product_detail", // View bạn tạo
            "product" => $product[0]
        ]);
    }
}
?>