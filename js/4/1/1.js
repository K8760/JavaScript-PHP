$(document).ready(function() {
	$("#myForm").submit(function(e){
		// remove default submit behavior
		e.preventDefault();
		// lue luvut lomakkeelta (ovat merkkijonoja)
		var number1 = $("#number1").val();
		var number2 = $("#number2").val();
        var summa = parseInt(number1) + parseInt(number2);
		$("#result").text("Sum is: " + summa);
		})
})