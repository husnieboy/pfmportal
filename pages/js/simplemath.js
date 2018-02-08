$(document).keyup(function() {
        var rte = document.getElementById('rte').value;
        var ff = document.getElementById('ff').value;
        var fs = Number(rte) + Number(ff);
		if(rte!='' & ff!='')
		{
        document.getElementById('fs').value = fs;
		}
		else
		{
			document.getElementById('fs').value = '';
		}
      });
	  
$(document).change(function() {
        var fs = document.getElementById('fs').value;
        var cus = document.getElementById('cus').value;
        var total_sales = Number(fs) + Number(cus);
		if(fs!='' & cus!='')
		{
        document.getElementById('total_sales').value = total_sales;
		}
		else
		{
			document.getElementById('total_sales').value = '';
		}
      });
$(document).change(function() {
        var total_sales = document.getElementById('total_sales').value;
        var tc = document.getElementById('tc').value;
		var fix = Number(total_sales) / Number(tc);
        var ac = fix.toFixed(1);
		if(total_sales!='' & tc!='')
		{
        document.getElementById('ac').value = ac;
		}
		else
		{
			document.getElementById('ac').value = '';
		}
      });