<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		$this->Html->css(array('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', 'custom.css'), null, array('inline' => false)); // include css

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
    
		<div id="header">
		<!-- Menu Bar -->
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			      <div class="container">
			        <div class="navbar-header">
			          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			          </button>
			          <a class="navbar-brand" href="/">Sports Keeda</a>
			        </div>
			        <div id="navbar" class="collapse navbar-collapse">
			          <ul class="nav navbar-nav">
			            <li <?php if ($this->request->params['controller'] === 'player' && $this->request->params['action'] === 'index'){ ?>class="active"<?php } ?>><a href="/player">Home</a></li>
			            <?php if (isset($loggedIn) && $loggedIn){ ?><li><a href="/user/logout">Logout</a></li><li <?php if ($this->request->params['controller'] === 'user' && $this->request->params['action'] === 'index'){ ?>class="active"<?php } ?>><a href="/user">Admin</a></li><?php }elseif ($this->request->params['action'] !== 'login'){ ?><li><a href="/user/login">Login</a></li><?php } ?>
			          </ul>
			        </div><!--/.nav-collapse -->
			      </div>
			    </nav>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
