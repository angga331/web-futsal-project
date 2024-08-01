<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Goat Futsal Arena</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap" rel="stylesheet">
  <link rel="icon" href="../img/favgoat.png">

</head>

<body>
  <!-- NAVBAR -->
  <nav class="p-1 navbar navbar-expand-lg bg-dark navbar-dark position-fixed fixed-top ">
    <div class=" container-fluid">
      <a class="navbar-brand ms-5 text-white fs-5" href="#"><img src="../img/football.png" alt="icon"
          class="rounded-circle imgicon"> Goat
        Futsal Arena</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-white fs-5" aria-current="page" href="#"><i class="bi bi-house me-2"></i>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fs-5" aria-current="page" href="tataCara.php"><i
                class="bi bi-currency-dollar me-2"></i>Tata Cara Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fs-5 me-3" href="../pages/login.php"><button
                class="btn btn-success">Login</button></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- BANNER -->
  <div class="container-fluid banner d-flex">
    <div class="container text-white d-flex  align-items-center">
      <h1 class="display-1 ms-5 fw-medium">
        <span class="letter futsal">G</span>
        <span class="letter futsal">o</span>
        <span class="letter futsal">a</span>
        <span class="letter futsal">t</span>
        <span> </span>
        <span class="letter">F</span>
        <span class="letter">u</span>
        <span class="letter">t</span>
        <span class="letter">s</span>
        <span class="letter">a</span>
        <span class="letter">l</span>
        <span class="letter">
          <span class="letter">A</span>
          <span class="letter">r</span>
          <span class="letter">e</span>
          <span class="letter">n</span>
          <span class="letter">a</span>
          <span class="letter"><img src="../img/Gfa.png" class="img-fluid rounded-circle gfa"></span>
      </h1>
    </div>
  </div>
  <!-- CONTENT -->
  <div class="container-fluid p-5 gallery-container">
    <div class="container">
      <div class="row justify-content-evenly">
        <div class="col-5">
          <h3 class="gallery-title">Gallery Goat Futsal Arena</h3>
          <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="card cardcarousel">
                  <img src="../img/sintetis.jpeg" class="d-block w-100" alt="vinyl">
                </div>
                <div class="carousel-caption">
                  <h5 class="text-white fw-bold">Lapang Sintetis</h5>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card">
                  <img src="../img/vinyl.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-caption">
                  <h5 class="text-white fw-bold">Lapang Vinyl</h5>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card">
                  <img src="../img/parkir.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-caption">
                  <h5 class="text-white fw-bold">Tempat Parkir</h5>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card">
                  <img src="../img/kantin.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-caption">
                  <h5 class="text-white fw-bold">Kantin</h5>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card">
                  <img src="../img/mushola.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-caption">
                  <h5 class="text-white fw-bold">Mushola</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../img/mck.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                  <h5 class="text-white fw-bold">Wc</h5>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <!-- KONTAK -->
        <div class="col-5 offset-1">
          <div class="contact-info p-5">
            <h4 class="mb-4 text-success">Kontak Kami</h4>
            <ul class="list-unstyled">
              <li>
                <p><i class="bi bi-geo-alt-fill text-success me-2"></i>Jl. Exemplar No.123, Kota ABC, Negara XYZ</p>
              </li>
              <li>
                <p><i class="bi bi-telephone-fill text-success me-2"></i>+62 123 456 7890</p>
              </li>
              <li>
                <p>
                  <i class="bi bi-envelope-fill text-success me-2"></i>example@gmail.com
                </p>
              </li>
              <li>
                <p>
                  <i class="bi bi-clock-fill text-success me-2"></i>Jam operasional: Senin-Jumat, 08:00-18:00
                </p>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>

</html>