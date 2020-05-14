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
     h6.transtext{
        display:none;
     }
    </style>
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="table-responsive">
      <ul class="list-unstyled">
<?php

// Include Google Cloud dependendencies using Composer
require_once 'vendor/autoload.php';

use Google\Cloud\Datastore\DatastoreClient;

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

// [START translate_translate_text]
use Google\Cloud\Translate\TranslateClient;
$targetLanguage = 'en';  // Language to translate to
$translate = new TranslateClient();

      foreach ($result as $entity) {
    ?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <li class='media'>
        <div class='media-body'>
        <h5 class='mt-0 mb-1'><?php echo $entity['user']; ?></h5>
        <p style="color:darkgrey;"><?php $date = $entity['date']->format('Y-m-d H:i:s');
                                         echo $date;?></p>
        <h6><?php echo $entity['content']; ?></h6>

        <?php
        $text = $entity['content'];
        $result = $translate->detectLanguage($text);
        if(strcmp('en', $result[languageCode]) != 0){ ?>
            <p class="translate">See Traslation</p>  
            <?php 
            $result = $translate->translate($text, [
                'target' => $targetLanguage,
            ]); ?>
            <h6 class="transtext"><?php echo $result[text]; ?></h6>
        <?php    
        } 
        ?>
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
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script><script src="/js/translate.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script>
</body>
</html>


