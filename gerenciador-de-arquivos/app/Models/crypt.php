<?php

class Cripto
{
    private $senha;

    public function setSenha($senhaDescr)
    {
        $this->senha= $senhaDescr;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function criptografaSenha()
    {
        $senhaDescri= $this->getSenha();
        $senhaCripto= password_hash($senhaDescri,PASSWORD_DEFAULT);
        return $senhaCripto;
    }

}



?>
