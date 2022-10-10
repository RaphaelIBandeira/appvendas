<?php
require_once 'db_connect.php';

session_start();

//Funçao de limpar o que vem no input para evitar ataques de XSS (Cross Site Scripting) e tambem
//Sql inject
function clear($input){
    global $connect;
    //sql
    $var = mysqli_escape_string($connect, $input);
    //xss
    $var = htmlspecialchars($var);
    return $var;
}

if(isset($_POST['btn-deletar-cliente'])){

    $id = clear($_POST['id']);

    $sql = "DELETE FROM entidades WHERE id = '$id'";
    $sql2 = "DELETE FROM entidadesendereco where identidade = '$id'";

    if(mysqli_query($connect, $sql2)){
        mysqli_query($connect, $sql);
        $_SESSION['mensagem']= "Deletado com sucesso!";
        header('Location: ../entidades/entidades.php');
    }else{
        $_SESSION['mensagem']="Erro ao Deletar!";
        header('Location: ../entidades/entidades.php');
    }
}
