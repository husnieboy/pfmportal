$('.rem').click(function()

{
	var stcode = $('#stcode').val();
	var strid = $('#strid').val();
	var nameo = $(this).attr('name');
	
	$('#stripstatus').html('<img src="../img/loading.gif">');

	

	if(nameo!='')

	{

		$.post('storech.php',{nameo:nameo,stcode:stcode,strid:strid},
		
		function(data)

		{

			$('#stripstatus').html(data);

		});
	}else

	{

		$('#stripstatus').html('');

	}

});