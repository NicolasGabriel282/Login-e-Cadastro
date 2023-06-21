<?php 
    require'../models/banco.php';
    require '../models/mensagens.php';
    header("Location:../views/cadastro.php");

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $objeto= new Mensagem;
            if(isset($_POST['email1']) and isset($_POST['usuario1']))
            {
                $email = $_POST["email1"];
                $usuario = $_POST["usuario1"];
                $senha = $_POST["senha"];
            
                try
                {
                    Banco::cadastro($email,$usuario,$senha);
                    header("Location:../views/paginainicial.php");
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
            }    
            elseif(isset($_POST['email2']))
            {
                $email = $_POST['email2'];
                $senha= $_POST['senha'];
               if (Banco::login($email,$senha) == true)
               {
                header("Location:../views/paginainicial.php");
               }
               else
               {
                $mensagem = "Email ou senha incorreta";
                $mensagemCodificada = urlencode($mensagem);
                $url="../views/login.php?mensagem=" . $mensagemCodificada;
                header("Location: " . $url);
               }
            }   
        }
?>