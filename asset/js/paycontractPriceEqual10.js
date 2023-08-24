var balance = document.getElementById("balance").value;
var payment_btn = document.getElementById("payment_btn");
var finishBtn = document.getElementById("finishBtn");

 if (balance == '0.00') {

	payment_btn.remove();
	document.getElementById("finish").show();
	document.getElementById("finish2").show();
	finishBtn.show();
  }else{
  	document.getElementById("finish").remove();
  	document.getElementById("finish2").remove();
  	finishBtn.remove();
  }
  