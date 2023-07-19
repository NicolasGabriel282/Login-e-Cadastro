<?php 
require'../models/banco.php';
require '../models/mensagens.php';

$email = $_POST["email1"];
$usuario = $_POST["usuario1"];
$senha = $_POST["senha"];
$objeto= new Mensagem;
try
{
    Banco::cadastro($email,$usuario,$senha);
    header("Location:../views/login.php");
}
catch(EmailExistente $e)
{
    $mensagem="Email ja  cadastrado";
    return $objeto->getMensagemCadastro($mensagem);
}
catch(UserExistente $e)
{
    $mensagem="Nome de usuario ja  cadastrado";
    return $objeto->getMensagemCadastro($mensagem);
} 

?>