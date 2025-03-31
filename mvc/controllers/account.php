<?php
class Account extends Controller
{
    function login()
    {
        $this->view('main_layout', [
            'Title' => 'Giới thiệu – MINH LONG BOOK',
            'page' => 'login',
            "plugin" => [
                "reset" => 1,
                "style" => 1
            ]
        ]);
    }
}
