function deleteResv(event, that) {
	event.preventDefault();

	if (confirm("Are you sure ?")) {
		$.get($(that).attr("href"), {}, function() {
			$(that).parents("tr").fadeOut("slow");
		});
	}
}

function confirmResv(event, that) {
	event.preventDefault();

	$.get($(that).attr("href"), {}, function() {
		$(that).parents("tr").find('.cfr').html('<span class="badge badge-pill badge-success">Confirmed</span>');
		$(that).fadeOut('slow');
	});
}

function addRoom(event, that) {
	event.preventDefault();

	$.ajax({
		type: 'POST',
		url: $(that).attr('action'),
		processData: false,
		contentType: false,
		data: new FormData($(that)[0]),
		beforeSend: function() {
			$(that).find('btn').html("Menyimpan");
			$('#progress').fadeIn('slow');
		},
		success: function(response) {
			$('#progress').removeClass('alert-warning').addClass('alert-success').html("Sukses menyimpan room")
			.delay(500).fadeOut('slow').removeClass('alert-success').addClass('alert-warning').html("Menyimpan...");

			setTimeout(function() {
				location.reload();
			}, 1000);
		}
	})
}

function showRoom(event, that) {
	event.preventDefault();

	$.getJSON($(that).attr('href'), function(response) {

		$('form').attr('action', '../admin/editroom/'+response.code);
		$('input[name=name]').val(response.name);
		$('input[name=capacity]').val(response.capacity);
		$('input[name=amount]').val(response.amount);
		$('input[name=price]').val(response.price);
		$('input[name=code]').val(response.code);
		$('.card-header strong').html("EDIT ROOM");
		$('#btn-cancel').show();
	});
}

function deleteRoom(event, that) {
	event.preventDefault();
	if (confirm("Are you sure")) {
		$.get($(that).attr('href'), {}, function() {
			$(that).parents('.card').fadeOut('slow');
		});
	}
}

$('#btn-cancel').click(function() {
	$('.card-header strong').html("ADD ROOM");
	$('form').attr('action', '../admin/addroom').get(0).reset();
	$(this).hide();
});