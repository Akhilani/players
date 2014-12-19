<div class="container">
	<table class="table table-striped table-bordered">
	<thead>
	<td>Name</td>
	<td>Points</td>
	<?php if (isset($loggedIn) && $loggedIn){ ?>
		<td>Add Points</td>
		<td>Action</td>
	<?php } ?>
	</thead>
	<?php foreach ($players as $player){ ?>
		<tr>
		<td><?php echo $player['Player']['name']; ?></td>
		<td><?php echo $player['Player']['points']; ?></td>
		<?php if (isset($loggedIn) && $loggedIn){ ?>
			<td><?php 
			echo $this->Form->create('Player', array(
			'url' => array(
					'controller' => 'player',
					'action' => 'addpoints'
			)));
			echo $this->Form->input('points', array('label' => false, 'class' => 'form-control'));
			echo $this->Form->input('id', array('type' => 'hidden', 'default'=>$player['Player']['id']));?>
			</td>
			<td>
			<?php echo $this->Form->end('Save');
			 ?></td>
		<?php } ?>
		</tr>
	<?php } ?>
	</table>
</div>