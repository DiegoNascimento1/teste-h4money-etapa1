<?php
//Iniciar sessão
session_start();
//Conexão
require_once 'db_connect.php';

//Inserir dados do form
if(isset($_POST['btn-edit'])):
    $id = mysqli_escape_string($connect, $_POST['id']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $endereco = mysqli_escape_string($connect, $_POST['endereco']);
    $numero = mysqli_escape_string($connect, $_POST['numero']);
    $bairro = mysqli_escape_string($connect, $_POST['bairro']);
    $cidade = mysqli_escape_string($connect, $_POST['cidade']);
    $cep = mysqli_escape_string($connect, $_POST['cep']);
    $estado = mysqli_escape_string($connect, $_POST['estado']);
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);

    $sql = "UPDATE cliente SET nome = '$nome', endereco = '$endereco', numero = '$numero',
     bairro = '$bairro', cidade = '$cidade', uf = '$estado', cep = '$cep', email = '$email', cpf = '$cpf' WHERE id = '$id'";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../listCliente.php?sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        header('Location: ../index.php?sucesso');
    endif;
endif;
