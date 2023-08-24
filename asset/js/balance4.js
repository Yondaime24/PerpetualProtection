
	  const formatter = new Intl.NumberFormat('en', {
	  	minimumFractionDigits: 2
	  });
	  var contractPrice = parseFloat(document.getElementById('contractPrice').value);
      var payment = parseFloat(document.getElementById('payment').value);
      var balance = document.getElementById('balance');
      var bal = contractPrice - payment;


      balance.value = formatter.format(bal);
