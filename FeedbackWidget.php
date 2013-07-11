<?php

Yii::import('ext.feedback.models.FeedbackForm');

/**
 * @author Gareth Bond dev@gazbond.co.uk
 * @copyright Copyright &copy; Gareth Bond 2013
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version 1.0.0
 */
class FeedbackWidget extends CWidget
{
	public $topicOptions = null;
	public $toEmail = null;
	public $position = 'left';

	public function init()
	{
		// Check for required config options
		if ($this->topicOptions === null) {
			throw new CException("Config error: missing 'topicOptions'");
		}
		if ($this->toEmail === null) {
			throw new CException("Config error: missing 'toEmail'");
		}

		// Make 'topicOptions' keys and values the same
		$topicOptions = array();
		foreach ($this->topicOptions as &$option) {
			$topicOptions[$option] = $option;
		}
		$this->topicOptions = $topicOptions;

		// Publish assets
		$localPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
		$publicPath = Yii::app()->getAssetManager()->publish($localPath);

		// Register jQuery
		Yii::app()->getClientScript()->registerCoreScript('jquery');

		// Register feedback widget js and css
		Yii::app()->clientScript->registerScriptFile($publicPath . '/feedback.js');
		Yii::app()->clientScript->registerCssFile($publicPath . '/feedback.css');
	}

	public function run()
	{
		$feedbackForm = new FeedbackForm();
		$isPostBack = false;
		// Post back
		if (isset($_POST['FeedbackForm'])) {
			$feedbackForm->attributes = $_POST['FeedbackForm'];
			$isPostBack = true;
			if ($feedbackForm->validate()) {
				// Send email
				mail($this->toEmail, 'Feedback (' . $feedbackForm->topic . ')', $feedbackForm->message);
				// Set flash
				Yii::app()->user->setFlash('feedback', 'Thank you for your feedback.');
				// Redirect
				$this->controller->refresh();
			}
		}

		// Render
		$this->render('form', array(
			'feedbackForm' => $feedbackForm,
			'topicOptions' => $this->topicOptions,
			'isPostBack' => $isPostBack,
			'position' => $this->position
		));
	}
}