<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'AS Endurance - resultats';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?> 
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
    		['integrity'=>'sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u',
    		 'crossorigin'=>'anonymous']) ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css',
    		['integrity'=>'sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp',
    		 'crossorigin'=>'anonymous']) ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->script('https://code.jquery.com/jquery-3.1.1.min.js') ?>
    <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
    		['integrity' => 'sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa',
    		 'crossorigin'=>'anonymous']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <?= $this->element('topmenu') ?>
      </div>
    </nav>
    
<!--     <nav class="navdar navbar-inverse navdab-fixed-top top-bar expanded" data-topbar role="navigation"> -->
<!--     <div class="container"> -->
<!--         <div class="navbar-header"> -->
    
<!--         <ul class="title-area large-3 medium-4 columns"> -->
<!--             <li class="name"> -->
<!--                <h1><a href=""><?= $this->fetch('title') ?></a></h1> -->
<!--             </li> -->
<!--         </ul> -->
<!--         <div class="top-bar-section"> -->
<!--             <ul class="right"> -->
<!--                 <li><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></li> -->
<!--                 <li><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></li> -->
<!--             </ul> -->
<!--         </div> -->
<!--         </div> -->
<!--         </div> -->
<!--     </nav> -->
    
    
    <?= $this->Flash->render() ?>
    <div class="container-fluid">
    <div class="row">
            <?= $this->fetch('content') ?>
    </div>
    </div>
    
    <footer>
    
    </footer>
</body>
</html>

