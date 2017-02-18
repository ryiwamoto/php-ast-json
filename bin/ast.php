<?php
$fileName = $argv[1];
$ast = ast\parse_file($fileName, $version = 40);
echo json_encode($ast);
