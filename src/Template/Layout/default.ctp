<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bbase.css') ?>
    <?= $this->Html->css('sstyle.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('fontawesome_all.min.css') ?>
    <?= $this->Html->css('custom.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <?= $this->Flash->render() ?>
<!--   <div class="alert alert-dismissable alert-danger" style="margin-bottom: 0px;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
      ×
    </button>
    <h4>
      Alert!
    </h4> <strong>Warning!</strong> Best check yo self, you're not looking too good. <a href="#" class="alert-link">alert link</a>
  </div> -->
  <div id="header">
    <div id="menu">
      <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="">NEC Quality Records</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item mx-2">
              <?= $this->Html->link('Jobs','/jobs/index',['class' => 'nav-link']); ?>
            </li>
            <li class="nav-item mx-2">
              <?= $this->Html->link('Pictures','/pictures',['class' => 'nav-link']); ?>
            </li>
            <li class="nav-item mx-2">
              <?= $this->Html->link('NCR','/ncrs/index',['class' => 'nav-link']); ?>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link disabled" href="#">CAR</a>
            </li>
            <li class="nav-item mx-2">
              <?= $this->Html->link('Tags','/tags/index',['class' => 'nav-link']); ?>
            </li>
            <li class="nav-item dropdown mx-5">
              <a class="nav-link dropdown-toggle mx-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                User
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a target="" href=""><span class="glyphicon glyphicon-user mx-3 my-auto"></span>Settings</a></li>
            <li><a target="_blank" href="https://book.cakephp.org/3.0/"><span class="glyphicon glyphicon-user mx-3"></span>Documentation</a></li>
            <li><a target="_blank" href="https://api.cakephp.org/3.0/"><span class="glyphicon glyphicon-log-in mx-3"></span>API</a></li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2 mx-3 my-auto" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </div>
  </div>

  <div class="container-fluid" id="container">
    <div class="row">

      <?= $this->fetch('content') ?>

    </div>
    <div class="row" id="footerRow">
      <div class="col-12">
        <footer>
          Footer
        </footer>
      </div>
    </div>
  </div>
  <!-- <? //echo $this->Js->writeBuffer(); ?> -->
  <?= $this->Html->script('jquery-3.3.1.min'); ?>
  <?= $this->Html->script('bootstrap.bundle.min'); ?>
  <?= $this->Html->script('fontawesome_all.min'); ?>
  <?= $this->Html->script('custom'); ?>
</body>
</html>
