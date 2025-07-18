    <?php
    class app
    {
        protected $controller = "home";
        protected $action = "default";
        protected $params = [];
        function __construct()
        {
            $arr = $this->URLprocess();
            // Xử lý route product/detail/{slug}-{id}
            if (!empty($arr) && $arr[0] === 'product' && isset($arr[1]) && $arr[1] === 'detail' && isset($arr[2])) {
                $slugWithId = $arr[2];
                // Tách ID từ phần cuối URL (ví dụ: "ten-sp-123" → id=123)
                $slugParts = explode('-', $slugWithId);
                $productId = end($slugParts); // Lấy phần tử cuối cùng

                // Gọi ProductController
                $this->controller = "ProductController";
                require "mvc/controllers/" . $this->controller . ".php";
                $this->controller = new $this->controller;
                $this->action = "detail";
                $this->params = [$productId];
                call_user_func_array([$this->controller, $this->action], $this->params);
                return;
            }

            // Handle checkout/index/{productId}/{quantity}
        if (!empty($arr) && $arr[0] === 'checkout' && isset($arr[1]) && $arr[1] === 'index' && isset($arr[2]) && isset($arr[3])) {
            $this->controller = "CheckoutController";
            require "mvc/controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;
            $this->action = "index";
            $this->params = [$arr[2], $arr[3]]; // productId, quantity
            call_user_func_array([$this->controller, $this->action], $this->params);
            return;
        }

        // Handle checkout/index and checkout/process
        if (!empty($arr) && $arr[0] === 'checkout') {
            $this->controller = "CheckoutController";
            require "mvc/controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;
            $this->action = isset($arr[1]) && method_exists($this->controller, $arr[1]) ? $arr[1] : "index";
            $this->params = array_slice($arr, 2);
            call_user_func_array([$this->controller, $this->action], $this->params);
            return;
        }
        
            if ($arr != NULL) {
                if (file_exists('mvc/controllers/' . $arr[0] . ".php")) {
                    $this->controller = $arr[0];
                    unset($arr[0]);
                } else {
                    $this->controller = "myerrol";
                }
            }
            require "mvc/controllers/" . $this->controller . ".php";  //require pages.php
            $this->controller = new $this->controller; // $this->controller= new page()
            if (isset($arr[1])) {
                if (method_exists($this->controller, $arr[1])) {
                    $this->action = $arr[1];
                } else {
                    $this->action = "default";
                }
            }
            $this->params = $arr ? array_values($arr) : [];
            try {
                call_user_func_array([$this->controller, $this->action], $this->params);
            } catch (ArgumentCountError $e) {
                $this->controller = 'myerrol';
                require "./mvc/controllers/" . $this->controller . ".php";
                $this->controller = new $this->controller;
                $this->action = 'default';
                call_user_func_array([$this->controller, $this->action], $this->params);
            }
        }
        function URLprocess()
        {
            if (isset($_GET['url'])) {
                return explode("/", filter_var(trim($_GET["url"], "/")));
            }
        }
    }
