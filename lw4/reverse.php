<?php
    require_once "include/common.inc.php";
    if(isset($_GET["str"]))
    {
        $str = $_GET["str"];
        if ($str == null)
        {
            echo "Error. Please enter str parametr.";   
        }
        elseif (empty($str)) 
        {
            echo "Error. Please enter value of str parametr.";
        }
        else
        {
            echo reverse($str);
        }
    }
    else
    {
        echo "Error. Please enter get str parametr.";
    }