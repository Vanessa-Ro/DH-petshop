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

            <input
              type="text"
              name="nome"
              id="nome"
              placeholder="nome"
            />
            <input
              type="text"
              name="email"
              id="email"
              placeholder="email"
            />
            <input
              type="password"
              name="senha"
              id="senha"
              placeholder="senha"
            />
            <input
              type="password"
              name="csenha"
              id="csenha"
              placeholder="confirmar senha"
            />

            <div class="botao">
              <button>enviar</button>
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
