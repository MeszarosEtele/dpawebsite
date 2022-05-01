<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!doctype html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title><?php echo $meta['title']; ?></title>

    
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900" rel="stylesheet">
    <link href="./assets/css/site.css" rel="stylesheet">
  </head>
  <body>
    
<div class="container">
  <?php 
  if (isset($uzenet)) {
    if (strlen($uzenet) > 0) {
  ?>
  <div class="alert alert-<?php echo ($error == true) ? "danger" : "info" ?> alert-dismissible fade show" role="alert">
  <?php
  echo $uzenet;
  ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } } ?>
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        &nbsp;
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="/">Drogprevenciós Alapítvány</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <?php if(isset($_SESSION['login'])) { ?>
          Bejelentkezve: <strong><?php echo $_SESSION['userSession']['vezeteknev'] . ' ' . $_SESSION['userSession']['keresztnev']; ?> (<?php echo $_SESSION['login'];?>)</strong>
        <?php } ?>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <?php foreach ($oldalak as $url => $oldal) { ?>
        <?php if(! isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
          <a class="p-2 text-muted" href="<?php echo ($url == '/') ? '.' : ('?oldal=' . $url) ?>"><?php echo $oldal['szoveg'] ?></a>
        <?php } ?>
      <?php } ?>
    </nav>
  </div>

<?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>

<footer class="blog-footer">
  <p>
    <?php echo $footer['title'];?> • <?php echo $footer['phone1'];?> • <?php echo $footer['phone2'];?> • <?php echo $footer['email'];?> • <a href="<?php echo $footer['webLink'];?>"><?php echo $footer['web'];?></a>
  </p>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>
