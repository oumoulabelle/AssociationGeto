<?php 

    function generateToken($length)
    {
        $alphaNum = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        substr(str_shuffle(tr_repeat($alphaNum, $length)), 0, 100);
      
    }
?>