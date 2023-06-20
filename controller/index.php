<?php 
    require'../models/banco.php';
    require '../models/mensagens.php';
    header("Location:../views/cadastro.php");

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if(isset($_POST['email1']) and isset($_POST['usuario1']))
            {
                $email = $_POST["email1"];
                $usuario = $_POST["usuario1"];
                $senha = $_POST["senha"];
            
                    if(Banco::cadastro($email,$usuario,$senha) == "email")
                    {
                        $mensagem="Email ja  cadastrado";
                        $objeto= new Mensagem;
                        return $objeto->getMensagemCadastro($mensagem);
                    }
                    elseif(Banco::cadastro($email,$usuario,$senha) == "user")
                    {
                        $mensagem="Nome de usuario ja  cadastrado";
                        return $objeto->getMensagemCadastro($mensagem);
                    }
                    elseif(Banco::cadastro($email,$usuario,$senha)==true)
                    {
                        header("Location:../views/login.php");
                    }
            }    
            elseif(isset($_POST['email2']))
            {
                $email = $_POST['email2'];
                $senha= $_POST['senha'];
                var_dump(Banco::login($email,$senha));
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