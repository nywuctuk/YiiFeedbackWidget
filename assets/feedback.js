/**
 * @author Gareth Bond dev@gazbond.co.uk
 * @copyright Copyright &copy; Gareth Bond 2013
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version 1.0.0
 */
$(document).ready(function() {
	$('#feedback-button a').click(function() {
		$flash = $('#feedback-flash');
		if ($flash.length !== 0) {
			$flash.remove();
		} else {
			$('#feedback-form').toggle();
		}
		return false;
	});
	$('#feedback-form').click(function(e) {
		e.stopPropagation();
	});
	$('body').click(function() {
		$('#feedback-form').hide();
		$('#feedback-flash').remove();
	});
});