
<?php
class home extends Controller
{
    public $cartModel;
    function __construct()
    {
        $this->cartModel = $this->model("CartModel");
    }
    function default()
    {
        $user_email = isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : "";
        if(empty($user_email)){
            $item=0;
        }
        else{
            $item=count($this->cartModel->getAllProduct($user_email));
        }
        $_SESSION['item']=$item;
        $this->view('main', [
            "Title" => "MINH LONG BOOK - Ươm mầm tri thức",
            "plugin" => [
                "reset" => 1,
                "style" => 1,
            ],

        ]);
    }
}
