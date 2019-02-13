<?php
//Iniciar sessão
session_start();
//Conexão
require_once 'db_connect.php';

//Inserir dados do form
if(isset($_POST['btn-create'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $endereco = mysqli_escape_string($connect, $_POST['endereco']);
    $numero = mysqli_escape_string($connect, $_POST['numero']);
    $bairro = mysqli_escape_string($connect, $_POST['bairro']);
    $cidade = mysqli_escape_string($connect, $_POST['cidade']);
    $cep = mysqli_escape_string($connect, $_POST['cep']);
    $estado = mysqli_escape_string($connect, $_POST['estado']);
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);

    $sql = "INSERT INTO cliente (nome, endereco, numero, bairro,
        cidade, uf, cep, email, cpf) VALUES ('$nome', '$endereco',
        '$numero', '$bairro', '$cidade', '$estado', '$cep', '$email', '$cpf')";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../listCliente.php?sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ../index.php?sucesso');
    endif;
endif;
