<?php
error_reporting(E_ALL);
ini_set('display_error', 1);
ini_set('display_startup_errors', 1);

require_once 'includes/database.php';

// Check if an ID is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "No recipe ID provided.";
    exit;
}

$recipe_id = intval($_GET['id']); // Ensure the ID is an integer

// Prepare and execute a SQL query to fetch recipe details
$statement = $connection->prepare('SELECT * FROM recipes_test_run WHERE id = ?');
$statement->bind_param('i', $recipe_id);
$statement->execute();

$recipe = $statement->get_result()->fetch_assoc();

// Check if the recipe exists
if (!$recipe) {
    echo "Recipe not found.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $recipe['title']; ?> - Recipe Details</title>
    <link rel="stylesheet" href="recipe-page.css">
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
            <!-- <div class="menu-icon" id="menu-icon">
                <i class="fas fa-bars"></i>
            </div> -->
            <ul id="nav-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="all-recipes.php">Recipes</a></li>
                <li><a href="help.php">Help</a></li>
            </ul>
        </nav>

        <!-- <script>
            document.getElementById("menu-icon").addEventListener("click", function() {
            const navMenu = document.getElementById("nav-menu");
            navMenu.classList.toggle("show-menu");
        });
        </script> -->
    </header>

    <!-- big wrapper -->
    <section class="recipe-details">

        <div class="back-button">
            <a href="all-recipes.php" class="btn-back"><i class="fas fa-arrow-left"></i> Back to Recipes</a>
        </div>

        <!-- Recipe Image -->
        <div class="recipe-header">
            <img src="pics/<?php echo $recipe['main_image']; ?>" alt="Recipe Image" class="recipe-image">

            <!-- Title + Subtitle + Blurb -->
            <div class="recipe-titles">
                <h1 class="title"><?php echo $recipe['title']; ?></h1>
                <h3 class="subtitle"><?php echo $recipe['subtitle']; ?></h3>
                <p class="description"><?php echo $recipe['description']; ?></p>

            <!-- Recipe cook time + serving size + protein + calories -->
            <div class="info">
                    <div class="cook-time">
                        <i class="fa-solid fa-clock"></i>
                        <span><?php echo $recipe['cook_time']; ?></span>
                    </div>

                    <div class="serving-size">
                        <i class="fa-solid fa-users"></i>
                        <span><?php echo $recipe['serving_size']; ?></span>
                    </div>

                    <div class="protein">
                        <i class="fa-solid fa-utensils"></i>
                        <span><?php echo $recipe['protein']; ?></span>
                    </div>

                    <div class="calories">
                        <i class="fa-solid fa-weight-scale"></i>
                        <span><?php echo $recipe['calories']; ?></span>
                    </div>
            </div>
            </div>
        </div>


        <!-- Recipe Ingredients  -->
        <div class="recipe-content">
            <div class="ingredients">
                <h2>Ingredients</h2>
                <div class="ingredients-image">
                    <img src="images/<?php echo $recipe['ingredients_image']; ?>" alt="Ingredient image">
                </div>
        
                <ul>
                    <?php
                    $ingredients = explode('*', $recipe['ingredients']);
        
                    foreach ($ingredients as $ingredient) {
                        echo '<li>' . $ingredient . '</li>';
                    }
                    ?>
                </ul>
            </div>



            <div class="steps-detail">
                <!-- Steps List -->
                <h2>Instruction</h2>
                <?php
                $steps = explode('*', $recipe['steps']);
                $steps_images = explode('*', $recipe['steps_image']);
        
                foreach ($steps as $index => $step) {
                    $stepParts = explode('^^', $step);
        
                 // Display the image for the current step
                echo '<div class="steps-image">';
                if (isset($steps_images[$index])) {
                echo '<img src="images/' . htmlspecialchars($steps_images[$index]) . '" alt="Step Image ' . ($index + 1) . '">';
                }
                echo '</div>';
        
                // Display the instruction for the current step
                if (count($stepParts) == 2) {
                    echo '<div class="instruction">';
                    echo '<h3>' . ($index + 1). '. ' . trim($stepParts[0]) . ':</h3>';
                    echo '<p>' . trim($stepParts[1]) . '</p>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Simmer. All Rights Reserved.</p>
    </footer>

    <script src="index.js"></script>
</body>
</html>
