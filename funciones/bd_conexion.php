<?php 
    $dbc = new mysqli('localhost', 'root','1234','contactos');
    
    if($dbc->connect_error) {
      echo $error = $dbc->connect_error;
    }
    

?>