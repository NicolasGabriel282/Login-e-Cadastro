<?php
class Cokkie
{
    private $emailUsuario;

    public function set_cookieEmail($email)
    {
        $this->emailUsuario=$email;
    }
    private function get_cookieEmail()
    {
        return $this->emailUsuario;
    }
    public function cookie()
    {   
        $dado= $this->get_cookieEmail();
        $data= array(
            "Email"=>"$dado"
        );
        setcookie("DADOS_LOGIN",json_encode($data),time() + 3600);
    }
}
?>