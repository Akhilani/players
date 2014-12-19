<div class="container">
	<?php echo $this->Html->link(
	    'Add player',
	    array('controller' => 'player', 'action' => 'add')
	); ?>
	<table class="table table-striped table-bordered">
	<thead>
	<td>Name</td>
	<td>Points</td>
	</thead>
	<?php foreach ($players as $player){ ?>
		<tr>
		<td><?php echo $player['Player']['name']; ?></td>
		<td><?php echo $player['Player']['points']; ?></td>
		</tr>
	<?php } ?>
	</table>
</div>