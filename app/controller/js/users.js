$( document ).ready(function() {
    $('#registerUser').validator().on('submit', function (e) {
		$.ajax({
			type: "POST",
			url: "http://localhost/crud_api/app/controller/php/register/users.php",
			dataType: 'json',
			data: $('form').serialize()
		}).done(function( msg ) {
			if( msg.success ) {
				swal( 'Excelente, te has registrado satisfactoriamente', 'Presiona el boton para salir...', 'success' );
				$('#name').val('');
				$('#user').val('');
				$('#password').val('');
				$('#city').val('');
				$('#phone').val('');
				$('#r_password').val('');
			} else {
				$("#registerUser > span").html("Error!");
			}
		});
		return false;
	});
});
