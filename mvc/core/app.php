    <?php
    class app{
        protected $controller="home";
        protected $action="default";
        protected $params=[];
        function __construct()
        {
            $arr=$this->URLprocess(); 
            if($arr!=NULL){
                if(file_exists('mvc/controllers/'.$arr[0].".php")){
                    $this->controller=$arr[0];
                    unset($arr[0]);
                }
                else{
                    $this->controller="myerrol";
                }
            }
            require "mvc/controllers/". $this->controller .".php";  //require pages.php
            $this->controller=new $this->controller; // $this->controller= new page()
            if(isset($arr[1])){
                if(method_exists($this->controller,$arr[1])){
                    $this->action=$arr[1];

                } else{
                    $this->controller = 'myerror';
                    require "./mvc/controllers/". $this->controller .".php";
                    $this->controller=new $this->controller;
                }
                unset($arr[1]);
            }
            $this->params=$arr?array_values($arr):[];
            try{
                call_user_func_array([$this->controller,$this->action],$this->params);
            } catch(ArgumentCountError $e){
                $this->controller='myerrol';
                require "./mvc/controllers/". $this->controller .".php";
                $this->controller=new $this->controller;
                $this->action='default';
                call_user_func_array([$this->controller,$this->action],$this->params);
            }
        }
        function URLprocess(){
            if(isset($_GET['url'])){
                return explode("/", filter_var(trim($_GET["url"], "/")));
            }
        }
    }