<?php

/**
 * ASTのJSONから行番号に関するデータを削除する
 * @param $tree ASTのJSON
 */
function removeLineno($tree)
{
    if (is_array($tree)) {
        return array_map(function ($_) {
            return removeLineno($_);
        }, $tree);
    } elseif (is_object($tree)) {
        $copy = new \stdClass;
        foreach ($tree as $key => $val) {
            if ($key === "lineno" || $key === "endLineno" || $key === "docComment") {
                $copy->{$key} = "";
            } else {
                $copy->{$key} = removeLineno($val);
            }
        }
        return $copy;
    } else {
        return $tree;
    }
}

try {
    $json = stream_get_contents(fopen("php://stdin", "r"));
    $decoded = json_decode($json);
    if($decoded === NULL){
        throw new \Exception("invalid json");
    }
    echo json_encode(removeLineno($decoded), JSON_PRETTY_PRINT);
} catch (Exception $e) {
    fputs(STDERR, $e->getMessage());
}
