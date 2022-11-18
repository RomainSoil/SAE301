<?php

/**
 *
 */
class email
{

    /**
     * @param $mail
     */
    function email($mail)
{
    $aro = false;
    $esp = false;
    if (isset($mail)){
        for ($i = 0; $i < strlen($mail); $i++) /// Vérifie qu 'il y a un @ dans l'email
        {
            if ($mail[$i] == "@") {
                if ($aro)     /// vérifie qu'il n' y a pas plusieurs @ dans le mail
                {
                    $aro = false;
                    break;
                }
                $aro = true;
            }
            if ($mail[$i] == " ") ///vérifie qu'il n' y a pas d'espace dans l'adresse mail
            {
                $esp = true;
            }
        }
        if ($esp == true) {
            echo '<script>alert("l\'adresse mail ne doit pas contenir d\'espace")</script>';
        }
        else{
            return true;
        }
    }


}


}

?>