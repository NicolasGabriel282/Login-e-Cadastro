<?php 
    require '../models/banco.php';
    header("Location:../views/cadastro.php");

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if(isset($_POST['email1']) and isset($_POST['usuario1']))
            {
                $email = $_POST["email1"];
                $usuario = $_POST["usuario1"];
                $senha = $_POST["senha"];
                if (Banco::cadastro($email,$usuario,$senha) == true)
                {
                    header("Location:../views/login.php");
                }
            
                elseif(Banco::cadastro($email,$usuario,$senha) == false)
                    {
                        $mensagem="Email ou usuario ja cadastrado";
                        $mensagemCodificada = urlencode($mensagem);
                        $url = "../views/cadastro.php?mensagem=" . $mensagemCodificada;
                        header("Location: " . $url);
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