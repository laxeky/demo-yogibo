<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
  <link rel="shortcut icon" href="<?=base_url('img/template/ico.jpg')?>"  type="image/x-icon" />

  <link rel="image_src" type="image/jpeg" href="<?=$image_share?>" />
  <meta property="og:title" content="<?=$title?>">
  <meta property="og:description" content="<?=$subject?>">
  <meta property="og:url" content="<?=site_url($page)?>">
  <meta property="og:image" content="<?=$image_share?>" />
  <meta property="og:site_name" content="<?=site_url($page)?>">
  <link rel="alternate" type="application/rdf+xml" href="http://opengraphprotocol.org/schema/">

  <meta itemprop="name" content="<?=$title?>">
  <meta itemprop="description" content="<?=$subject?>">
  <meta itemprop="image" content="<?=$image_share?>">

  <link rel="stylesheet" type="text/css" href="<?=base_url('lib/bootstrap-4/css/bootstrap.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('lib/css/comingsoon.css')?>">
	
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <img class="img_comingsoon" src="<?=base_url('img/comingsoon/img-01.jpg')?>">
            </div>
        </div>
    </div>
</body>
</html>