<?php 
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Banco;
use App\Models\Mensagem;
use App\Exceptions\UserExistente;
use App\Exceptions\EmailExistente;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;

class Login_CadastroController extends Controller
{

public function cadastro(Request $request)
{
    if(isset($_COOKIE['DADOS_LOGIN']))
        {
            header("Location:../views/paginainicial.php");
            exit();
        }
                $objeto= new Mensagem;
                    $email = $request->input("email1");
                    $usuario = $request->input("usuario1");
                    $senha =  $request->input("senha");
                
                    try
                    {
                        Banco::cadastro($email,$usuario,$senha);
                        redirect('/login');
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