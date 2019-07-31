<?php
    if (!empty($_POST['email']) && !empty($_POST['senha'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $linkDB = mysqli_connect("localhost", "root", "", "escola", 3306);
        $resposta = mysqli_query($linkDB, "SELECT email, senha from alunos;");
        $resposta = mysqli_fetch_all($resposta);
        for ($i = 0; $i < count($resposta); $i++){
            $arr[$i] = $resposta[$i];
            for ($b = 0; $b < count($arr[$i]); $b++){
                if ($email == $resposta[$i][$b] && $senha == $resposta[$i][$b+1]) {
                    echo "Entrou <br>";
                    return;
                } else {
                    echo "Não entrou <br>";
                    return;
                }
            }
            
        }
    } else {
        include_once '../login.html';
    }
?>