function getSelectedValue() {
		var hol = document.getElementsByName('holiday');
		var cus = document.getElementsByName('customer');

		var holidayid = -1;
		var customerid = -1;
		
		for(var i=0; i<hol.length; i++) {
			if(hol[i].checked == true)
				holidayid = hol[i].value;
		}
		
		for(var i=0; i<cus.length; i++) {
			if(cus[i].checked == true)
				customerid = cus[i].value;
		}
		
		if(holidayid == -1 || customerid == -1) return null;
		
		window.location.replace("index.php?page=connection&new=new&holiday="+holidayid+"&customer="+customerid);
		return true;
	}