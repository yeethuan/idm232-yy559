
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Recipes</title>
    <link rel="stylesheet" href="all-recipes.css">
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
                <li><a href="index.php/">Home</a></li>
                <li><a href="all-recipes.php">Recipes</a></li>
                <li><a href="help.php">Help</a></li>
            </ul>
        </nav>

        <script>
            document.getElementById("menu-icon").addEventListener("click", function() {
            const navMenu = document.getElementById("nav-menu");
            navMenu.classList.toggle("show-menu");
        });
        </script>
    </header>

    <!-- all recipes -->

    <section id="recipes" class="recipes-section">

        <h2>All Recipes</h2>   

        <div class="container">
            <?php foreach ($recipes as $recipe): ?>
                <a href="recipe-page.php?id=<?php echo $recipe['id']; ?>">
                    <div class="card">
                        <!-- Recipe Image -->
                        <img src="pics/<?php echo ($recipe['main_image']); ?>" alt="Recipe Image" class="pic">
                        <h2 class="recipe-title"><?php echo ($recipe['title']); ?></h2>
                        <p class="recipe-subtitle"><?php echo ($recipe['subtitle']); ?></p>
                    </div>
                </a>
                
            <?php endforeach; ?>
            <?php if (count($recipes) > 0): ?>

            <?php else: ?>
                <p class="error">No recipes found"<?php echo htmlspecialchars($search); ?>"</p>
            <?php endif; ?>
        </div>


        <div class="recipe-grid" id="recipe-grid">
            recipe 1
            <div class="recipe-card">
                <a href="recipe-page.php?id=<?php echo $recipe['id']; ?>">
                    <img src="pics/<?php echo ($recipe['main_image']); ?>" alt="Recipe Image" class="pic">
                    <h2 class="recipe-title"><?php echo ($recipe['title']); ?></h2>
                    <p class="recipe-subtitle"><?php echo ($recipe['subtitle']); ?></p>
                </a>
            </div>
            <!-- recipe 2 -->
            <!-- <div class="recipe-card">
                <a href="https://idm-232-yy559.netlify.app/recipe-1">
                    <img src="media/steak-fries.jpg" alt="Recipe Image">
                </a>
                <a href="https://idm-232-yy559.netlify.app/recipe-1">
                    <h3>Recipe Header 2</h3>
                </a>
                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.</p>
            </div> -->
            <!-- recipe 3 -->
            <!-- <div class="recipe-card">
                <a href="https://idm-232-yy559.netlify.app/recipe-1">
                    <img src="media/steak-fries.jpg" alt="Recipe Image">
                </a>
                <a href="https://idm-232-yy559.netlify.app/recipe-1">
                    <h3>Recipe Header 3</h3>
                </a>
                <p>Cras et neque vel nunc vehicula efficitur.</p>
            </div> -->
        </div>



        <!-- CHAT GPT HELP START -->
        <div class="container">
        <?php if (!empty($recipes)): ?>
            <?php foreach ($recipes as $recipe): ?>
                <a href="recipe-page.php?id=<?php echo $recipe['id']; ?>">
                    <div class="card">
                        <!-- Recipe Image -->
                        <img src="pics/<?php echo htmlspecialchars($recipe['main_image']); ?>" alt="Recipe Image" class="pic">
                        <h2 class="recipe-title"><?php echo htmlspecialchars($recipe['title']); ?></h2>
                        <p class="recipe-subtitle"><?php echo htmlspecialchars($recipe['subtitle']); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="error">No recipes found<?php echo htmlspecialchars($search ?? ''); ?></p>
        <?php endif; ?>
    </div>
    <!-- CHAT GPT END -->

    </section>


    <!-- footer -->
    <footer>
        <p>&copy; 2024 Simmer. All Rights Reserved.</p>
    </footer>

    <script src="index.js"></script>
</body>
</html>