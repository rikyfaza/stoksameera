$(function () { 

	//Datemask dd/mm/yyyy
	//$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
	//$("[data-mask]").inputmask();

	$( "#purchase_date" ).datepicker();
	$( "#payment_date" ).datepicker();
	/*
	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	$( "#freight_cost" ).keydown(function( event ) {
		//var x = numberWithCommas($( "#freight_cost" ).val());
		$( "#vendor_code" ).text($( "#freight_cost" ).val().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
		console.log( numberWithCommas($( "#freight_cost" ).val()) );
	});
	*/
	$('#freight_cost, #prod_unit_price,#prod_selling_price').keyup(function(event) {

	  // skip for arrow keys
	  if(event.which >= 37 && event.which <= 40) return;

	  // format number
	  $(this).val(function(index, value) {
		return value
		  .replace(/\D/g, "")
		  .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	  });
	});

	/*
	 WebFontConfig = {
		google: { families: [ 'Lobster::latin' ] }
	  };
	  (function() {
		var wf = document.createElement('script');
		wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		  '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
	  })();
	*/


});