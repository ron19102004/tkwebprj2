<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/db.config.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/enum.util.php");

$sqlFile = $_SERVER['DOCUMENT_ROOT'] . "/src/migrations/create_table.sql";
$sql = file_get_contents($sqlFile);
try {
    DB::getConnection()->exec($sql);
    DB::close();
    echo "Success";
} catch (PDOException $th) {
    echo "". $th->getMessage() ."";
}
