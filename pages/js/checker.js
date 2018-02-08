// JavaScript Document


$(document).ready(function(){
$('#vqp_code').ready(function()

{

	var vqp_code = $('#vqp_code').val();

	$('#status').html('<img src="../img/loading.gif">');

	

	if(vqp_code!='')

	{

		$.post('../checker.php',{vqp_code:vqp_code},

		function(data)

		{

			$('#status').html(data);

		});

	}

	else

	{

		$('#status').html('');

	}

});

$('#hrp').click(function()

{
	

	var ffdate = $('#ffdate').val();
	var lldate = $('#lldate').val();

	$('#datehis').html('<img src="../img/loading.gif">');

	

	if(ffdate!='')

	{

		$.post('../checker.php',{ffdate:ffdate,lldate:lldate},

		function(data)

		{

			$('#datehis').html(data);

		});

	}

	else

	{

		$('#datehis').html('');

	}

});

$('#user_name').keyup(function()

{

	

    var edit_account = document.getElementById('edit_account');

	var user_name = $('#user_name').val();

	$('#status').html('<img src="../img/loading.gif">');

	

	if(user_name!='')

	{

		$.post('../checker.php',{user_name:user_name},

		function(data)

		{

			$('#status').html(data);

		});

		edit_account.disabled = false;

	}

	else

	{

		$('#status').html('');

		edit_account.disabled = true;

	}

});

//NoweekEnds
$(function() {



		$( "#vqp_date" ).datepicker({beforeShowDay: $.datepicker.noWeekends});



		});

		

$('#vqp_password').keyup(function()

{

	

    var vqpregister = document.getElementById('vqpregister');

	var vqp_password = $('#vqp_password').val();

	$('#status').html('<img src="../img/loading.gif">');

	

	if(vqp_password!='')

	{

		$.post('../vqpchecker.php',{vqp_password:vqp_password},

		function(data)

		{

			$('#status').html(data);

		});

		vqpregister.disabled = false;

	}

	else

	{

		$('#status').html('');

		vqpregister.disabled = true;

	}

});



$('#vqp_name_select').change(function()

{


	var vqp_name_select = $('#vqp_name_select').val();

	$('#status').html('<img src="../img/loading.gif">');

	

	if(vqp_name_select!='')

	{

		$.post('../vqpchecker.php',{vqp_name_select:vqp_name_select},

		function(data)

		{

			$('#status').html(data);

		});


	}

	else

	{

		$('#status').html('');


	}

});

$('#Tdate').change(function()

{
	
	var date = $('#Tdate').val();
	var store_name = $('#store_name').val();

	$('#status').html('<img src="../img/loading.gif">');

	if(date!='')

	{

		$.post('../checker.php',{date:date},

		function(data)

		{
			
			$('#status').html(data);

		});
		
	}
	

	else

	{

		$('#status').html('');

	}
});

$('#ticket_date').ready(function()

{
	
	var ticket_date = $('#ticket_date').val();

	$('#status').html('<img src="../img/loading.gif">');

	if(ticket_date!='')

	{

		$.post('../checker.php',{ticket_date:ticket_date},

		function(data)

		{
			
			$('#status').html(data);

		});
		
	}
	

	else

	{

		$('#status').html('');

	}
});

$('#SM').change(function()

{
	
	var SM = $('#SM').val();

	$('#status').html('<img src="../img/loading.gif">');

	if(SM!='')

	{

		$.post('../checker.php',{SM:SM},

		function(data)

		{
			
			$('#status').html(data);

		});
		
	}
	

	else

	{

		$('#status').html('');

	}
});

$('#pno').keyup(function()

{
	this.value = this.value.toUpperCase()
	var pno = $('#pno').val();

	$('#status').html('<img src="../img/loading.gif">');

	

	if(pno!='')

	{

		$.post('../checker.php',{pno:pno},
		
		function(data)

		{

			$('#status').html(data);
			

		});
		

	}

	else

	{

		$('#status').html('');

	}

});
$('#sttrip').change(function()

{

	var sttrip = $('#sttrip').val();
	var lbltrpno = $('#lbltrpno').val();

	$('#stripstatus').html('<img src="../img/loading.gif">');

	if(sttrip!='')

	{

		$.post('../dc/storech.php',{sttrip:sttrip,lbltrpno:lbltrpno},

		function(data)

		{

			$('#stripstatus').html(data);

		});

	}

	else

	{

		$('#stripstatus').html('');

	}

});

$('#triporig').change(function()

{

	var triporig = $('#triporig').val();

	$('#scantext').html('<img src="../img/loading.gif">');

	if(triporig!='')

	{

		$.post('../checker.php',{triporig:triporig},

		function(data)

		{

			$('#scantext').html(data);

		});

	}

	else

	{

		$('#scantext').html('');

	}

});
});