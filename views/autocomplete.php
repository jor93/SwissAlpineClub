<?php
/**
 * Created by PhpStorm.
 * User: jor
 * Date: 03.10.2016
 * Time: 15:47
 */

// postcode,
//$query = "SELECT LocationName FROM location;";
$query = "select NameCountry from country;";
$data = SQL::getInstance()->select($query)->fetchAll();
//var_dump($data);
echo json_encode($data);

