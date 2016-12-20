<div class="row">
<div class="evenements col-md-12">
    <h3><?= h($evenement->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Evenement') ?></th>
            <td><?= h($evenement->evenement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lieu') ?></th>
            <td><?= h($evenement->lieu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($evenement->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($evenement->category->categorie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Distance') ?></th>
            <td><?= $this->Number->format($evenement->distance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Denivele') ?></th>
            <td><?= $this->Number->format($evenement->denivele) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($evenement->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($evenement->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($evenement->modified) ?></td>
        </tr>
    </table>
</div>
</div>
