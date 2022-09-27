<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro - Petshop</title>
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
          <img src="img/logo.png" alt="Logo do Petshop" />
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

    <section class="cadastro">
      <div class="container">
        <img src="img/img-cadastro.png" alt="Ilustração cadastro" />

        <div class="formulario">
          <form method="post" action="php/validacad.php">
            <h2>Cadastre-se</h2>

            <input type="text" name="nome" id="nome" placeholder="Nome" value="<?= isset($_SESSION['nome']) ? $_SESSION['nome'] : '' ?>" />
            <?php
              if(isset($_SESSION['nome_erro'])) {
            ?>
            <span class="fs-6 text-danger mb-2"><?= $_SESSION['nome_erro'] ?></span>
            <?php
              }
              unset($_SESSION['nome_erro']);
            ?>

            <input type="text" name="email" id="email" placeholder="Email" value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>" />
            <?php
              if(isset($_SESSION['email_erro'])) {
            ?>
            <span class="fs-6 text-danger mb-2"><?= $_SESSION['email_erro'] ?></span>
            <?php
              }
              unset($_SESSION['email_erro']);
            ?>

            <input type="password" name="senha" id="senha" placeholder="Senha" value="<?= isset($_SESSION['senha']) ? $_SESSION['senha'] : '' ?>" />
            <?php
              if(isset($_SESSION['senha_erro'])) {
            ?>
            <span class="fs-6 text-danger mb-2"><?= $_SESSION['senha_erro'] ?></span>
            <?php
              }
              unset($_SESSION['senha_erro']);
            ?>

            <input type="password" name="csenha" id="csenha" placeholder="Confirmar senha" value="<?= isset($_SESSION['csenha']) ? $_SESSION['csenha'] : '' ?>" />
            <?php
              if(isset($_SESSION['senha_erro_dif'])) {
            ?>
            <span class="fs-6 text-danger mb-2"><?= $_SESSION['senha_erro_dif'] ?></span>
            <?php
              }
              unset($_SESSION['senha_erro_dif']);
            
              if(isset($_SESSION['csenha_erro'])) {
            ?>
            <span class="fs-6 text-danger mb-2"><?= $_SESSION['csenha_erro'] ?></span>
            <?php
              }
              unset($_SESSION['csenha_erro']);
            ?>
            
            <input type="checkbox" name="check" id="check" <?= isset($_SESSION['checkbox']) ? 'checked' : '' ?>>
            <label for="check">Aceito os cookies</label>
            
            <?php
              unset($_SESSION['nome']);
              unset($_SESSION['email']);
              unset($_SESSION['senha']);
              unset($_SESSION['csenha']);
              unset($_SESSION['checkbox']);
            ?>

            <div class="botao">
              <button type="submit">Cadastrar</button>
            </div>

            <div class="cadastre-se">
              <a href="login.php">já tenho cadastro</a>
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
