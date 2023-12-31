<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/db.config.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/migrations/create_table.migration.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/enum.util.php");

user_table(TABLE_DB::UP);
// user_table(TABLE_DB::DOWN);
// user_table(TABLE_DB::DATA);

color_table(TABLE_DB::UP);
// color_table(TABLE_DB::DOWN);
// color_table(TABLE_DB::DATA);
