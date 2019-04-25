$(document).ready(function () {
	$('.js-like-article').on('click', function (e) {
		e.preventDefault();
		var $link = $(e.currentTarget);
		var child = $link.find('i');
		child.toggleClass('fa').toggleClass('far');
		$.ajax({
			method: 'POST',
			url: $link.attr('href')
		}).done(function (data) {
			$('.js-like-article-count').html(data.hearts);
		});
	})
});