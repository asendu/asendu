<?php use Cake\I18n\Time; ?>
<div class="container-fluid">
<div class="row">
<div class="resultats index col-md-12">
    <div class="jumbotron">
    <h3><?= __('Les Resultats') ?></h3>
    </div>
    <table class="table table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evenement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lieu') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categorie') ?></th>
                <th scope="col"><?= $this->Paginator->sort('distance').' (km)' ?></th>
                <th scope="col"><?= $this->Paginator->sort('denivele').' (m)' ?></th>
                <th scope="col"><?= $this->Paginator->sort('temps_officiel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('temps_puce') ?></th>
                <th scope="col"><?= $this->Paginator->sort('classement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('classement_cat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('inscription') ?></th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultats as $resultat): ?>     
            <?php $temps_puce=new time($resultat->temps_puce);        
                  $temps_officiel=new time($resultat->temps_officiel); ?>       
            <tr>
                <td><?= $resultat->has('user') ? $this->Html->link($resultat->user->nom, ['controller' => 'Users', 'action' => 'view', $resultat->user->id]) : '' ?></td>
                <td><?= $resultat->has('evenement') ? $this->Html->link($resultat->evenement->evenement, ['controller' => 'Evenements', 'action' => 'view', $resultat->evenement->id]) : '' ?></td>
                <td><?= $resultat->has('evenement') ? $this->Html->link($resultat->evenement->lieu, ['controller' => 'Evenements', 'action' => 'view', $resultat->evenement->id]) : '' ?></td>
                <td><?= $resultat->has('evenement') ? h($resultat->evenement->date) : '' ?></td>
                <td><?= $resultat->has('evenement') ? $this->Html->link($resultat->evenement->category->categorie, ['controller' => 'Evenements', 'action' => 'view', $resultat->evenement->id]) : '' ?></td>
                <td><?= $resultat->has('evenement') ? $this->Html->link($resultat->evenement->distance, ['controller' => 'Evenements', 'action' => 'view', $resultat->evenement->id]) : '' ?></td>
                <td><?= $resultat->has('evenement') ? $this->Html->link($resultat->evenement->denivele, ['controller' => 'Evenements', 'action' => 'view', $resultat->evenement->id]) : '' ?></td>
                <td><?= $resultat->temps_officiel ?></td>
                <td><?= $resultat->temps_puce ?></td>
                <td><?= $this->Number->format($resultat->classement) ?></td>
                <td><?= $this->Number->format($resultat->classement_cat) ?></td>
                <td><?= $this->Number->format($resultat->inscription).' €' ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $resultat->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resultat->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $resultat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resultat->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
<!--
$('body').css('background-image', 'url(' + "<?= $this->url->image('trail1.jpg') ?>" + ')');
//-->
</script>
