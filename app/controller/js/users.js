$( document ).ready(function() {
    $('#registerUser').validator().on('submit', function (e) {
		$.ajax({
			method: "POST",
			url: "http://localhost/crud_api/app/model/classes/users.php",
			dataType: 'json',
			data: {
				name: $('#name').val(),
				user: $('#user').val(),
				password: $('#password').val(),
				city: $('#city').val(),
				phone: $('#phone').val()
			}
		}).done(function( msg ) {
			if( msg.success ) {
				swal( 'Excelente, te has registrado satisfactoriamente', 'Presiona el boton para salir...', 'success' );
				$('#name').val('');
				$('#user').val('');
				$('#password').val('');
				$('#city').val('');
				$('#phone').val('');
			} else {
				$("#registerUser > span").html("Error!");
			}
		});
		return false;
	});
});