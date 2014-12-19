<div class="container">
<?php 
echo $this->Form->create('Player', array('type' => 'post')); 
echo $this->Form->input('name', array('class' => 'form-control'));
echo $this->Form->input('points', array('class' => 'form-control'));
echo $this->Form->end('Save');
?>
</div>