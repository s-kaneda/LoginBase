<div class="users index">
    <h2>User一覧</h2>
        <div align="right">
            
        <?php if($login_user['role'] =='admin') :?>    
        <button class="btn btn-default">           
            <?php echo $this->Html->link('新規追加', array('action' => 'add')); ?>
        <?php endif ; ?>
        </button>
        </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
                <th><?php echo $this->Paginator->sort('username','ユーザーネーム'); ?></th>
                <th><?php echo $this->Paginator->sort('role', '権限'); ?></th>        
                <th class="light"></th>        
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo h($user['User']['id']); ?></td>
                    <td><?php echo h($user['User']['username']); ?></td>
                    <td><?php echo h($user['User']['role']); ?></td>
                    <td align="center">
                        <button type="button" class="btn btn-default"><?php echo $this->Html->link('詳細', array('action' => 'view', $user['User']['id'])); ?></button>&ensp; 
                        <?php if($login_user['role'] =='admin'):?>
                        <button type="button" class="btn btn-default"><?php echo $this->Html->link('編集', array('action' => 'edit', $user['User']['id'])); ?></button>&nbsp;                        
                        <button type="button" class="btn btn-danger"><?php echo $this->Form->postLink('削除', array('action' => 'delete', $user['User']['id']), array('confirm' => '本当に削除してもよろしいですか?', $user['User']['id'])); ?></button>
                        <?php endif ;?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div align="center">
        <?php
            echo $this->Paginator->prev('< ' . '前', array(), null, array('class' => 'prev disabled')).' ';
            echo $this->Paginator->numbers(array('separator' => '')).' ';
            echo $this->Paginator->next('次' . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>    
</div><!-- .users indes --> 

<!--</div>-->
