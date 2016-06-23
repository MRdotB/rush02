'use strict'

var cellGrid = document.getElementById('cell-grid');
var $cellGrid = $('#cell-grid');
var gridWidth = 50;
var gridHeight = 75;
var turn = 0;

// Create the grid
function renderMap (map) {
	for (let x = 0; x < gridHeight; x++) {
		for (let y = 0; y < gridWidth; y++) {

		}
	}
	$cellGrid
}
for (let i = 0; i < gridHeight; i++) {
  var tableRow = document.createElement('tr')

  for (let j = 0; j < gridWidth; j++) {
    let cell = document.createElement('td')

    if (i === 0 || i === gridHeight - 1) cell.className = 'cell-border'
    else {
      if (j === 0 || j === gridWidth - 1) cell.className = 'cell-border'
      else cell.className = 'cell'
    }
    cell.id = i + '-' + j
    tableRow.appendChild(cell)
  }

  cellGrid.appendChild(tableRow)
}
