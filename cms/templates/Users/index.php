<h1>List Users</h1>
<div class="users index content">
    <?= $this->Html->link('Add user', ['action' => 'add']); ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width:10ch;"><?= $this->Paginator->sort('id') ?></th>
                    <th style="width:10ch;"><?= $this->Paginator->sort('email') ?></th>
                    <th style="width:5ch;"><?= $this->Paginator->sort('Password') ?></th>
                    <th style="width:10ch;"><?= $this->Paginator->sort('Created') ?></th>
                    <th style="width:10ch;"><?= $this->Paginator->sort('Modified') ?></th>
                    <th style="width:10ch;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><span style="min-width: 10ch; max-width: 15ch;"><?= $this->Html->link($user->id, ['action' => 'view', $user->id]) ?></span></td>
                        <td><span style="min-width: 10ch; max-width: 15ch;"><?= h($user->email) ?></span></td>
                        <td><span style="min-width: 5ch; max-width: 5ch;"><?= h($user->password) ?></span></td>
                        <td><span style="min-width: 10ch; max-width: 15ch;"><?= $user->created->format(DATE_RFC850) ?></span></td>
                        <td><span style="min-width: 10ch; max-width: 15ch;"><?= $user->modified->format(DATE_RFC850) ?></span></td>
                        <td>
                            <?= $this->Html->link('Edit', ['action' => 'edit', $user->id]) ?>&nbsp;&nbsp;
                            <span><?= $this->Form->postLink(
                                'Delete',
                                ['action' => 'delete', $user->id],
                                ['confirm' => 'Are you sure to delete this user?']
                            ) ?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< '. __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >'); ?>
        <?= $this->Paginator->first(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>
