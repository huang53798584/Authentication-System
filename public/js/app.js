$(document).ready(function() {
	$('form.delete').on('submit', function(e) {
		return confirm('Are you sure?');
	});
});