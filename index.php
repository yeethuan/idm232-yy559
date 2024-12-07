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


    <!-- Explore Recipes -->
    <section id="hero">
        <div class="hero-content">
            <h2>Discover Delicious Recipes</h2>
            <p>Your journey to better cooking starts here!</p>
            <div class="search-container">
                <input type="text" id="search-bar" placeholder="Search recipes..." onkeyup="searchRecipes()">
            </div>
            <a href="all-recipes.php" class="btn">All Recipes</a>
        </div>
    </section>


    <!-- Trending Recipes -->
    <section id="recipes" class="recipes-section">
        <h2>Trending Recipes</h2>   
        <div class="recipe-grid" id="recipe-grid">
            <div class="recipe-card">
                <a href="https://idm-232-yy559.netlify.app/recipe-1">
                    <img src="media/steak-fries.jpg" alt="Recipe Image">
                </a>
                <a href="https://idm-232-yy559.netlify.app/recipe-1">
                    <h3>Recipe Header 1</h3>
                </a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="recipe-card">
                <a href="https://idm-232-yy559.netlify.app/recipe-1">
                    <img src="media/steak-fries.jpg" alt="Recipe Image">
                </a>
                <a href="https://idm-232-yy559.netlify.app/recipe-1">
                    <h3>Recipe Header 1</h3>
                </a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="recipe-card">
                <a href="https://idm-232-yy559.netlify.app/recipe-1">
                    <img src="media/steak-fries.jpg" alt="Recipe Image">
                </a>
                <a href="https://idm-232-yy559.netlify.app/recipe-1">
                    <h3>Recipe Header 1</h3>
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

    <script src="index.js"></script>
</body>
</html>