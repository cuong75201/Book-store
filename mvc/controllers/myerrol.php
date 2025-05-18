<?php
class myerrol extends Controller
{
    function default()
    {
        $this->view("page/myerrol", [
            'href' => "home",
        ]);
    }
}
