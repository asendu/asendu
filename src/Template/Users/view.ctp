<div class="row">
<div class="users view col-md-12">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($user->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Resultats') ?></h4>
        <?php if (!empty($user->resultats)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Course Id') ?></th>
                <th scope="col"><?= __('Temps Puce') ?></th>
                <th scope="col"><?= __('Temps Officiel') ?></th>
                <th scope="col"><?= __('Classement') ?></th>
                <th scope="col"><?= __('Classement Cat') ?></th>
                <th scope="col"><?= __('Inscription') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->resultats as $resultats): ?>
            <tr>
                <td><?= h($resultats->id) ?></td>
                <td><?= h($resultats->user_id) ?></td>
                <td><?= h($resultats->course_id) ?></td>
                <td><?= h($resultats->temps_puce) ?></td>
                <td><?= h($resultats->temps_officiel) ?></td>
                <td><?= h($resultats->classement) ?></td>
                <td><?= h($resultats->classement_cat) ?></td>
                <td><?= h($resultats->inscription) ?></td>
                <td><?= h($resultats->created) ?></td>
                <td><?= h($resultats->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Resultats', 'action' => 'view', $resultats->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Resultats', 'action' => 'edit', $resultats->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Resultats', 'action' => 'delete', $resultats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resultats->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
</div>
