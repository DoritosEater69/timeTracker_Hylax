<?php

global $wpdb;

isset($_POST["aktiv"]){

}

isset($_POST["pause"]){
    
}

isset($_POST["feierabend"]){
    
}

isset($_POST["init"]){
   	$results = $wpdb->get_results("SELECT *  FROM ".$wpdb->prefix."tracker WHERE aktiv IS 'true' OR pause IS 'true'");
}
?>
