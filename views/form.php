<?php
/**
 * @author Gareth Bond dev@gazbond.co.uk
 * @copyright Copyright &copy; Gareth Bond 2013
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version 1.0.0
 *
 * @var $this Controller
 * @var $feedbackForm FeedbackForm
 * @var $topicOptions array
 * @var $isPostBack boolean
 * @var $position string
 */
?>
<div id="feedback" class="<?php echo $position; ?>">
	<div id="feedback-button">
		<?php echo CHtml::link('Feedback'); ?>
	</div>
	<?php if (Yii::app()->user->hasFlash('feedback')): ?>
		<div id="feedback-flash">
			<?php echo Yii::app()->user->getFlash('feedback'); ?>
		</div>
	<?php endif; ?>
	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'feedback-form',
		'htmlOptions' => array(
			'class' => !$isPostBack ? 'hide' : ''
		)
	)); ?>
	<div class="feedback-row">
		<?php echo $form->labelEx($feedbackForm, 'topic'); ?>
		<?php echo $form->dropDownList($feedbackForm, 'topic', $topicOptions); ?>
		<?php echo $form->error($feedbackForm, 'topic'); ?>
	</div>
	<div class="feedback-row email">
		<?php echo $form->labelEx($feedbackForm, 'email'); ?>
		<?php echo $form->textField($feedbackForm, 'email'); ?>
		<?php echo $form->error($feedbackForm, 'email'); ?>
	</div>
	<div class="feedback-row message">
		<?php echo $form->labelEx($feedbackForm, 'message'); ?>
		<?php echo $form->textArea($feedbackForm, 'message'); ?>
		<?php echo $form->error($feedbackForm, 'message'); ?>
	</div>
	<div class="feedback-row submit">
		<?php echo CHtml::submitButton('Submit', array(
			'name' => CHtml::activeName($feedbackForm, 'submit')
		)); ?>
	</div>
<?php $this->endWidget(); ?>
</div>