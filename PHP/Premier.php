<?php

class Premier
{
    function premier($name){
        if (($_SESSION[$name]==null)){
            $_SESSION[$name]=1;
        }
        else{
            $_SESSION[$name]=2;
        }
    }
}