<div class="users view">
    <h2>ユーザー情報</h2>        
    <table class="table table-bordered">

        <tr>
            <th style="width: 30%">Id</th>
            <td><?php echo h($user['User']['id']); ?></td>
        </tr>
        <tr>
            <th>ユーザー名</th>
            <td><?php echo h($user['User']['username']); ?></td>
        </tr>
        <tr>
            <th>権限</th>
            <td><?php echo h($user['User']['role']); ?></td>
        </tr>                                                

    </table>
    <button type="button" class="btn btn-default"><?php echo $this->Html->link('戻る', array('action' => 'index')); ?></button>
    <?php if($login_user['role'] =='admin'):?>
    <button type="button" class="btn btn-default"><?php echo $this->Html->link('編集', array('action' => 'edit', $user['User']['id'])); ?></button>
    <button type="button" class="btn btn-danger"><?php echo $this->Form->postLink('削除', array('action' => 'delete', $user['User']['id']), array('confirm' => '本当に削除してもよろしいですか？', $user['User']['id'])); ?></button>
    <?php endif ;?>    
</div>