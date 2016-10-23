<!DOCTYPE html>
<html lnag ="ja">
    
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		LoginBase:
		<?php echo $this->fetch('title'); ?>
	</title>
         <!-- Latest compiled and minified CSS -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

         <!-- Latest compiled and minified JavaScript -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('admin');
                
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
    
    <?php echo $this->element('admin/navbar_admin'); ?>
    
	<div class="container">
		<div id="content">
			<?php echo $this->Session->flash(); ?>
            
            <div class="row">
                <div class="col-md-3">
                    <?php echo $this->element('admin/menu'); ?>                    
                </div>
                <div class="col-md-9">
                    <?php echo $this->fetch('content'); ?>                    
                </div>                
            </div>    
		</div>
		<div id="footer">
			フッター
		</div>
	</div>
    <!--<p><?= var_dump($login_user);?></p>-->
    
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
