<?php 

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
        $stmt=$conn -> prepare ("SELECT email,usuario from usuario where
         email = :EMAIL  or usuario = :USER");
        $stmt->bindParam(":EMAIL",$email);
        $stmt->bindParam(":USER",$nome);
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($dados as $row)
        {
                if($row['email'] === $email )
                {   
                    return "email";
                }
                elseif($row['usuario'] === $nome)
                {
                    return "user";
                }
                
        }
        $stmt = $conn -> prepare("INSERT INTO usuario(email,usuario,senha) 
            VALUES(:EMAIL,:USER,:SENHA)");
        $stmt->bindParam(":EMAIL",$email);
        $stmt->bindParam(":USER",$nome);
        $stmt->bindParam(":SENHA",$senha);
        $stmt->execute();
        return true;
    }

    public static function login($email,$senha)
    {
        $conn=self::conexao();
        $stmt= $conn-> prepare("SELECT email,senha from usuario where email = :EMAIL");
        $stmt->bindParam(":EMAIL",$email);
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($dados as $row)
            if ($row["email"]==$email and $row['senha'] == $senha)
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