<?php

class MotDePasse
{

function password($mdp, $mdp2)
{
    $complete= false;
    if ($mdp == null or $mdp2 == null) {
        echo "<span style='color: red' >entrez un mot de passe</span>";
        $_POST['mail'] = "dsf";
    } elseif ($mdp != $mdp2) {
        echo "<span style='color: red ' >mots de passes differents</span>";
    }
    elseif ($mdp != null) {
        $maj = false;
        $num = false;
        if (strlen($mdp) < 8) {
            echo "Mot de passe trop court";
        }
        for ($i = 0; $i < strlen($mdp); $i++) {
            if (ord($mdp[$i]) < 91 and ord($mdp[$i]) > 64) /// Vérifie qu 'il y a au moins une majuscule dans le code
            {
                $maj = true;
            }
            if (ord($mdp[$i]) < 58 and ord($mdp[$i]) > 47) /// Vérifie qu 'il y a au moins un nombre dans le code
            {
                $num = true;
            }
        }
        if ($maj == false) {
            echo "Il faut une majuscule";
        } elseif ($num == false) {
            echo "il faut un numero";
        }
        else{
            $complete= true;
        }
    }
    echo "<br>";
    return $complete;
}
}

?>