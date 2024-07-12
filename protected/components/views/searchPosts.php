<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action' => Yii::app()->request->baseUrl . '/post/search',
	'method' => 'GET'
	)); 
?>
	<?php echo CHtml::errorSummary($this->getModel()); ?>

	<div class="row">
		<?php echo 'title'; ?>
		<br>
		<input type="text" name="title" style="padding: 2px 0px;" value="<?php echo isset($_GET['title']) ? $_GET['title'] : ''?>">
	</div>

	<div class="row">
		<?php echo 'author'; ?>
		<br>
		<input type="text" name="author" style="padding: 2px 0px;"  value="<?php echo isset($_GET['author']) ? $_GET['author'] : ''?>">
	</div>

	<div class="row">
		<?php echo 'date'; ?>
		<br>
		<input type="date" name="date" style="padding: 3px 27px;"  value="<?php echo isset($_GET['date']) ? $_GET['date'] : ''?>">
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->