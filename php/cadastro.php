<?php
    if(empty($_POST) == false){
    $nome = isset($_POST['nome'])?trim($_POST['nome']) : "";
    $cpf = isset($_POST['cpf'])? $_POST['cpf'] : "";
    $email = isset($_POST['email'])? $_POST['email'] : "";
    $senha = isset($_POST['senha'])? $_POST['senha'] : "";
    $confSenha = isset($_POST['confSenha'])? $_POST['confSenha'] : "";
    $termos = isset($_POST['termos'])? $_POST['termos'] : "";

        if(preg_match("/[a-z]+/", $nome) && filter_var($email, FILTER_VALIDATE_EMAIL) != false && $termos == "Aceito" && $senha == $confSenha && !empty($senha) && strlen($senha) >= 8 && preg_match("/\d{3}.?\d{3}.?\d{3}\-?\d/", $cpf, $matches)){
            $linkDB = mysqli_connect("localhost", "root", "", "escola", 3306);
            $resposta = mysqli_query($linkDB, "SELECT nome from alunos;");
            if (mysqli_query($linkDB, "INSERT INTO alunos(nome, cpf, email, senha) VALUES('$nome', '$cpf', '$email', '$senha');")) {
                echo "Cadastrado com sucesso";
                mysqli_close($linkDB);
            } else {
                echo "Falhou no cadastro <br>";
                echo "CPF já cadastrado por outra pessoa"; 
            }
            
            
        }else {
            echo "Falhou no cadastro";
        }
    }

?>

