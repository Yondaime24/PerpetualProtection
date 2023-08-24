var plan_type = document.getElementById("plan_type").value;
var payment_mode = document.getElementById("payment_mode").value;

	if (plan_type == "Plan 1" && payment_mode == "Monthly") {

        document.getElementById("contractPrice").setAttribute('value','15000.00');

    }else if(plan_type == "Plan 1" && payment_mode == "Quarterly"){

    	document.getElementById("contractPrice").setAttribute('value','14900.00');

    }else if (plan_type == "Plan 1" && payment_mode == "Semi-Annual") {

        document.getElementById("contractPrice").setAttribute('value','14700.00');
        
    }else if (plan_type == "Plan 1" && payment_mode == "Annual") {

        document.getElementById("contractPrice").setAttribute('value','14550.00');
        
    }else if (plan_type == "Plan 1" && payment_mode == "Lumpsum") {

        document.getElementById("contractPrice").setAttribute('value','14250.00');
        
    }else if (plan_type == "Plan 2" && payment_mode == "Monthly") {

        document.getElementById("contractPrice").setAttribute('value','21000.00');

    }else if(plan_type == "Plan 2" && payment_mode == "Quarterly"){

    	document.getElementById("contractPrice").setAttribute('value','20800.00');

    }else if (plan_type == "Plan 2" && payment_mode == "Semi-Annual") {

        document.getElementById("contractPrice").setAttribute('value','20580.00');
        
    }else if (plan_type == "Plan 2" && payment_mode == "Annual") {

        document.getElementById("contractPrice").setAttribute('value','20375.00');
        
    }else if (plan_type == "Plan 2" && payment_mode == "Lumpsum") {

        document.getElementById("contractPrice").setAttribute('value','19950.00');
        
    }else if (plan_type == "Plan 3" && payment_mode == "Monthly") {

        document.getElementById("contractPrice").setAttribute('value','27000.00');

    }else if(plan_type == "Plan 3" && payment_mode == "Quarterly"){

    	document.getElementById("contractPrice").setAttribute('value','26800.00');

    }else if (plan_type == "Plan 3" && payment_mode == "Semi-Annual") {

        document.getElementById("contractPrice").setAttribute('value','26460.00');
        
    }else if (plan_type == "Plan 3" && payment_mode == "Annual") {

        document.getElementById("contractPrice").setAttribute('value','26190.00');
        
    }else if (plan_type == "Plan 3" && payment_mode == "Lumpsum") {

        document.getElementById("contractPrice").setAttribute('value','25650.00');
        
    }else if (plan_type == "Plan 4" && payment_mode == "Monthly") {

        document.getElementById("contractPrice").setAttribute('value','45000.00');

    }else if(plan_type == "Plan 4" && payment_mode == "Quarterly"){

    	document.getElementById("contractPrice").setAttribute('value','44600.00');

    }else if (plan_type == "Plan 4" && payment_mode == "Semi-Annual") {

        document.getElementById("contractPrice").setAttribute('value','44100.00');
        
    }else if (plan_type == "Plan 4" && payment_mode == "Annual") {

        document.getElementById("contractPrice").setAttribute('value','43650.00');
        
    }else if (plan_type == "Plan 4" && payment_mode == "Lumpsum") {

        document.getElementById("contractPrice").setAttribute('value','42750.00');
        
    }else{

    	 document.getElementById("contractPrice").setAttribute('value','Error');

    }