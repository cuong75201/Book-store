<?php
class ProductController extends Controller {
    private $sachModel;

    public function __construct() {
        $this->sachModel = $this->model("SachModel");
    }
    public function detail($productId) {
        // Model trả về mảng nhiều dòng, nên lấy phần tử đầu tiên
        $productList = $this->sachModel->getSachfromID($productId);

        if (!$productList || count($productList) === 0) {
            $this->view('error_404');
            return;
        }

        $product = $productList[0]; 
        
        $this->view('product_detail', [
            'Title' => $product['Ten_Sach'] . ' | MINH LONG BOOK',
            'product' => $product
        ]);
    }
}
