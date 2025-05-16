<?php 
class pages extends Controller{
    function about(){
        $this->view('main_layout',[
            'Title' =>'Giới thiệu – MINH LONG BOOK',
            'page'=>'about',
            "plugin" =>[
                "reset" => 1 ,
                "style"=> 1,
            ],
            'script' => 'script'
        ]);
    }
    function hdmua(){
        $this->view('main_layout',[
            'Title' => 'Hướng dẫn mua hàng',
            'page' => 'hdmua',
            "plugin" =>[
                "reset" => 1 ,
                "style" => 1 ,
            ],
            'script' => 'script'
        ]);
    }   
    function userole(){
        $this->view('main_layout',[
            'Title' => 'Điều khoản sử dụng',
            'page' => 'userole',
            "plugin" =>[
                "reset" => 1 ,
                "style" => 1 ,
            ],
            'script' => 'script'
        ]);
    }   
    function ptthanhtoan(){
        $this->view('main_layout',[
            'Title' => 'Phương thức thanh toán',
            'page' => 'ptthanhtoan',
            "plugin" =>[
                "reset" => 1 ,
                "style" => 1 ,
            ],
            'script' => 'script'
        ]);
    }       
    function ptgiaohang(){
        $this->view('main_layout',[
            'Title' => 'Phương thức giao hàng',
            'page' => 'ptgiaohang',
            "plugin" =>[
                "reset" => 1 ,
                "style" => 1 ,
            ],
            'script' => 'script'
        ]);
    }      
    function csdoitra(){
        $this->view('main_layout',[
            'Title' => 'Chính sách đổi trả',
            'page' => 'csdoitra',
            "plugin" =>[
                "reset" => 1 ,
                "style" => 1 ,
            ],
            'script' => 'script'
        ]);
    }       
    function baomat(){
        $this->view('main_layout',[
            'Title' => 'Bảo mật thông tin',
            'page' => 'baomat',
            "plugin" =>[
                "reset" => 1 ,
                "style" => 1 ,
            ],
            'script' => 'script'
        ]);
    }  
    function lienhe(){
        $this->view('main_layout',[
            'Title' => 'Liên hệ',
            'page' => 'lienhe',
            "plugin" =>[
                "reset" => 1 ,
                "style" => 1 ,
            ],
            'script' => 'script'
        ]);
    } 
    function diemsach(){
        $this->view('main_layout',[
            'Title' =>'Điểm sách – MINH LONG BOOK',
            'page'=>empty($thamso) ? 'diemsach' : 'diemsach/'.$thamso,
            "plugin" =>[
                "reset" => 1 ,
                "style"=> 1,
            ],
            'script' => 'script'
        ]);
    }
     function tuyendung() {
        $this->view('main_layout', [
            'Title' => 'Tuyển dụng – MINH LONG BOOK',
            'page' => empty($thamso) ? 'tuyendung' : 'tuyendung/'.$thamso,
            "plugin" => [
                "reset" => 1,
                "style" => 1,
            ],
            'script' => 'script'
        ]);
    }    
}
