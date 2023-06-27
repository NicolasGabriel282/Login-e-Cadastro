<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../public/CSS/static.css">
</head>
<body>
    <center>
    <div class="imagens">   
        <span class="linha"> <hr> </span> 
        <span> <img src="../public/Images/icons8-serviço-50 (1).png"> </span>
        <span class="linha"> <hr> </span>
    </div>    
    <div class="formulario">
    <form action="main.php" method="post">
        <input type="email" name="email2" id="email2" required placeholder="E-MAIL"> 
        <br>
        <input type="password" required id="senha" name="senha" maxlength="15" minlength="6" placeholder="SENHA">
        <br>
        <?php
                if (isset($_GET["mensagem"]))
                {
                $mensagem = urldecode($_GET['mensagem']);
                echo "<p>" . $mensagem . "</p>";
            }
                ?> 
            
        <input type="submit" class="botao" value="LOGIN">
    </form>
    </div>
    </center>
</body>
</html>