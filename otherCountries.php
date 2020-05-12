<?php

require_once 'php/google-api-php-client/vendor/autoload.php';

session_start();

$name = $_SESSION['username'];

echo $name."   ";

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Information of other countries</title>

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
            <a class="nav-link active" href="/speak">
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
        <h1 class="h2">COVID-19 in other countries</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      <form action="/otherCountries" method="post" class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
             <label for="inputPassword2" class="sr-only">Country</label>
             <input type="text" class="form-control" id="inputPassword2" name="country" placeholder="Enter a country">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
      </form>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Country</th>
              <th>Date</th>
              <th>Daily Confirmed Cases</th>
              <th>Confirmed Cases</th>
              <th>Deaths</th>
            </tr>
          </thead>
          <tbody>
            <?php
                
                $client = new Google_Client();
                $client->useApplicationDefaultCredentials();
                $client->addScope(Google_Service_Bigquery::BIGQUERY);
                $bigquery = new Google_Service_Bigquery($client);
                $projectId = 'task2-272810';
                //$projectId = 's3774940-cc2018';
                session_start();
                if(trim($_POST['country']) == "" || !isset($_POST['country'])){
                  $country = $_SESSION['country'];
                } else {
                  $country = $_POST["country"];
                  $_SESSION['country']=$_POST["country"];
                }
                
                $request = new Google_Service_Bigquery_QueryRequest();
                $str = '';

                $request->setQuery("SELECT countries_and_territories,date,daily_confirmed_cases,confirmed_cases,deaths FROM [bigquery-public-data.covid19_ecdc.covid_19_geographic_distribution_worldwide] where upper(countries_and_territories) like upper('%$country%') order by date DESC LIMIT 10");

                $response = $bigquery->jobs->query($projectId, $request);
                $rows = $response->getRows();

                foreach ($rows as $row)
                {
                    $str .= "<tr>";

                    foreach ($row['f'] as $field)
                    {
                        $str .= "<td>" . $field['v'] . "</td>";
                    }
                    $str .= "</tr>";
                }
                echo $str;
            ?>

          </tbody>
        </table>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">        
            <h1 class="h2">Advanced Search</h1>
        </div>
         <form action="/otherCountries" method="post" class="form-inline">
            <div class="form-group mb-2">
            
              <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Day</label>
              <select class="custom-select my-1 mr-sm-2" name="day" id="inlineFormCustomSelectPref">
                  <option selected>Choose...</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                  <option>10</option>
                  <option>11</option>
                  <option>12</option>
                  <option>13</option>
                  <option>14</option>
                  <option>15</option>
                  <option>16</option>
                  <option>17</option>
                  <option>18</option>
                  <option>19</option>
                  <option>20</option>
                  <option>21</option>
                  <option>22</option>
                  <option>23</option>
                  <option>24</option>
                  <option>25</option>
                  <option>26</option>
                  <option>27</option>
                  <option>28</option>
                  <option>29</option>
                  <option>30</option>
                  <option>31</option>
              </select>
              <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Month</label>
              <select class="custom-select my-1 mr-sm-2" name="month" id="inlineFormCustomSelectPref">
                  <option selected>Choose...</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                  <option>10</option>
                  <option>11</option>
                  <option>12</option>
              </select>
              <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Year</label>
              <select class="custom-select my-1 mr-sm-2" name="year" id="inlineFormCustomSelectPref">
                  <option selected>Choose...</option>
                  <option>2020</option>
                  <option>2019</option>
              </select>
            </div>
            <div class="form-group mx-sm-3 mb-2">
             <label for="inputPassword2" class="sr-only">Country</label>
             <input type="text" class="form-control" id="inputPassword2" name="country2" placeholder="Enter a country">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
         </form>
         <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Country</th>
              <th>Date</th>
              <th>Daily Confirmed Cases</th>
              <th>Confirmed Cases</th>
              <th>Deaths</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $client = new Google_Client();
                $client->useApplicationDefaultCredentials();
                $client->addScope(Google_Service_Bigquery::BIGQUERY);
                $bigquery = new Google_Service_Bigquery($client);
                $projectId = 'task2-272810';
                //$projectId = 's3774940-cc2018';

                session_start();
                if(trim($_POST['country2']) == "" || !isset($_POST['country2'])){
                  $country2 = $_SESSION['country2'];
                  $date = $_SESSION["day"];
                  $month = $_SESSION["month"];
                  $year = $_SESSION["year"];
                } else {
                  $country2 = $_POST["country2"];
                  $date = $_POST["day"];
                  $month = $_POST["month"];
                  $year = $_POST["year"];
                  $_SESSION['country2'] =$_POST["country2"];
                  $_SESSION['day'] = $_POST["day"];
                  $_SESSION['month'] = $_POST["month"];
                  $_SESSION['year'] = $_POST["year"];
                }

                $request = new Google_Service_Bigquery_QueryRequest();
                $str = '';

                $request->setQuery("SELECT countries_and_territories,date,daily_confirmed_cases,confirmed_cases,deaths FROM [bigquery-public-data.covid19_ecdc.covid_19_geographic_distribution_worldwide] where upper(countries_and_territories) like upper('%$country2%') and year=$year and day=$date and month=$month order by date DESC LIMIT 10");

                $response = $bigquery->jobs->query($projectId, $request);
                $rows = $response->getRows();

                foreach ($rows as $row)
                {
                    $str .= "<tr>";

                    foreach ($row['f'] as $field)
                    {
                        $str .= "<td>" . $field['v'] . "</td>";
                    }
                    $str .= "</tr>";
                }
                echo $str;
            ?>

          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script>
    
</body>
</html>


