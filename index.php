<?php
  session_start();
  include_once('php/Servico.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Petshop</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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

            <?php
              if(!isset($_SESSION['usuario'])) {
            ?>
            <li>
              <a href="login.php">Login</a>
            </li>
            <?php
              }
              else {    
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/icon-usuario.png" alt="Ícone usuário" class="icon-user" />
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item text-secondary" href="agendamento.php">Agendamentos</a></li>
                <li><a class="dropdown-item text-secondary" href="pets.php">Meus pets</a></li>
                <li><a class="dropdown-item text-danger" href="php/validacao/validalogout.php">Sair</a></li>
              </ul>
            </li>
            <?php
              }
            ?>

          </ul>
        </nav>
      </div>
    </header>

    <section class="home">
      <div class="container">
        <h1>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt
        </h1>

        <img src="img/home.png" alt="Ilustração homem passeando com cachorro" />
      </div>
    </section>

    <section class="services-home">
      <div class="container">
        <h2>Serviços</h2>

        <div class="artigos">
          <?php
            foreach($servicos as $servico) :
          ?>
          <article>
            <a class="btn text-start" href="servicos.php">
              <div class="quadrado"></div>
              <h3><?= $servico['nome'] ?></h3>
              <p>R$ <?= $servico['preco'] ?>,00</p>
            </a>
          </article>
          <?php
          endforeach;
          ?>
        </div>
      </div>
    </section>

    <section class="desc">
      <div class="container">
        <div class="img-desc">
          <img
            src="img/img-desc.png"
            alt="Ilustração mulher fazendo carinho em cachorro"
          />
        </div>

        <div class="descricao">
          <h3>
            Sed ut perspiciatis unde iste natus error sit voluptatem accusantium
            doloremque laudantium,
          </h3>
          <p>
            Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et
            quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
            voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
            consequuntur magni dolores eos qui ratione voluptatem sequi
            nesciunt.
          </p>
        </div>
      </div>
    </section>

    <footer class="footer-1">
      <div class="container">
        <div class="logo">
          <img src="img/img-footer.png" alt="Logo do Petshop" />
        </div>

        <div class="footer-contato">
          <div class="contato">
            <p>
              <a href="mailto:contato@petshop.com.br">contato@petshop.com.br</a>
            </p>
            <p><a href="tel:+1198484-8484">(11) 98484-8484 (whatsapp)</a></p>
          </div>

          <div class="endereco">
            <p>Avenida Paulista, 4242</p>
            <p>Bairro Consolação</p>
            <p>São Paulo - SP</p>
          </div>
        </div>

        <div class="mapa">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.3764152672734!2d-46.665815785022495!3d-23.554920784686093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce582c4bf92a1b%3A0x16f64c8fdb066f92!2sAv.%20Paulista%2C%204242%20-%20Bela%20Vista%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2001310-300!5e0!3m2!1sen!2sbr!4v1631729377291!5m2!1sen!2sbr"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
          ></iframe>
        </div>
      </div>

      <div class="copyright">
        <h4>Petshop DH - 2021</h4>
      </div>
    </footer>
  </body>
</html>
