<div class="list-group">
    <center>
    <a href="#" class="list-group-item active">        
        Menu    
    </a>
    
    <?= $this->Html->link(
        'User',[
            'controller' => 'users',
            'action' => 'index',
        ], ['class'=>'list-group-item']
    );?>
    </center>
</div>