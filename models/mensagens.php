<?php   
    class Mensagem
    {   
        private static $texto; 

        public function  getMensagemCadastro($mensagem)
        {
            self::$texto = $mensagem;
            return self::setMensagemCadastro();
        }
        private static function setMensagemCadastro()
        {
            $mensagemCodificada = urlencode(self::$texto);
            $url = "../views/cadastro.php?mensagem=" . $mensagemCodificada;
            header("Location: " . $url);
        }
    }
?>