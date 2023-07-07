<?php 
use Illuminate\Routing\Controller;
use App\Models\Banco;
use App\Models\Mensagem;
use App\Models\EmailExistente;
use App\Models\UserExistente;


class Login_CadastroController extends Controller
{

public function cadastro()
{
    if(isset($_COOKIE['DADOS_LOGIN']))
        {
            header("Location:../views/paginainicial.php");
            exit();
        }
            header("Location:../views/login.php");
                $objeto= new Mensagem;
                    $email = $_POST["email1"];
                    $usuario = $_POST["usuario1"];
                    $senha = $_POST["senha"];
                
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
}
public function login()
{
                $objeto= new Mensagem;
                $email = $_POST['email2'];
                $senha= $_POST['senha'];
               if (Banco::login($email,$senha) == true)
               {
                $objeto_cookie= new Cokkie();
                $objeto_cookie->set_cookieEmail($email);
                $objeto_cookie->cookie();
                header("Location:../views/paginainicial.php");
               }
               else
               {
                $mensagem = "Email ou senha incorreta";
                return $objeto->getMensagemLogin($mensagem);
               }
            }   
        
}

?>