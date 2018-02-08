<!DOCTYPE html>

   		<script type="text/javascript"> 

		function displayTimeC(){

		var refresh=1000; // Refresh rate in milli seconds

		mytime=setTimeout('displayTime()',refresh)

		}

		function displayTime() {

		var strcount
		
		var x = new Date()

		//var hours = x.getHours() > 12 ? x.getHours() - 12 : x.getHours();

        var am_pm = x.getHours() >= 12 ? "PM" : "AM";

		var x1 = x.getHours()+ ":" + x.getMinutes() + ":" + x.getSeconds() +" "+ am_pm;

		document.getElementById('time').value = x1;
		
		var satsun = document.getElementById('sat_sun').value;
		
		if(x.getHours() >=15  || satsun == "Saturday" || satsun == "Sunday")
		{
		document.getElementById('bar_code').disabled = true;
		document.getElementById('Process').disabled = true;
		}
		else
		{
		document.getElementById('bar_code').disabled = false;
		document.getElementById('Process').disabled = false;
		}
		
		var onSales = document.getElementById('sales').value;
		
		if(onSales == "QC1" || onSales == "QC2" || onSales == "QC3")
		{
		document.getElementById('sl').style.visibility = "visible";
		}
		else
		{
		document.getElementById('sl').style.visibility = "hidden";
		}

		timeout=displayTimeC();
		
		}

		</script>
		<script>

		
		$(function() {

		$( "#Tdate" ).datepicker();

		});
		
		
		$(function() {

		$( "#fdate" ).datepicker();

		});
		$(function() {

		$( "#ldate" ).datepicker();

		});


		function displayTimeCurrent(){

		var refresh=1000; // Refresh rate in milli seconds

		mytime=setTimeout('displayTimeBig()',refresh)

		}



		function displayTimeBig() {

		var strcount

		var x = new Date()

		//var hours = x.getHours() > 12 ? x.getHours() - 12 : x.getHours();

        var am_pm = x.getHours() >= 12 ? "PM" : "AM";

		var x2 = x.toDateString()+ " - " + x.getHours( )+ ":" + x.getMinutes() + ":" + x.getSeconds() +" "+ am_pm;

		document.getElementById('CountTime').style.fontSize='42px';

		document.getElementById('CountTime').style.color='#0030c0';

		document.getElementById('CountTime').innerHTML = x2;

		document.getElementById('CountTime').innerHTML = x2;

		timeout=displayTimeCurrent();

		}
		
		
		

		

	</script>
	<script>

		//function TakeTheRed() {

		//var strcount

		//var R = new Date()

        //var am_pm = R.getHours() >= 7 ? "PM" : "AM";

		//document.getElementById('takered').style.color='#FF0000';

		//timeout=displayTimeCurrent();

		//}
		

	</script>
	
	<script type="text/javascript">
	
	function findselected() {
    var user_level = document.getElementById('user_level');
    if(user_level.value == '4') 
        am_store.disabled = true
    else
        am_store.disabled = false
	}
	</script>

