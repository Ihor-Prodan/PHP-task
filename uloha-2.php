<?php
class Board {
    private $board;
    private $size;
    private $cutX;
    private $cutY;
    private $currentTile = 1;

    public function __construct($n, $cutX, $cutY) {
        $this->size = $n;
        $this->cutX = $cutX;
        $this->cutY = $cutY;
        $this->board = array_fill(0, $n, array_fill(0, $n, 0));
        $this->board[$cutX][$cutY] = -1;
    }

    public function solve() {
        $this->fillBoard(0, 0, $this->size, $this->cutX, $this->cutY);
    }

    private function fillBoard($x, $y, $size, $cutX, $cutY) {
        if ($size == 2) {
            $this->placeTile($x, $y, $cutX, $cutY);
            return;
        }

        $half = $size / 2;

        if ($cutX < $x + $half && $cutY < $y + $half) {
            $this->fillBoard($x, $y, $half, $cutX, $cutY);
        } else {
            $this->fillBoard($x, $y, $half, $x + $half - 1, $y + $half - 1);
            $this->board[$x + $half - 1][$y + $half - 1] = $this->currentTile;
        }

        if ($cutX < $x + $half && $cutY >= $y + $half) {
            $this->fillBoard($x, $y + $half, $half, $cutX, $cutY);
        } else {
            $this->fillBoard($x, $y + $half, $half, $x + $half - 1, $y + $half);
            $this->board[$x + $half - 1][$y + $half] = $this->currentTile;
        }

        if ($cutX >= $x + $half && $cutY < $y + $half) {
            $this->fillBoard($x + $half, $y, $half, $cutX, $cutY);
        } else {
            $this->fillBoard($x + $half, $y, $half, $x + $half, $y + $half - 1);
            $this->board[$x + $half][$y + $half - 1] = $this->currentTile;
        }

        if ($cutX >= $x + $half && $cutY >= $y + $half) {
            $this->fillBoard($x + $half, $y + $half, $half, $cutX, $cutY);
        } else {
            $this->fillBoard($x + $half, $y + $half, $half, $x + $half, $y + $half);
            $this->board[$x + $half][$y + $half] = $this->currentTile;
        }

        $this->currentTile++;
    }

    private function placeTile($x, $y, $cutX, $cutY) {
        $tileId = $this->currentTile++;
        for ($i = 0; $i < 2; $i++) {
            for ($j = 0; $j < 2; $j++) {
                if ($x + $i != $cutX || $y + $j != $cutY) {
                    $this->board[$x + $i][$y + $j] = $tileId;
                }
            }
        }
    }

    public function renderBoard() {
        echo '<table border="1">';
        for ($i = 0; $i < $this->size; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $this->size; $j++) {
                $tileClass = ($this->board[$i][$j] == -1) ? 'cut' : 'tile' . $this->board[$i][$j];
                echo "<td class='{$tileClass}'></td>";
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}

// Priklad vytvoření nové instance třídy Board s rozměry 8x8 a výřezem na souřadnicích (2, 5), odpocitame od 0
$n = 8;
$cutX = 2;
$cutY = 5;

$newBoard = new Board($n, $cutX, $cutY);
$newBoard->solve();
// Priklad
?>

<style>
    table { 
        margin: 20px auto;
    }

    td { 
        width: 50px; 
        height: 50px; 
        text-align: center; 
        position: relative;
    }

    .cut { 
        background-color: #000; 
    }

    .tile { background-color: while; }
</style>

<?php
$newBoard->renderBoard();
?>