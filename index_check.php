<?php
    include 'layouts/session.php';
    
    if ($_SESSION["userrole"] == "05") 
    {
        header("location: index_hh.php");     
    }else if ($_SESSION["userrole"] == "04")
    {
        header("location: index_con.php");     
    }else
     {
        header("location: index.php");     
    }
?>
