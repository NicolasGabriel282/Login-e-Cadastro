<?php 
require 'exceptions.php';
require 'crypt.php';
class Banco
{
    private static function conexao()
    {
        $conn = new PDO("mysql:host=localhost;dbname=db_usuario","root","admin");
        return $conn;
    } 


    public static function cadastro($email,$nome,$senha)
    {
        $conn=self::conexao();
        $stmt=$conn -> prepare ("SELECT email,usuario from Usuarios where
         email = :EMAIL  or usuario = :USER");
        $stmt->bindParam(":EMAIL",$email);
        $stmt->bindParam(":USER",$nome);
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($dados as $row)
        {
                if($row['email'] === $email )
                {   
                    throw new EmailExistente();
                }
                elseif($row['usuario'] === $nome)
                {
                    throw new UserExistente();
                }
                
        }

        $classCrypto= new Cripto();
        $classCrypto-> setSenha($senha);
        $senhaCripto= $classCrypto->criptografaSenha();
        $stmt = $conn -> prepare("INSERT INTO Usuarios(email,usuario,senha) 
            VALUES(:EMAIL,:USER,:SENHA)");
        $stmt->bindParam(":EMAIL",$email);
        $stmt->bindParam(":USER",$nome);
        $stmt->bindParam(":SENHA",$senhaCripto);
        $stmt->execute();
        return true;
    }


    public static function 
    login($email,$senha)
    {
        $conn=self::conexao();
        $stmt= $conn-> prepare("SELECT email,senha from Usuarios where email = :EMAIL");
        $stmt->bindParam(":EMAIL",$email);
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($dados as $row)
            if ($row["email"]==$email and password_verify($senha,$row['senha']))
                {
                    return true;
                }
            else
            {
                return false;
            }
    }
}


?>