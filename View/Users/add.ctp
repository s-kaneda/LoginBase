<div class="users form">
    <h2>新規登録</h2>
    <?= $this->Form->create('User',['novalidate' => 'novalidate']); ?>
    <div class="form-group">
        <?= $this->Form->input('username',[
            'type' =>'text',
            'class' => 'form-control',
            'label' => '名前',
        ]);?>
    </div>
    <div class="form-group">
        <?= $this->Form->input('password',[
            'type' =>'text',
            'class' => 'form-control',
            'label' => 'パスワード',
        ]);?>
    </div>
    <div class="form-group">
        <?= $this->Form->input('role',[
            'type' =>'text',
            'class' => 'form-control',
            'label' => '権限',
        ]);?>
    </div>
    <button  class="btn btn-primary">제출</button><br>
    <center>
        <button  class="btn btn-default">
            <?= $this->Html->link('一覧へ戻る', array('action' => 'index')); ?>                
        </button>
    </center>           
    <?= $this->Form->end();?>            
</div>
		
	

