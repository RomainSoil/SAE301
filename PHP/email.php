<?php

class email
{

    function email($mail)
{
    $aro = false;
    $esp = false;
    if (strlen($mail)>0){
        for ($i = 0; $i < strlen($mail); $i++) /// Vérifie qu 'il y a un @ dans l'email
        {
            if ($mail[$i] == "@") {
                if ($aro == true)     /// vérifie qu'il n' y a pas plusieur @ dans le mail
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
    }
     if ($aro == false) {
            echo "Ceci n'est pas une adresse mail valide";
        } elseif ($esp == true) {
            echo "il y a un espace";
    }
     else{
         return true;
     }
}


}

?>