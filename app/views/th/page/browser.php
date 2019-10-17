<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $_datestr = strtotime(date('Y-m-d H:i:s'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$title?></title>
  <meta name="description" content="<?=$subject?>">
  <meta name="keywords" content="">
  <link rel="shortcut icon" href="<?=base_url('img/template/ico.png')?>"  type="image/x-icon" />

  <link rel="image_src" type="image/jpeg" href="<?=$image_share?>" />
  <meta property="og:title" content="<?=$title?>">
  <meta property="og:description" content="<?=$subject?>">
  <meta property="og:url" content="<?=site_url(''.$page.'')?>">
  <meta property="og:image" content="<?=$image_share?>" />
  <meta property="og:site_name" content="<?=site_url()?>">
  <link rel="alternate" type="application/rdf+xml" href="http://opengraphprotocol.org/schema/">

  <meta itemprop="name" content="<?=$title?>">
  <meta itemprop="description" content="<?=$subject?>">
  <meta itemprop="image" content="<?=$image_share?>">

  <link rel="stylesheet" type="text/css" href="<?=base_url('lib/bootstrap-4/css/bootstrap.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('lib/css/main.css?v=0.03')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url("lib/progress-bar/pace.css")?>" />

  <script src="<?=base_url('lib/jquery/jquery.js')?>"></script>
  <!-- <script src="<?=base_url('lib/bootstrap-4/js/bootstrap.min.js')?>"></script> -->

  <script src="<?=base_url('lib/js/script.js')?>"></script>
  <!-- <script src="<?=base_url('lib/js/js3-handlers.js')?>"></script>  -->
  <script src="<?=base_url("lib/progress-bar/pace.min.js")?>"></script>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
        <!-- content -->
        <div class="browser_data">
            <h1 class="text-center">เบราว์เซอร์ที่รองรับ</h1>
            <div class="browser_flex">
            <img src="img/icon/icon-01.png" />
            <img src="img/icon/icon-02.png" />
            <img src="img/icon/icon-03.png" />
            <img src="img/icon/icon-04.png" />
            </div>
            <!-- <div class="browser_intro">
                <img class="img_browser" src="img/template/img-logo.png" />
            </div> -->
            <div>

            </div>
        </div>
        <!-- content -->
        </div>
    </div>
 </div>

 </body>
 </html>