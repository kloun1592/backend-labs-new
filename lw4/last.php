<?php
    require_once "include/common.inc.php";
    if(isset($_GET["str"]))
    {
    	$str = $_GET["str"];
        if (empty($str)) 
        {
    	    echo "Error. Please enter value of str parametr.";
        }
        else
        {
            echo last($str);
        }
    }
    else
    {
    	echo "Error. Please enter get str parametr.";
    }