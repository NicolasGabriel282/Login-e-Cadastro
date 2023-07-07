<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../public/CSS/cadastro_login.css">
</head>
<body>
    <center>
    <div class="imagens">   
        <span class="linha"> <hr> </span> 
        <span> <img src="../public/Images/icons8-serviço-50 (1).png"> </span>
        <span class="linha"> <hr> </span>
    </div>
    <div class="formulario">   
    <br>
    <form method="post" action="/realizarCadastro">
        @csrf
            <input type="email" name="email1" id="email1" required placeholder="E-MAIL"> 
        <br>
            <input type="text" name="usuario1" id="usuario1" maxlength="20" required  placeholder="USUARIO">
            <br>
            <input type="password" name="senha"  id="senha" maxlength="15" minlength="5" required placeholder="**********">
            
        <br>
        <?php
                if (isset($_GET["mensagem"]))
                {
                $mensagem = urldecode($_GET['mensagem']);
                echo "<p>" . $mensagem . "</p>";
            }
                ?> 
        <br>
       
        <input type="submit" value="CADASTAR" class="botao"> 
        <br>
        <p><a href="/">Ja tem cadasto? Clique aqui</a></p> 
    </form>
    </div>

    </center>

</body>
</html>
