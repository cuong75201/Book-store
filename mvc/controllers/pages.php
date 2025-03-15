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
}