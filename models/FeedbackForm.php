<?php

/**
 * @author Gareth Bond dev@gazbond.co.uk
 * @copyright Copyright &copy; Gareth Bond 2013
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version 1.0.0
 */
class FeedbackForm extends CFormModel
{
	public $topic;
	public $email;
	public $message;

	public function rules()
	{
		return array(
			array('topic, email, message', 'required'),
			array('email', 'email'),
		);
	}
}