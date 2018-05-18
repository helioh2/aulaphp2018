<?php

$q = $_GET["q"];
echo $q;
$sql = "SELECT * FROM cliente WHERE nome LIKE '%$q%'"

?>