$(document).ready(function() {
	$('dropdown-toggle').dropdown()
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
})

$(function(){
	$("#faqs-menu").load("menus/faqs.html");
});

document.registerElement('question');
document.registerElement('answer');


