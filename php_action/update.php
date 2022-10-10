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
    //retirar espaços
    $var = ltrim($var);
    return $var;
}
function clear2($input){
    global $connect;
    //sql
    $var = mysqli_escape_string($connect, $input);
    //xss
    $var = htmlspecialchars($var);
    //replace
    $str = array("(", ")", "-", ".", " " );
    $var = str_replace($str,'', $var);
    return $var;
}

if(isset($_POST['btn-editar-cliente'])){
    $nome = clear($_POST['nome']);
    $apelido = clear($_POST['apelido']);
    $email = clear($_POST['email']);
    $idade = clear($_POST['idade']);
    $whatsapp = clear2($_POST['whatsapp']);
    $instagram = clear($_POST['instagram']);
    $id = clear($_POST['id']);
    $idtipo = clear($_POST['idtipo']);
    $idestado = clear($_POST['idestado']);
    $logradouro = clear($_POST['logradouro']);
    $complemento = clear($_POST['complemento']);
    $numero = clear($_POST['numero']);
    $cep = clear2($_POST['cep']);

    $sql = "UPDATE entidades SET nome = '$nome', apelido = '$apelido', email = '$email', idade = '$idade', whatsapp = '$whatsapp', instagram = '$instagram', idtipo = '$idtipo', idestado = '$idestado' WHERE id = '$id'";

    $sql2 = "UPDATE entidadesendereco SET idestado = '$idestado', logradouro = '$logradouro', complemento= '$complemento', numero = '$numero', cep = '$cep' WHERE identidade = '$id'";

    if(mysqli_query($connect, $sql)){
        mysqli_query($connect, $sql2);
        $_SESSION['mensagem']= "Atualizado com sucesso!";
        header('Location: ../entidades/entidades.php');
    }else{
        $_SESSION['mensagem']="Erro ao Atualizar!";
        header('Location: ../entidades/entidades.php');
    }
}
?>