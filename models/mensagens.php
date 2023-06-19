<?php   
    class Mensagem
    {   
        private $texto; 

        public function  getMensagemCadastro($mensagem)
        {
            $this->texto = $mensagem;
            return self::setMensagemCadastro();
        }
        public function setMensagemCadastro()
        {
            $mensagemCodificada = urlencode($this->texto);
            $url = "../views/cadastro.php?mensagem=" . $mensagemCodificada;
            header("Location: " . $url);
        }
    }
?>