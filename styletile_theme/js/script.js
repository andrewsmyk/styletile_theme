jQuery(document).ready(function($) {
	
	//Start off hiding everything
	$('.toggle').hide();
	//Show first tyle
	$('.toggle#brand').show();

	//show / hide divs as necessary
	function toggle_stytil_section( id ){
		if(id == '#brand') {
			$('.toggle').show();
			$('.btn').hide(); 
		}
		else if ( $('.toggle').is(':visible') ){
			$('.toggle').hide(function() {
				$(id).show();
			});
		}
	}

	//when button pressed do function
	$('.toggle .btn').click(function () {
		toggle_stytil_section( $(this).attr('href') );
	});
});