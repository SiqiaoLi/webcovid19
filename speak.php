<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['email'];
require_once 'vendor/autoload.php';

use Google\Cloud\Datastore\DatastoreClient;

$datastore = new DatastoreClient([
  'projectId' => 'task2-272810'
]);

if (!empty($_POST["comment"])){
    $content = $_POST['content']; 
    # The kind for the new entity

    $key = $datastore->key('usercomment', 'default')->pathElement('comment');
    $entity = $datastore->entity($key, [
        'date' => new DateTime(),
        'user' => $username,
        'email' => $email,
        'content' => $content,
    ]);

    $datastore->insert($entity);
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Prayer</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">
   

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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

      iframe.noScrolling{
        width: 1150px; /*or any other size*/
        height: 600px; /*or any other size*/
        overflow: hidden;
     }
    </style>
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/main">Name</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="/login">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Speak 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/youtube">
              <span data-feather="file"></span>
              COVID-19 News
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/otherCountries">
              <span data-feather="otherCountries"></span>
              COVID-19 in other countries
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Edit your profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>#WithMe</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
        <li class="nav-item">
            <a class="nav-link" href="/cook">
              <span data-feather="file-text"></span>
              Cook With Me
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="music">
              <span data-feather="file-text"></span>
              Music With Me
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/workout">
              <span data-feather="file-text"></span>
              Workout With Me
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/game">
              <span data-feather="file-text"></span>
              Game With Me
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Speak</h1>
        

      </div>
      <h5>Speak a place where you can write down what you want to say to encourage each other or prayers to comfort one another during this tough time.</h5>
      <form action="/speak" method="post">
            <div class="form-group">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="content" required></textarea>
            </div>
            <input class="btn btn-primary mb-2" type="submit" name="comment" value="comment">
      </form>

      <div class="table-responsive">
      <ul class="list-unstyled">
      <?php
      $datastore = new DatastoreClient([
            'projectId' => 'task2-272810'
            ]);

      $ancestorKey = $datastore->key('usercomment', 'default');
      $query = $datastore->query()
            ->kind('comment')
            ->hasAncestor($ancestorKey)
            // ->order('date', Query::ORDER_DESCENDING)
            ->limit(20);
      $result = $datastore->runQuery($query);

      // $query = $datastore->gqlQuery('SELECT * FROM comment ORDER BY date DESC LIMIT 20');
      // $result = $datastore->runQuery($query);


      foreach ($result as $entity) {
      ?>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <li class='media'>
            <div class='media-body'>
            <h5 class='mt-0 mb-1'> <?php echo $entity['user']; 
                                         echo "&nbsp"; ?></h5>
                                         <p style="color:darkgrey;"><?php $date = $entity['date']->format('Y-m-d H:i:s');
                                         echo $date;?></p>
            <h6><?php echo $entity['content']; ?></h6>
            </div>
            </li>
            </div>
      <?php 
      }
      ?>
      </ul>
      </div>
    </main>
  </div>
</div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
</html>


