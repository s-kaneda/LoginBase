<h2>ログイン</h2>

<div>
    <?= $this->Flash->render('auth'); ?>

    <?= $this->Form->create('User', array('novalidate' => true)); ?>
    <fieldset>
        <?= $this->Form->input('username', ['label' => 'ユーザーネーム']); ?>
        <?= $this->Form->input('password', ['label' => 'パスワード']); ?>
    </fieldset>
    <?= $this->Form->end('ログイン'); ?>

</div>