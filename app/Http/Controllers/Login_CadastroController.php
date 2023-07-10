<?php 
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Banco;
use App\Models\Cookie;
use App\Exceptions\UserExistente;
use App\Exceptions\EmailExistente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Login_CadastroController extends Controller
{

public function cadastro(Request $request)
{
    if(isset($_COOKIE['DADOS_LOGIN']))
        {
            return redirect('/paginainicial');
        }
                    $email = $request->input("email1");
                    $usuario = $request->input("usuario1");
                    $senha =  $request->input("senha");
                
                    try
                    {
                        Banco::cadastro($email,$usuario,$senha);
                        return redirect('/login');
                    }
                    catch(EmailExistente $e)
                    {
                        $mensagem="Email ja  cadastrado";
                        $mensagemCodificada = urlencode($mensagem);
                        return redirect("/cadastro?mensagem=" . $mensagemCodificada);
                    }
                    catch(UserExistente $e)
                    {
                        $mensagem="Nome de usuario ja  cadastrado";
                        $mensagemCodificada = urlencode($mensagem);
                        return redirect("/cadastro?mensagem=" . $mensagemCodificada);
                    }    
}
public function login()
{
                $email = $_POST['email2'];
                $senha= $_POST['senha'];
               if (Banco::login($email,$senha) == true)
               {
                $objeto_cookie= new Cookie();
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