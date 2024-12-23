<?php include __DIR__ . '/partials/inicio-doc.part.php' ?>

<?php include __DIR__ . '/partials/nav.part.php' ?>

<!-- Principal Content Start -->
<div id="index">

  <!-- Header -->
  <div class="row">
    <div class="col-xs-12 intro">
      <div class="carousel-inner">
        <div class="item active">
          <img class="img-responsive" src="images/index/paisaje.jpg" alt="header picture">
        </div>
        <div class="carousel-caption">
          <h1>DWES.LOCAL</h1>
          <hr>
        </div>
      </div>
    </div>
  </div>

  <div id="index-body">
    <!-- Pictures Navigation table -->
    <div class="table-responsive">
      <table class="table text-center">
        <thead>
          <tr>
            <td><a class="link active" href="#category1" data-toggle="tab">Category I</a></td>
            <td><a class="link" href="#category2" data-toggle="tab">Category II</a></td>
            <td><a class="link" href="#category3" data-toggle="tab">Category III</a></td>
          </tr>
        </thead>
      </table>
      <hr>
    </div>

    <!-- Navigation Table Content -->
    <div class="tab-content">

      <!-- Crea 3 galerías de objetos, cada una con su categoría y muestra la primera por defecto -->
      <?php for ($i = 1; $i <= 3; $i++): ?>
        <div id="<?= 'category' . $i ?>" class="tab-pane <?php if ($i == 1) echo 'active' ?>">
          <?php
          require 'views/partials/imagegallery.part.php';
          ?>
        </div>
      <?php endfor; ?>

    </div>
    <!-- End of Navigation Table Content -->
  </div><!-- End of Index-body box -->

  <!-- Newsletter form -->
  <div class="index-form text-center">
    <h3>SUSCRIBE TO OUR NEWSLETTER </h3>
    <h5>Suscribe to receive our News and Gifts</h5>
    <form class="form-horizontal">
      <div class="form-group">
        <div class="col-xs-12 col-sm-6 col-sm-push-3 col-md-4 col-md-push-4">
          <input class="form-control" type="text" placeholder="Type here your email address">
          <a href="" class="btn btn-lg sr-button">SUBSCRIBE</a>
        </div>
      </div>
    </form>
  </div>
  <!-- End of Newsletter form -->

  <!-- Box within partners name and logo -->

  <div class="last-box row">
    <?php require 'views/partials/partner.part.php' ?>
  </div>

  <!-- End of Box within partners name and logo -->

</div><!-- End of index box -->

<!-- Footer -->
<footer class="home-page">
  <div class="container text-muted text-center">
    <div class="row">
      <ul class="nav col-sm-4">
        <li class="footer-number"><i class="fa fa-phone sr-icons"></i> (00228)92229954 </li>
        <li><i class="fa fa-envelope sr-icons"></i> kouvenceslas93@gmail.com</li>
        <li>Photography Fanatic Template &copy; 2017</li>
      </ul>
      <ul class="list-inline social-buttons col-sm-4 col-sm-push-4">
        <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a>
        </li>
        <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a>
        </li>
        <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
        </li>
      </ul>
    </div>
  </div>
</footer>

<?php include __DIR__ . '/partials/fin-doc.part.php' ?>