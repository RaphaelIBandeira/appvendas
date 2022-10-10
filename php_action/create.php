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

print_r($_POST['btn-cadastrar-cliente']);   

if(isset($_POST['btn-cadastrar-cliente'])){

    $nome = clear($_POST['nome']);
    $idade = clear($_POST['idade']);
    $apelido = clear($_POST['apelido']);
    $email = clear($_POST['email']);
    $whatsapp = clear2($_POST['whatsapp']);
    $instagram = clear($_POST['instagram']);
    $idtipo = clear($_POST['id']);
    $idestado = clear($_POST['idestado']);
    $logradouro = clear($_POST['logradouro']);
    $complemento = clear($_POST['complemento']);
    $numero = clear($_POST['numero']);
    $cep = clear2($_POST['cep']);



    $sql = "insert into entidades(nome, idade, apelido, email, whatsapp, instagram, idtipo, idestado ) values ('$nome', '$idade', '$apelido', '$email', '$whatsapp', '$instagram', '$idtipo', '$idestado')";



    if(mysqli_query($connect, $sql)){
        $identidade = mysqli_insert_id($connect);
        $_SESSION['mensagem']= "Cadastro Realizado!";
        header('Location: ../entidades/entidades.php');

        $sql2 = "insert into entidadesendereco (logradouro, complemento, numero, cep, idestado, identidade) values ('$logradouro', '$complemento', '$numero', '$cep', '$idestado', '$identidade')";

        mysqli_query($connect, $sql2);
    }else{
        $_SESSION['mensagem']="Erro ao cadastrar!";
        header('Location: ../entidades/entidades.php');
    }
}

