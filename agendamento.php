<?php
  session_start();
  include_once('php/Servico.php');
  
  if(isset($_SESSION['usuario'])) {
    include_once('php/Animal.php');
    include_once('php/Agendamento.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Petshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
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
            <div class="mobile-menu" id="mobile-menu">
              <div class="line1"></div>
              <div class="line2"></div>
              <div class="line3"></div>
            </div>
          <ul class="nav-list" id="nav-list">
            <li>
              <a href="index.php">Sobre</a>
            </li>
            <li>
              <a href="servicos.php">Serviços</a>
            </li>
            <li>
              <a href="contato.php">Contato</a>
            </li>
            <!-- <li>
              <a href="login.php">Login</a>
            </li> -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                <img src="img/icon-usuario.png" alt="Ícone usuário" class="icon-user" />
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink" >
                <li><a class="dropdown-item text-secondary" href="agendamento.php">Agendamentos</a></li>
                <li><a class="dropdown-item text-secondary" href="pets.php">Meus pets</a></li>
                <li><a class="dropdown-item text-danger" href="php/validacao/validalogout.php">Sair</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <main class="container mx-auto my-5 d-flex justify-content-center">
      <section class="pets mx-4">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="novoagendamento-tab" data-bs-toggle="tab" data-bs-target="#novoagendamento" type="button" role="tab" aria-controls="profile" aria-selected="false">Novo Agendamento</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="meusagendamento-tab" data-bs-toggle="tab" data-bs-target="#meusagendamento" type="button" role="tab" aria-controls="home" aria-selected="true">Meus Agendamentos</button>
          </li>
        </ul>
        <div class="tab-content p-5" id="myTabContent">
          <div class="tab-pane fade show active" id="novoagendamento" role="tabpanel" aria-labelledby="profile-tab">
            <div class="formulario">
              <form method="post" action="php/validacao/validaagend.php">
                <?php
                  if(isset($_SESSION['agendamento_sucesso'])) {
                ?>
                <span class="fs-5 text-success mb-2"><?= $_SESSION['agendamento_sucesso'] ?></span><br>
                <?php
                  }
                  unset($_SESSION['agendamento_sucesso']);
                ?>
                <?php
                  if(isset($_SESSION['cancelamento_sucesso'])) {
                ?>
                <span class="fs-5 text-warning mb-2"><?= $_SESSION['cancelamento_sucesso'] ?></span><br>
                <?php
                  }
                  unset($_SESSION['cancelamento_sucesso']);
                ?>
                <h2>Novo agendamento</h2>
      
                <label for="service">Serviço</label>
                <select name="service" id="service">
                  <?php
                    foreach($servicos as $servico) :
                  ?>
                  <option value="<?= $servico['id_servico'] ?>"><?= $servico['nome'] ?></option>
                  <?php
                    endforeach;
                  ?>
                </select>

                <label for="date">Data</label>
                <input type="date" name="date" id="date" placeholder="Data" min="<?= date("Y-m-d") ?>" />
                <?php
                  if(isset($_SESSION['data_erro'])) {
                ?>
                <span class="fs-6 text-danger mb-2"><?= $_SESSION['data_erro'] ?></span><br>
                <?php
                  }
                  unset($_SESSION['data_erro']);
                ?>

                <label for="time">Horário</label>
                <input type="time" name="time" id="time" placeholder="Horário" min="<?= date("H:i") ?>" max="17:00"/>
                <span class="fs-6 text-muted">Aberto das 9h00 às 17h00</span>
                <br>
                <?php
                  if(isset($_SESSION['hora_erro'])) {
                ?>
                <span class="fs-6 text-danger mb-2"><?= $_SESSION['hora_erro'] ?></span><br>
                <?php
                  }
                  unset($_SESSION['hora_erro']);
                ?>

                <label for="pets">Pet</label>
                <select name="pet" id="pets">
                  <?php
                    foreach($pets as $pet) :
                  ?>
                  <option value="<?= $pet['id_pet'] ?>"><?= $pet['nome'] ?></option>
                  <?php
                    endforeach;
                  ?>
                </select>
                        
                <div class="botao">
                  <button>enviar</button>
                </div>
              </form>
            </div>
          </div>
          <div class="tab-pane fade" id="meusagendamento" role="tabpanel" aria-labelledby="home-tab">
            <div class="d-grid container-pets">
              <?php
                foreach($agendamentos as $agendamento) :
              ?>
              <div class="card m-2" style="width: 20rem;">
                <div class="card-body">
                  <h5 class="card-title"><?= $agendamento['nome_pet'] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $agendamento['nome_servico'] ?></h6>
                  <p class="card-text"><?= date("d/m/Y", strtotime($agendamento['data_agendamento'])) ?> - <?= date("H:i", strtotime($agendamento['hora'])) ?></p>
                  <form method="post" action="php/validacao/cancelamento.php">
                    <input type="hidden" name="agendamento" value="<?= $agendamento['id_agendamento'] ?>" >
                    <button type="submit" href="#" class="card-link text-danger btn btn-link p-0 fs-6" style="text-transform: capitalize">Cancelar</button>
                  </form>
                </div>
              </div>
              <?php
                endforeach;
              ?>
            </div>
          </div>
        </div>
      </section>
    </main>

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

    <script src="js/mobile-navbar.js"></script>
    
  </body>
</html>
<?php
  }
  else {
    header('Location: login.php');
  }
?>