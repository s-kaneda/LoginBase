<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Login base</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://book.cakephp.org/2.0/ja/index.html#">Cake.org <span class="sr-only">(current)</span></a></li>
        <li><a href="http://bootstrapk.com/">bootstrap</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">

        <?php if ($login_user['username']) : ?>
            <li class="dropdown">                       
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $login_user['username']; ?><span class="caret"></span></a>
                <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">-->
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <?= $this->Html->link(
                            '会員情報変更',[
                            'controller' => 'users',
                                'action' => 'edit',
                                $login_user['id'],
                            ]);?>

                    </li>
                    <li>
                        <?= $this->Html->link(
                            'ログアウト',
                            ['controller' => 'users', 'action' => 'logout']
                        ); ?>
                    </li>                    
                </ul>
            </li>
        <?php else : ?>
            <li>
                <?= $this->Html->link(
                    '新規会員登録',
                    ['controller' => 'users', 'action' => 'add',]
                ); ?>
            </li>
            <li>
                <?= $this->Html->link(
                    'ログイン',
                    ['controller' => 'users', 'action' => 'login']
                ); ?>
            </li>
        <?php endif; ?>
        </ul>            
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
