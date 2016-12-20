        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Evenements <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link(__('Lister'), ['prefix'=>false, 'controller' => 'Evenements', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Créer'), ['prefix'=>false,'controller' => 'Evenements', 'action' => 'add']) ?></li>
                <li role="separator" class="divider">
                <li class="dropdown-header">Catégories</li>
                <li><?= $this->Html->link(__('Lister'), ['prefix'=>false,'controller' => 'Categories', 'action' => 'index']) ?></li>

              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Résultats <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link(__('Lister'), ['prefix'=>false,'controller' => 'Resultats', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Créer'), ['prefix'=>false,'controller' => 'Resultats', 'action' => 'add']) ?></li>

                <!-- <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li> -->
                
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utilisateurs <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link(__('Lister'), ['prefix'=>false,'controller' => 'Users', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Créer'), ['prefix'=>false,'controller' => 'Resultats', 'action' => 'add']) ?></li>
                <li role="separator" class="divider">
                <li><?= $this->Html->link(__('Mes stats'), ['prefix'=>false,'controller' => 'Users', 'action' => 'mystat']) ?></li>
                
                <!-- <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li> -->
                
              </ul>
            </li>
          </ul>
          
        <ul class="nav navbar-nav navbar-right">
        
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link(__('Import fichier csv'), ['prefix'=>'admin','controller' => 'Evenements', 'action' => 'initfromfile']) ?></li>
                <li role="separator" class="divider">
                <li class="dropdown-header">Catégories</li>
                <li><?= $this->Html->link(__('Créer une catégorie de course'), ['prefix'=>'admin','controller' => 'Categories', 'action' => 'add']) ?></li>

                <!-- <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li> -->
                
              </ul>
            </li>
        
            <li><a href="../navbar/">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>
            <li class="active"><a href="./">Contacts <span class="sr-only">(current)</span></a></li>
          </ul>

        </div><!--/.nav-collapse -->
