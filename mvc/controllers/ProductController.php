<?php
class ProductController extends Controller {
    private $sachModel;

    public function __construct() {
        $this->sachModel = $this->model("SachModel");
    }
    public function detail($productId) {
        // Lấy sản phẩm từ Model (đã bao gồm slug)
        $productList = $this->sachModel->getSachfromID($productId);
        
        if (empty($productList)) {
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
