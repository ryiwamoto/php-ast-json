<?php
$file = stream_get_contents(fopen("php://stdin", "r"));
$ast = ast\parse_code($file, $version = 40);
echo json_encode($ast);
