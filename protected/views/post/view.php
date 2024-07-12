<?php
$this->breadcrumbs=array(
	$model->title,
);
$this->pageTitle=$model->title;
?>

<?php $this->renderPartial('_view', array(
	'data'=>$model,
)); ?>

<div id="comments">
	<?php if($model->commentCount>=1): ?>
		<h3>
			<?php echo $model->commentCount>1 ? $model->commentCount . ' comments' : 'One comment'; ?>
		</h3>

		<?php $this->renderPartial('_comments',array(
			'post'=>$model,
			'comments'=>$model->comments,
		)); ?>
	<?php endif; ?>
		
	<br>
	<br>
	
	<h3>Like this post</h3>

	<?php if(!Yii::app()->user->isGuest): ?>
		<?php if($model->userGaveLike()): ?>
			<div class="hint">
				<h3>
					<?php echo CHtml::link("Like", Yii::app()->request->baseUrl . '/post/like?post=' . $model->id); ?>
				</h3>
			<br>
			</div>
		<?php else: ?>
			<p class="hint">
				You already gave this post a like !
			</p>
		<?php endif; ?>
	<?php else: ?>
		<p class="hint">
			You need to <?php echo CHtml::link("Login", Yii::app()->request->baseUrl . '/site/login'); ?> to your account in order to like !.
		</p>
	<?php endif; ?>

	<h3>Leave a Comment</h3>

	<?php if(!Yii::app()->user->isGuest): ?>
		<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
			<div class="flash-success">
				<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
			</div>
		<?php else: ?>
			<?php $this->renderPartial('/comment/_form',array(
				'model'=>$comment,
			)); ?>
		<?php endif; ?>
	<?php else: ?>
		<p class="hint">
			You need to <?php echo CHtml::link("Login", Yii::app()->request->baseUrl . '/site/login'); ?> to your account in order to comment !.
		</p>
	<?php endif; ?>

</div><!-- comments -->
