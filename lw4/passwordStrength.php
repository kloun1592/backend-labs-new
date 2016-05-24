<?php
    require_once "include/common.inc.php";
    if(isset($_GET["password"]))
    {
    	$password = $_GET["password"];
        if (empty($password)) 
        {
    	    echo "Error. Please enter value of password parametr.";
        }
        else
        {
            echo "Password Strength: ";
            echo passwordStrength($password);
        }
    }
    else
    {
    	echo "Error. Please enter get password parametr.";
    }