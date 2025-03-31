
<?php
class home extends Controller
{
    function default()
    {
        $this->view('main', [
            "Title" => "MINH LONG BOOK - Ươm mầm tri thức",
            "plugin" => [
                "reset" => 1,
                "style" => 1,
            ],
            'script' => 'script'
        ]);
    }
}
