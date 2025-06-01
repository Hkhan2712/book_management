$(document).ready( () => {
    $('table.table tbody').on('click', 'a.table-link.delete', function(event) {
		event.stopPropagation();
		tc = $(this);
		var cf = confirm("Are you sure!");
		if (cf == true) {
			url=tc.attr('href');
			$.ajax({
				url: url,
				method: 'post',
				success: function( data ) {
					if(data)
						tc.parent().parent().remove();
				},
			});
		}
		return false;
	});
}
)