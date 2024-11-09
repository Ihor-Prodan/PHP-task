# Tromino Tiling Board

## Overview
This project is a PHP-based web application that demonstrates an algorithm for **tromino tiling** on a 2D board. The purpose of the algorithm is to cover an `n x n` board (where `n` is a power of 2) with "L-shaped" tromino tiles, leaving a single specified cell uncovered. This program generates a board where a user-defined cell is left empty (representing a "cut" or missing cell), and the algorithm then recursively fills the rest of the board with numbered tromino tiles.

## Features
- **Recursive Tiling Algorithm**: Fills an `n x n` board with tromino tiles, leaving a single specified cell uncovered.
- **Dynamic Size**: Allows the board size to be defined as a power of 2 (e.g., 2x2, 4x4, 8x8).
- **Customizable Cut Position**: Enables setting a custom position for the missing tile, so each run can have a unique layout.
- **HTML Table Rendering**: Visual representation of the board is rendered as an HTML table, with CSS styling for clear visualization.
- **CSS Styling**: Styles different tiles with unique colors, including a specific color for the missing cell.

## Technologies Used

### PHP
- **Object-Oriented Design**: The algorithm is implemented within a `Board` class, making it easy to create, configure, and solve different board setups.
- **Recursive Functions**: The core tiling function (`fillBoard`) uses recursion to divide and conquer the board, filling it with tromino tiles except for the predefined cut cell.
- **Dynamic Array Creation**: The board is initialized as a 2D array with each cell set to 0 initially, allowing flexible configuration based on the board size.
- **HTML Table Output**: PHP is used to render the final board as an HTML table, applying classes to each cell to differentiate tiles.

### HTML
- **Table Structure**: Displays the tromino-tiled board in a structured grid format.
- **Cell Styling**: Applies unique styles to each cell, differentiating between filled tiles and the missing cell (cut cell).
- **Dynamic Class Assignment**: Assigns CSS classes to each cell, based on the tile number, for easy styling.

### CSS
- **Visual Styling**: Uses CSS to style the HTML table, giving each tile a unique color or shade.
- **Custom Colors**: The missing tile (cut cell) has a distinct color (black) to stand out from the tiled cells.
- **Responsive Design**: Each cell in the table is styled with fixed dimensions, allowing the board to maintain its layout on various screen sizes.

## Conclusion
The Tromino Tiling Board project showcases a classic algorithmic problem, implemented and visualized using PHP, HTML, and CSS. The algorithm fills an `n x n` board with tromino tiles, leaving a single specified cell empty. This application dynamically renders the board as an HTML table, with styling that differentiates between the cut cell and the filled tiles. It serves as both an educational tool and a visually appealing example of recursion and divide-and-conquer techniques in programming.
