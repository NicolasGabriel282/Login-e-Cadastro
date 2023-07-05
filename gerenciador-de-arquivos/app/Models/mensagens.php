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

        public function  getMensagemLogin($mensagem)
        {
            self::$texto = $mensagem;
            return self::setMensagemLogin();
        }
        private static function setMensagemLogin()
        {
            $mensagemCodificada = urlencode(self::$texto);
            $url="../views/login.php?mensagem=" . $mensagemCodificada;
            header("Location: " . $url);
        }
    }
?>