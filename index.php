<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'includes/database.php';

// Get and sanitize user input
$search = $_GET['search'] ?? ''; 

// Prepare a SQL query with a WHERE clause for filtering
if (!empty($search)) {
    $statement = $connection->prepare('SELECT * FROM recipes_test_run WHERE title LIKE ? OR ingredients LIKE ? OR protein LIKE ?');
    $searchParam = '%' . $search . '%';
    $statement->bind_param('sss', $searchParam, $searchParam, $searchParam);
} else {
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
    <title>Explore Our Recipes</title>
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
            <ul id="nav-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="help.php">Help</a></li>
            </ul>
        </nav>
    </header>


    <!-- Search Form -->
    <div class="search">
        <div class="search-bar">
            <!-- Search Form -->
            <form action="index.php" method="get" class="search-form">
                <input type="text" name="search" placeholder="Search for recipes..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>


    <!-- all recipes -->

    <section id="recipes" class="recipes-section">

        <h1>All Recipes</h1>   

        <div class="recipe-grid" id="recipe-grid">
            <?php foreach ($recipes as $recipe): ?>
                <a href="recipe-page.php?id=<?php echo $recipe['id']; ?>">
                    <div class="card">
                        <!-- Recipe Image -->
                        <img src="pics/<?php echo ($recipe['main_image']); ?>" alt="Recipe Image" class="pic">
                        <h2 class="recipe-title"><?php echo ($recipe['title']); ?></h2>
                        <p>
                            <span><i class="fa-solid fa-clock"></i> <?php echo $recipe['cook_time']; ?></span>
                        </p>
                    </div>
                </a>
                    
                <?php endforeach; ?>
                <?php if (count($recipes) > 0): ?>

                <?php else: ?>
                    <p class="error">No recipes found"<?php echo htmlspecialchars($search); ?>"</p>
                <?php endif; ?>
        </div>
        <!-- recipe grid div end -->

    </section>


    <!-- footer -->
    <footer>
        <p>&copy; 2024 Simmer. All Rights Reserved.</p>
    </footer>

    <script src="index.js"></script>
</body>
</html>