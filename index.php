<?php
error_reporting(E_ALL);
ini_set('display_error', 1);
ini_set('display_startup_errors', 1);

require_once 'includes/database.php';

$statement = $connection->prepare('SELECT * FROM recipes_test_run');
$statement->execute();
$recipes = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

// Get the search input (if any)
$search = $_GET['search'] ?? ''; // Default to empty string if not set
$filter = $_GET['filter'] ?? ''; // Default to empty string if not set

// Prepare a SQL query with a WHERE clause for filtering
if (!empty($search) && !empty($filter)) {
    // Filter by both search term and category
    $statement = $connection->prepare('SELECT * FROM recipes_test_run WHERE (title LIKE ? OR ingredients LIKE ? OR protein LIKE ?) AND protein = ?');
    $searchParam = '%' . $search . '%'; // Add wildcards for partial matching
    $statement->bind_param('ssss', $searchParam, $searchParam, $searchParam, $filter);
} elseif (!empty($search)) {
    // Filter by search term only
    $statement = $connection->prepare('SELECT * FROM recipes_test_run WHERE title LIKE ? OR ingredients LIKE ? OR protein LIKE ?');
    $searchParam = '%' . $search . '%';
    $statement->bind_param('sss', $searchParam, $searchParam, $searchParam);
} elseif (!empty($filter)) {
    // Filter by protein category only
    $statement = $connection->prepare('SELECT * FROM recipes_test_run WHERE protein = ?');
    $statement->bind_param('s', $filter);
} else {
    // If no search term or filter, fetch all recipes
    $statement = $connection->prepare('SELECT * FROM recipes_test_run');
}

// Execute the statement
$statement->execute();

// Fetch the result
$recipes = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simmer</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="header.css">
    <script src="https://kit.fontawesome.com/f4cf6f4ce3.js" crossorigin="anonymous"></script>
</head>


<body>
    <header>
        <!-- nav bar -->
        <nav class="navbar">
            <a href="index.php" class="logo">
                <img src="pics/simmer-altlogo.webp" alt="Simmer Logo 2"/>
            </a>
            <div class="menu-icon" id="menu-icon">
                <i class="fas fa-bars"></i>
            </div>
            <ul id="nav-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="all-recipes.php">Recipes</a></li>
                <li><a href="help.php">Help</a></li>
            </ul>
        </nav>
        <!-- <script>
            document.getElementById("menu-icon").addEventListener("click", function() {
            const navMenu = document.getElementById("nav-menu");
            navMenu.classList.toggle("show-menu")https://idm-232-yy559.netlify.app/recipe-1">
                    <h3>Recipe Header 1</h3>;
        });
        </script> -->
    </header>


    <!-- Explore Recipes -->
        <div class="hero">
            <!-- <a href="all-recipes.php" class="hero-content"> 
                <h2>Discover Delicious Recipes</h2>
                <p>Your journey to better cooking starts here!</p>
                <a href="all-recipes.php" class="btn">Explore Recipes Now</a>
            </a>
        </div> -->

        <div class="explore">
            <a href="all-recipes.php" class="explore-content"> 
                <h2>Discover Delicious Recipes</h2>
                <p>Your journey to better cooking starts here!</p>
            </a>
        </div>


    <!-- Trending Recipes -->
    <section id="recipes" class="recipes-section">
        <h2>Trending Recipes</h2>   
        <div class="recipe-grid" id="recipe-grid">
            <div class="recipe-card">
                <a href="recipe-page.php">
                    <img src="pics/broccoli-bucatini.webp">
                </a>
                <a href="recipe-page.php">
                    <h3>Broccoli Bucatini</h3>
                </a>
                <p>
                    <span>Cook Time: <?php echo $recipe['cook_time']; ?></span>
                </p>
            </div>

            <div class="recipe-card">
                <a href=recipe-page.php>
                    <img src="pics/roasted-chicken.webp" alt="Recipe Image">
                </a>
                <a href="recipe-page.php">
                    <h3>Roasted Chicken</h3>
                </a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>

            <div class="recipe-card">
                <a href="recipe-page.php">
                    <img src="pics/mushroomtacos.webp" alt="Recipe Image">
                </a>
                <a href="recipe-page.php">
                    <h3>Mushroom Tacos</h3>
                </a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
        <div id="no-results" style="display: none;">
            <p>No recipes found. Try searching for something else!</p>
        </div>
    </section>




    <!-- footer -->
    <footer>
        <p>&copy; 2024 Simmer. All Rights Reserved.</p>
    </footer>
</body>
</html>