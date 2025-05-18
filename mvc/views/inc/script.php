<script src="public/lib/bootstrap-4.5.3-dist/jquery-3.7.1.min.js"></script>
<script src="public/lib/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="public/js/script.js"></script>
<?php

if (isset($data["script"])) {

    echo '<script src="public/js/' . $data["script"] . '.js"></script>';
} ?>