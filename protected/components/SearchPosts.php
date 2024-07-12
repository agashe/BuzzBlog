<?php

Yii::import('zii.widgets.CPortlet');

class SearchPosts extends CPortlet
{
	public $title='Search & Filters';

	public function getModel()
	{
		return Post::model();
	}

	protected function renderContent()
	{
		$this->render('searchPosts');
	}
}