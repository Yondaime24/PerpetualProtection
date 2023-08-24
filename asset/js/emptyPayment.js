var payment = document.getElementById("payment").value;

if (payment == '') {

        document.getElementById("emptyPayment").setAttribute('value','No payment data. Please add payment first!');
        document.getElementById("balance").remove();


    }else{
    	document.getElementById("emptyPayment").remove();
    	document.getElementById("balance").show();
    }