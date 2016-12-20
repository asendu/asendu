<div class="row">
<div class="resultats view col-md-12">
    <h3><?= h($resultat->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $resultat->has('user') ? $this->Html->link($resultat->user->id, ['controller' => 'Users', 'action' => 'view', $resultat->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evenement') ?></th>
            <td><?= $resultat->has('evenement') ? $this->Html->link($resultat->evenement->id, ['controller' => 'Evenements', 'action' => 'view', $resultat->evenement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($resultat->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Classement') ?></th>
            <td><?= $this->Number->format($resultat->classement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Classement Cat') ?></th>
            <td><?= $this->Number->format($resultat->classement_cat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Inscription') ?></th>
            <td><?= $this->Number->format($resultat->inscription) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Temps Puce') ?></th>
            <td><?= h($resultat->temps_puce) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Temps Officiel') ?></th>
            <td><?= h($resultat->temps_officiel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($resultat->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($resultat->modified) ?></td>
        </tr>
    </table>
</div>
</div>

<script type="text/javascript">
<!--
$('body').css('background-image', 'url(' + "<?= $this->url->image('route1.jpg') ?>" + ')');
//-->
</script>
