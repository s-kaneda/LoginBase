<div class="users form">	
    <h2>ユーザー情報編集</h2>
    <?php echo $this->Form->create('User'); ?>
    <div class="form-group">
        <?=$this->Form->input('username',[
            'type'=> 'text',
            'label' => 'ユーザー名',
            'class' => 'form-control',
            'placeholder' => 'username',                                
            ]);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('password',[
            'type'=> 'password',
            'label' => 'パスワード',
            'class' => 'form-control',

            ]);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('role',[
            'type'=> 'text',
            'label' => '権限',
            'class' => 'form-control',
            'placeholder' => 'Role',                                
            ]);?>
    </div>
    <button class="btn btn-primary">編集</button>           
    <button class="btn btn-default"><?php echo $this->Html->link('戻る', array('action' => 'index')); ?></button>
    <?php echo $this->Form->end(); ?><br>        
</div>

	
	
        
