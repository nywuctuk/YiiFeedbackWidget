## YiiFeedbackWidget

A simple Yii widget for collecting user feedback.

### Install

Download or clone the files to your extensions directory:

	[app-root]/protected/extensions/feedback/
	
Edit your main config file:

	[app-root]/protected/config/main.php
	
And add the following:

	'import'=>array(
		'ext.feedback.FeedbackWidget'
	),

Now edit your main layout file:

	[app-root]/protected/views/layout/main.php
	
And add the following straight after the opening body tag:

	<body>
	
	<?php $this->widget('FeedbackWidget', array(
		'topicOptions' => array(
			'Bug', 'Improvement', 'Comment'
		),
		'toEmail' => 'your@email.com',
		'position' => 'left'
	)); ?>
	
### Config options

'topicOptions' - array of topic dropdown options

'toEmail' - email address to send feedback to

'position' - position to display widget, either 'left' or 'right'