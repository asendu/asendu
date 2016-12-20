<?php use Cake\I18n\Date; ?>
<div class="row">
<div class="evenements index col-md-12">
    <div class="jumbotron">
    <h3><?= __('Evenements') ?></h3>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('evenement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lieu') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('distance').' (km)' ?></th>
                <th scope="col"><?= $this->Paginator->sort('denivele').'+ (m)' ?></th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evenements as $evenement): ?>
            <tr>
                <td><?= h($evenement->evenement) ?></td>
                <td><?= h($evenement->lieu) ?></td>
                <td><?= h($evenement->date) ?></td>
                <td><?= h($evenement->category->categorie) ?></td>
                <td><?= $this->Number->format($evenement->distance) ?></td>
                <td><?= $this->Number->format($evenement->denivele) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $evenement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $evenement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $evenement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evenement->id)]) ?>
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
<script type="text/javascript">
<!--
$('body').css('background-image', 'url(' + "<?= $this->url->image('trail1.jpg') ?>" + ')');
//-->
</script>
