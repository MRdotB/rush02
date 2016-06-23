'use strict'

var $cellGrid = $('#cell-grid');
var gridWidth = 50;
var gridHeight = 75;
var turn = 0;

function baseMap (sizeX, sizeY) {
	var map = [];
	for (let y = 0; y < sizeY; y++) {
		var line = [];
		for (let x = 0; x < sizeX; x++) {
			line.push('.');
		}
		map.push(line);
	}
	return map;
}

function renderMap (map) {
	for (let x = 0; x < gridHeight; x++) {
		var $tableRow = $('<tr></tr>');
		for (let y = 0; y < gridWidth; y++) {
			var $cell = $('<td class="cell"></td>');
			if (x == 0 || x == gridHeight -1) {
				$cell.addClass('cell-border');
			} else {
				if (y == 0 || y == gridWidth) {
					$cell.addClass('cell-border');
				}
			}
			$cell.attr('id', x + '-' + y);
			if (map[x][y] == 'A') {
				$cell.addClass('colorA');
			} else if (map[x][y] == 'B') {
				$cell.addClass('colorB');
			}
			$tableRow.append($cell);
		}
	$cellGrid.append($tableRow);
	}
}

function updateMap (map) {
	$cellGrid.find('td').removeClass('colorA colorB');
	for (let x = 0; x < gridHeight; x++) {
		for (let y = 0; y < gridWidth; y++) {
			if (map[x][y] == 'A') {
				$("#" + x + "-" + y).addClass('colorA');
			} else if (map[x][y] == 'B') {
				$("#" + x + "-" + y).addClass('colorB');
			}
		}
	}
}

console.log(map);
var map = baseMap(gridWidth, gridHeight);
renderMap(map);

map[1][1] = 'A';
map[1][2] = 'A';
map[1][3] = 'A';

map[73][48] = 'B';
map[73][47] = 'B';
map[73][46] = 'B';


updateMap(map);
