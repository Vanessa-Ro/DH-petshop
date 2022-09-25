<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contato - Petshop</title>
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

    <section class="contact">
      <div class="container">
        <h2>Contato</h2>

        <div class="geral">
          <div class="formulario">
            <form method="post" action="php/validacont.php">
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
              <textarea
                name="mensagem"
                id="mensagem"
                cols="30"
                rows="10"
                placeholder="mensagem"
              ></textarea>

              <button>entrar</button>
            </form>
          </div>

          <div class="contatar">
            <div class="contato">
              <p>
                <a href="mailto:contato@petshop.com.br"
                  >contato@petshop.com.br</a
                >
              </p>
              <p><a href="tel:+1198484-8484">(11) 98484-8484 (whatsapp)</a></p>
            </div>

            <div class="endereco">
              <p>Avenida Paulista, 4242</p>
              <p>Bairro Consolação - São Paulo - SP</p>
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