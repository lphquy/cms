<h1>User Details</h1>
<p><?= h($user->id) ?></p>
<p><?= h($user->email) ?></p>
<p><?= h($user->password) ?></p>
<p><?= h($user->created->format(DATE_RFC850)) ?></p>
<p><?= h($user->modified->format(DATE_RFC850)) ?></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $user->id]) ?>