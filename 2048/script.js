var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d'); /*Retourne des objets qui fournit des methodes et propriétes. avec 2d , il peut être utilisé pr dessiner des lignes, boites, cercles etc...sur la toile */

var sizeInput = document.getElementById('size');
var changeSize = document.getElementById('change-size');
var scoreLabel = document.getElementById('score');

var score = 0;
var size = 4;
var width = canvas.width / size - 6;

var cells = [];
var fontSize;
var loss = false;

startGame();

changeSize.onclick = function () {
  if (sizeInput.value >= 2 && sizeInput.value <= 20) 
  {
    size = sizeInput.value;
    width = canvas.width / size - 6;
    console.log(sizeInput.value);
    canvasClean();
    startGame();
  }
}

function cell(row, coll) {
    this.value = 0;
    this.x = coll * width + 5 * (coll +1);
    this.y = row * width + 5 * (row +1);
}

function createCells() {
    var i, j;
    for(i = 0; i < size; i++) {
        cells[i] = [];
        for(j = 0; j < size; j++) {
            cells[i][j] = new cell(i, j);
        }
    }
}

function drawCell(cell) {
    ctx.beginPath();
    ctx.rect(cell.x, cell.y, width, width);
    switch (cell.value){
        case 0 : ctx.fillStyle = '#000000';break;
        case 2 : ctx.fillStyle = '#4BAEAD';break;
        case 4 : ctx.fillStyle = '#7B56A4';break;
        case 8 : ctx.fillStyle = '#12B134';break;
        case 16 : ctx.fillStyle = '#1a4923';break;
        case 32 : ctx.fillStyle = '#E1DA39';break;    
        case 64 : ctx.fillStyle = '#1A6665';break;    
        case 128 : ctx.fillStyle = '#BBD150';break;    
        case 256 : ctx.fillStyle = '#44413D';break;    
        case 512 : ctx.fillStyle = '#262F5E';break;    
        case 1024 : ctx.fillStyle = '#D119DA';break;   
        case 2048 : ctx.fillStyle = '#731622';break;
        case 4096 : ctx.fillStyle = '#090953';break;
        default : ctx.fillStyle = '#eeeeee';
            
    }
    ctx.fill();
    if (cell.value) {
        fontSize = width / 2;
        ctx.font = fontSize + "px Arial";
        ctx.fillStyle = "white";
        ctx.textAlign = "center";
        ctx.fillText(cell.value, cell.x + width / 2, cell.y + width / 2);
    }
}

function canvasClean() {
  ctx.clearRect(0, 0, 500, 500);
}

document.onkeydown = function (event) {
    if(!loss){
        if (event.keyCode === 38 || event.keyCode === 87) { 
            moveUp();
        }
        else if (event.keyCode === 39 || event.keyCode === 68) {
            moveRight();
        }
        else if (event.keyCode === 40 || event.keyCode === 83) {
            moveDown();
        }
        else if (event.keyCode === 37 || event.keyCode === 65) {
            moveLeft();
        }
        scoreLabel.innerHTML = 'Score : ' + score;
    }
}

function startGame() {
  createCells();
  drawAllCells();
  pasteNewCell();
  pasteNewCell();
}

function finishGame() {
  canvas.style.opacity = '0.5';
  loss = true;
}

function drawAllCells() {
  var i, j;
  for(i = 0; i < size; i++) {
    for(j = 0; j < size; j++) 
    {
      drawCell(cells[i][j]);
    }
  }
}

function pasteNewCell() {
  var countFree = 0;
  var i, j;
  for(i = 0; i < size; i++) {
    for(j = 0; j < size; j++) 
    {
      if(!cells[i][j].value) 
      {
        countFree++;
      }
    }
  }
  if(!countFree) {
    finishGame();
    return;
  }
  while(true) {
    var row = Math.floor(Math.random() * size);
    var coll = Math.floor(Math.random() * size);
    if(!cells[row][coll].value) 
    {
      cells[row][coll].value = 2 * Math.ceil(Math.random() * 2);
      drawAllCells();
      return;
    }
  }
}

function moveRight () {
  var i, j;
  var coll;
  for(i = 0; i < size; i++) {
    for(j = size - 2; j >= 0; j--) {
      if(cells[i][j].value) {
        coll = j;
        while (coll + 1 < size) {
          if (!cells[i][coll + 1].value) {
            cells[i][coll + 1].value = cells[i][coll].value;
            cells[i][coll].value = 0;
            coll++;
          } 
          else if (cells[i][coll].value == cells[i][coll + 1].value) 
          {
            cells[i][coll + 1].value *= 2;
            score +=  cells[i][coll + 1].value;
            cells[i][coll].value = 0;
            break;
          } 
          else 
          {
            break;
          }
        }
      }
    }
  }
  pasteNewCell();
}

function moveLeft() {
  var i, j;
  var coll;
  for(i = 0; i < size; i++) {
    for(j = 1; j < size; j++) {
      if(cells[i][j].value) {
        coll = j;
        while (coll - 1 >= 0) {
          if (!cells[i][coll - 1].value) {
            cells[i][coll - 1].value = cells[i][coll].value;
            cells[i][coll].value = 0;
            coll--;
          } 
          else if (cells[i][coll].value == cells[i][coll - 1].value)
          {
            cells[i][coll - 1].value *= 2;
            score +=   cells[i][coll - 1].value;
            cells[i][coll].value = 0;
            break;
          } 
          else 
          {
            break; 
          }
        }
      }
    }
  }
  pasteNewCell();
}

function moveUp() {
  var i, j, row;
  for(j = 0; j < size; j++) {
    for(i = 1; i < size; i++) {
      if(cells[i][j].value) {
        row = i;
        while (row > 0) {
          if(!cells[row - 1][j].value) 
          {
            cells[row - 1][j].value = cells[row][j].value;
            cells[row][j].value = 0;
            row--;
          } 
          else if (cells[row][j].value == cells[row - 1][j].value) 
          {
            cells[row - 1][j].value *= 2;
            score +=  cells[row - 1][j].value;
            cells[row][j].value = 0;
            break;
          } 
          else 
          {
            break; 
          }
        }
      }
    }
  }
  pasteNewCell();
}

function moveDown() {
  var i, j, row;
  for(j = 0; j < size; j++) {
    for(i = size - 2; i >= 0; i--) {
      if(cells[i][j].value) {
        row = i;
        while (row + 1 < size) {
          if (!cells[row + 1][j].value) 
          {
            cells[row + 1][j].value = cells[row][j].value;
            cells[row][j].value = 0;
            row++;
          } 
          else if (cells[row][j].value == cells[row + 1][j].value) 
          {
            cells[row + 1][j].value *= 2;
            score +=  cells[row + 1][j].value;
            cells[row][j].value = 0;
            break;
          } 
          else {
            break; 
          }
        }
      }
    }
  }
  pasteNewCell();
}





    




