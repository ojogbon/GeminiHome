<?php 


function listOfAllValidMenus ($menu) {

    $sql_query = "select * from menu_tbl where status = '0' and deleted = '0' ";
    return $menu->getAllMenuBySql($sql_query);
}

?>