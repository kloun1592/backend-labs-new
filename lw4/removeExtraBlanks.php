<?php
    require_once "include/common.inc.php";
    if(isset($_GET["text"]))
    {
    	$text = $_GET["text"];
        if (empty($text)) 
        {
    	    echo "Error. Please enter value of text parametr.";
        }
        else
        {
            echo removeExtraBlanks($text);
        }
    }
    else
    {
    	echo "Error. Please enter get text parametr.";
    }