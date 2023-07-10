<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/cadastro_login.css')}}">   
</head>
<body>
    <center>
    <div class="imagens">   
        <span class="linha"> <hr> </span> 
        <span> <img src="{{asset('Images/icons8-serviço-50 (1).png')}}"> </span>
        <span class="linha"> <hr> </span>
    </div>    
    <div class="formulario">
    <form action="realizarLogin" method="post">
        @csrf
        <input type="email" name="email2" id="email2" required placeholder="E-MAIL"> 
        <br>
        <input type="password" required id="senha" name="senha" placeholder="SENHA">
        <br>
        <?php
                if (isset($_GET["mensagem"]))
                {
                $mensagem = urldecode($_GET['mensagem']);
                echo "<p>" . $mensagem . "</p>";
            }
                ?> 
            
        <input type="submit" class="botao" value="LOGIN">
        <br>
       <p><a href="/cadastro">Não tem cadastro? Clique aqui</a></p> 
    </form>
    </div>
    </center>
</body>
</html>