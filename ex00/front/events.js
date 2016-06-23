var $order = $('#submitOrder');
var $order = $('#submitOrder');
var $moveActions = $('#moveActions');

var orderCb = function(data) {
	console.log(data);
}

var moveCb = function(data) {
	console.log(data);
}

$order.on('click', function (e) {
	e.preventDefault();
	// temp
	var maxPP = 20;

	var attack = $('#ppAttack').val();
	var speed = $('#ppSpeed').val();
	var repair = $('#ppRepair').val();
	var shield = $('#ppShield').val();
	var total = parseInt(attack, 10) + parseInt(speed, 10) + parseInt(repair, 10) + parseInt(shield, 10);

console.log("attack speed repair shield", attack, speed, repair, shield);

	if (total > maxPP) {
		alert('Vous n\'avez pas autant de pp');
	} else if (total < maxPP) {
		alert('Vous n\'avez pas attribue tout vos pp');
	} else {
		var data = {
			phase: "order",
			attack: attack,
			speed: speed,
			repair: repair,
			shield: shield
		};

		$.ajax({
			type: "POST",
			url: "game.php",
			data: data,
			success: orderCb,
			dataType: 'json'
		});
	}
});

$moveActions.on('click', 'button', function (e) {
	e.preventDefault();
	//console.log($(e.currentTarget).attr('id'));
	var data = {
		phase: "move",
		action: $(e.currentTarget).attr('id')
	};

	$.ajax({
		type: "POST",
		url: "game.php",
		data: data,
		success: moveCb,
		dataType: 'json'
	});
});
