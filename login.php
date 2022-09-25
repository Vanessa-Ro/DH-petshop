<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Petshop</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>

<body>
  <header>
    <div class="container">
      <div class="logo">
        <img src="img/logo.png" alt="Logo do Petshop">
      </div>

      <nav>
        <ul>
          <li>
            <a href="index.php">Sobre</a>
          </li>
          <li>
            <a href="servicos.php">Serviços</a>
          </li>
          <li>
            <a href="contato.php">Contato</a>
          </li>
          <li>
            <a href="login.php">Login</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

          
  <section class="login">
    <div class="container">
      <img src="img/img-login.png" alt="Ilustração homem e gato em um sofá">
      <div class="formulario">
        <form method="post" action="php/validalogin.php">
          <h2>Login</h2>

          <?php 
            if(!isset($_COOKIE['permissao'])){
          ?>
          <input type="text" name="email" id="email" placeholder="email">
          <?php 
          } else {
            ?>
            <input type="text" name="email" id="email" placeholder="email" value="<?= $_COOKIE['email'] ?>">
        <?php
          }
        ?>
          
          <input type="password" name="senha" id="senha" placeholder="senha" >

          <input type="checkbox" name="check" value="1">
          <label for="check">Aceito os cookies</label><br>

          <div class="botao">
            <button type="submit">entrar</button>
          </div>

          <div class="cadastre-se">
            <a href="cadastro.php">ainda não tenho cadastro</a>
          </div>
        </form>
        
      </div>
    </div>
  </section>

  <footer>
    <div class="copyright">
      <h4>Petshop DH - 2021</h4>
    </div>
  </footer>

</body>
</html>
