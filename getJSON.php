<?php
header("Content-Type: application/json");

$data = [
    "nav" => "你爷爷",
    "data" => [[
        "title" => "ling",
        "url" => "https://zeroling.com/"
    ],[
        "title" => "baidu",
        "url" => "https://baidu.com/"
    ],[
        "title" => "ling blog",
        "url" => "https://www.zeroling.com/"
    ],[
        "title" => "redrock",
        "url" => "http://hongyan.cqupt.edu.cn/"
    ],[
        "title" => "BridgeTest😈",
        "url" => "http://api.zeroling.com/LingJSBridgeTest/"
    ]]
];

echo json_encode($data);