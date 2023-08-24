var plan_type = document.getElementById("plan_type").value;
var payment_mode = document.getElementById("payment_mode").value;

	if (plan_type == "Plan 1" && payment_mode == "Monthly") {

        document.getElementById("commaoncontract").setAttribute('value','15,000.00');

    }else if(plan_type == "Plan 1" && payment_mode == "Quarterly"){

    	document.getElementById("commaoncontract").setAttribute('value','14,900.00');

    }else if (plan_type == "Plan 1" && payment_mode == "Semi-Annual") {

        document.getElementById("commaoncontract").setAttribute('value','14,700.00');
        
    }else if (plan_type == "Plan 1" && payment_mode == "Annual") {

        document.getElementById("commaoncontract").setAttribute('value','14,550.00');
        
    }else if (plan_type == "Plan 1" && payment_mode == "Lumpsum") {

        document.getElementById("commaoncontract").setAttribute('value','14,250.00');
        
    }else if (plan_type == "Plan 2" && payment_mode == "Monthly") {

        document.getElementById("commaoncontract").setAttribute('value','21,000.00');

    }else if(plan_type == "Plan 2" && payment_mode == "Quarterly"){

    	document.getElementById("commaoncontract").setAttribute('value','20,800.00');

    }else if (plan_type == "Plan 2" && payment_mode == "Semi-Annual") {

        document.getElementById("commaoncontract").setAttribute('value','20,580.00');
        
    }else if (plan_type == "Plan 2" && payment_mode == "Annual") {

        document.getElementById("commaoncontract").setAttribute('value','20,375.00');
        
    }else if (plan_type == "Plan 2" && payment_mode == "Lumpsum") {

        document.getElementById("commaoncontract").setAttribute('value','19,950.00');
        
    }else if (plan_type == "Plan 3" && payment_mode == "Monthly") {

        document.getElementById("commaoncontract").setAttribute('value','27,000.00');

    }else if(plan_type == "Plan 3" && payment_mode == "Quarterly"){

    	document.getElementById("commaoncontract").setAttribute('value','26,800.00');

    }else if (plan_type == "Plan 3" && payment_mode == "Semi-Annual") {

        document.getElementById("commaoncontract").setAttribute('value','26,460.00');
        
    }else if (plan_type == "Plan 3" && payment_mode == "Annual") {

        document.getElementById("commaoncontract").setAttribute('value','26,190.00');
        
    }else if (plan_type == "Plan 3" && payment_mode == "Lumpsum") {

        document.getElementById("commaoncontract").setAttribute('value','25,650.00');
        
    }else if (plan_type == "Plan 4" && payment_mode == "Monthly") {

        document.getElementById("commaoncontract").setAttribute('value','45,000.00');

    }else if(plan_type == "Plan 4" && payment_mode == "Quarterly"){

    	document.getElementById("commaoncontract").setAttribute('value','44,600.00');

    }else if (plan_type == "Plan 4" && payment_mode == "Semi-Annual") {

        document.getElementById("commaoncontract").setAttribute('value','44,100.00');
        
    }else if (plan_type == "Plan 4" && payment_mode == "Annual") {

        document.getElementById("commaoncontract").setAttribute('value','43,650.00');
        
    }else if (plan_type == "Plan 4" && payment_mode == "Lumpsum") {

        document.getElementById("commaoncontract").setAttribute('value','42,750.00');
        
    }else{

    	 document.getElementById("commaoncontract").setAttribute('value','Error');

    }