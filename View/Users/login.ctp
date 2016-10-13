
<div>
    <?= $this->Flash->render('auth'); ?>
    <div class="row">        
        <div class="col-md-4 col-md-offset-4">
            <h2>ログイン</h2>
            <?= $this->Form->create('User', array('novalidate' => true)); ?>
                <?php var_dump($this->Form->isFieldError('username'));?>
                
                <div class="form-group <?php if($this->Form->isFieldError('username')){ echo 'has-error';}?>">
                    <?= $this->Form->input('username', [
                        'label' => 'ユーザーネーム',
                        'class'=>'form-control', 
                        'placeholder' => 'username']); ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->input('password', [
                        'label' => 'パスワード',
                        'class'=>'form-control',
                        'placeholder' => 'Password']); ?>
                </div>
                <button class="btn  btn-primary " type="submit">ログイン</button>
           <?= $this->Form->end(); ?>            
        </div>        
    </div>
</div>