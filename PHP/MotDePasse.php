<?php
class MotDePasse
{
    function password($mdp, $mdp2)
    {
        $complete= false;
        if ($mdp != $mdp2) {
            echo '<script>alert("Les mots de passes ne sont pas identiques")</script>';
        }
        elseif ($mdp != null) {
            $maj = false;
            $num = false;
            if (strlen($mdp) < 8) {
                echo '<script>alert("Le mot de passe est trop court")</script>';
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
                echo '<script>alert("Le mot de passe ne contiens pas de majuscules")</script>';
            } elseif ($num == false) {
                echo '<script>alert("Le mot de passe ne contient pas de chiffre")</script>';
            }
            else{
                $complete= true;
            }
        }
        echo "<br>";
        return $complete;
    }
function changement($bdd, $mdp, $conn){
    $hash =password_hash($mdp, PASSWORD_DEFAULT);
    $mail = $_SESSION['mail'];
    if ($conn->TrouveETu($bdd, $_SESSION['mail'])){
        $sql = "UPDATE etudiant SET mdp=:hash WHERE email=:mail";
        $req=$conn->prepare($sql);
        $req->bindParam('hash',$hash, PDO::PARAM_STR);
        $req->bindParam('mail',$mail, PDO::PARAM_STR);

    }
    elseif ($conn->TrouveProf($bdd, $_SESSION['mail'])){
        $sql = "UPDATE prof SET mdp='$hash' WHERE email='$mail'";
        $req=$conn->prepare($sql);
        $req->bindParam('hash',$hash, PDO::PARAM_STR);
        $req->bindParam('mail',$mail, PDO::PARAM_STR);
    }
    $req->execute();
    if ($req){
        echo 'mdp changé';
    }
}
}


?>