	  var contractPrice = parseFloat(document.getElementById('contractPrice').value);
      var payment = parseFloat(document.getElementById('payment').value);
      var balance = document.getElementById('balance');
      var bal = contractPrice - payment;
      bal = bal.toFixed(2);
      balance.value = bal;