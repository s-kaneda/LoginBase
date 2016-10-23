
<div>
    <?= $this->Flash->render('auth'); ?>
    <div class="row">        
        <div class="col-md-4 col-md-offset-4">
            <h2>ログイン</h2>
            <?= $this->Form->create('User', array('novalidate' => true)); ?>
                
                <div class="form-group">
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