<?php require('config.php'); ?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Gusti Agung">
  <meta name="description" content="Status server web for fivem server">
  <title><?php echo $title ?></title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo $favicon ?>">
  <style>
    body {
      background-color: black;
      color: white;
    }

    .btn-primary {
      background-color: red;
      border-color: red;
    }

    .btn-primary:hover {
      background-color: darkred;
      border-color: darkred;
    }

    .btn-outline-dark {
      border-color: red;
      color: red;
    }

    .btn-outline-dark:hover {
      background-color: red;
      color: white;
    }

    .card {
      background-color: #222;
      color: white;
    }

    footer {
      color: white !important;
    }

    footer p {
      color: white !important;
    }
  </style>
</head>

<body>
  <main>
    <div class="px-4 py-4 my-4 text-center">
      <img class="d-block mx-auto mb-4" src="<?php echo $logo ?>" alt="" style="width: 450px; height: auto;">
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4"><?php echo $description ?></p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-2">
          <a href="<?php echo $youtube ?>" class="btn btn-outline-dark" target="_blank">
            <i class="fab fa-youtube"></i>
          </a>
          <a href="<?php echo $discord ?>" class="btn btn-outline-dark" target="_blank">
            <i class="fab fa-discord"></i>
          </a>
          <a href="<?php echo $instagram ?>" class="btn btn-outline-dark" target="_blank">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <di class="row">
          <?php
          $settings['title'] = "";
          $settings['ip'] = $ip;
          $settings['port'] = $port;
          $settings['max_slots'] = $max_slots;

          @$content = json_decode(file_get_contents("http://".$settings['ip'].":".$settings['port']."/info.json"), true);
          @$img_d64 = $content['icon'];
          @$list_players = file_get_contents("http://".$settings['ip'].":".$settings['port']."/players.json");

          if ($list_players) {
              $content = json_decode($list_players, true);
              $count_players = is_array($content) ? count($content) : 0;
              $status_class = "btn-success"; // Verde para Online
              $status_text = "Online";
          } else {
              $count_players = 0;
              $status_class = "btn-danger"; // Rojo para Offline
              $status_text = "Offline";
          }
          ?>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Estado</h5>
                <button type="button" class="btn <?php echo $status_class; ?>"><?php echo $status_text; ?></button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Jugadores</h5>
                <button type="button" class="btn btn-primary"><?= $count_players ?>/<?= $settings['max_slots'] ?></button>
              </div>
            </div>
          </div>
        </di>
      </div>
    </div>
  </main>

  <footer class="text-body-secondary py-5">
    <div class="container text-center">
      <!-- please don't delete/replace, this is as credit -->
      <p>&copy; Nefastorp <script>
          document.write(new Date().getFullYear())
        </script>. All rights reserved.</p>
    </div>
  </footer>

  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
