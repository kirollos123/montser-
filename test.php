<?php
$bool="KIRO";
var_dump( filter_var($bool,258,FILTER_NULL_ON_FAILURE));
echo "<br>";
$url ="https://www.php.net/manual/en/function.filter-var.php";
var_dump( filter_var($url,FILTER_VALIDATE_URL,
["flages"=>FILTER_NULL_ON_FAILURE |FILTER_FLAG_PATH_REQUIRED|FILTER_FLAG_QUERY_REQUIRED]));
$ip ="192.168.1.1";
var_dump( filter_var($ip,FILTER_VALIDATE_IP,FILTER_FLAG_IPV4));



?>