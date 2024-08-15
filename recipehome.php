<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['save_to_favorites'])) {

    $recipe_id = $_POST['recipe_id'];
    $recipe_id = filter_var($recipe_id, FILTER_SANITIZE_STRING);
    $recipe_name = $_POST['recipe_name'];
    $recipe_name = filter_var($recipe_name, FILTER_SANITIZE_STRING);
    $recipe_image = $_POST['recipe_image'];
    $recipe_image = filter_var($recipe_image, FILTER_SANITIZE_STRING);

    $check_favorites = $conn->prepare("SELECT * FROM `favorites` WHERE name = ? AND user_id = ?");
    $check_favorites->execute([$recipe_name, $user_id]);

    if ($check_favorites->rowCount() > 0) {
        $message[] = 'already saved to favorites!';
    } else {
        $insert_favorites = $conn->prepare("INSERT INTO `favorites`(user_id, recipe_id, name, image) VALUES(?,?,?,?)");
        $insert_favorites->execute([$user_id, $recipe_id, $recipe_name, $recipe_image]);
        $message[] = 'saved to favorites!';
    }

}

if (isset($_POST['add_to_grocery_list'])) {

    $recipe_id = $_POST['recipe_id'];
    $recipe_id = filter_var($recipe_id, FILTER_SANITIZE_STRING);
    $recipe_name = $_POST['recipe_name'];
    $recipe_name = filter_var($recipe_name, FILTER_SANITIZE_STRING);
    $recipe_image = $_POST['recipe_image'];
    $recipe_image = filter_var($recipe_image, FILTER_SANITIZE_STRING);
    $recipe_qty = $_POST['recipe_qty'];
    $recipe_qty = filter_var($recipe_qty, FILTER_SANITIZE_STRING);

    $check_grocery_list = $conn->prepare("SELECT * FROM `grocery_list` WHERE name = ? AND user_id = ?");
    $check_grocery_list->execute([$recipe_name, $user_id]);

    if ($check_grocery_list->rowCount() > 0) {
        $message[] = 'already added to grocery list!';
    } else {
        $insert_grocery_list = $conn->prepare("INSERT INTO `grocery_list`(user_id, recipe_id, name, quantity, image) VALUES(?,?,?,?,?)");
        $insert_grocery_list->execute([$user_id, $recipe_id, $recipe_name, $recipe_qty, $recipe_image]);
        $message[] = 'added to grocery list!';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Sharing Platform</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="home-bg">

    <section class="home">

        <div class="content">
            <span>Discover New Recipes Every Day</span>
            <h3>Explore Delicious Recipes from Around the World</h3>
            <p>we celebrate the art of cooking by bringing together food enthusiasts from around the world. Whether you're a seasoned chef or a home cook, our platform is designed to inspire and connect you through a vibrant community of recipe creators and food lovers.</p>
            <a href="about.php" class="btn">About Us</a>
        </div>

    </section>

</div>

<section class="home-category">

    <h1 class="title">Browse by Category</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/category-breakfast.png" alt="">
            <h3>Breakfast</h3>
            <p>Start your day right with a variety of breakfast recipes, from quick and nutritious smoothies to indulgent pancakes and savory omelets. Find new ways to enjoy your morning meal and share your favorite breakfast creations with our community.</p>
            <a href="category.php?category=breakfast" class="btn">View Recipes</a>
        </div>

        <div class="box">
            <img src="images/category-lunch.png" alt="">
            <h3>Lunch</h3>
            <p>Elevate your midday meal with our diverse lunch recipes, including fresh salads, hearty sandwiches, and flavorful bowls. Perfect for meal prep or a quick lunch break, our recipes cater to every taste and dietary need.</p>
            <a href="category.php?category=lunch" class="btn">View Recipes</a>
        </div>

        <div class="box">
            <img src="images/category-dinner.png" alt="">
            <h3>Dinner</h3>
            <p>Unwind with a selection of dinner recipes that range from comforting classics to gourmet dishes. Whether you’re cooking for family or hosting friends, discover recipes that make every dinner a memorable occasion.</p>
            <a href="category.php?category=dinner" class="btn">View Recipes</a>
        </div>

        <div class="box">
            <img src="images/category-dessert.png" alt="">
            <h3>Dessert</h3>
            <p>End your meals on a sweet note with our delightful dessert recipes. Explore indulgent cakes, creamy pies, and refreshing fruit-based treats that add a touch of sweetness to any occasion.</p>
            <a href="category.php?category=dessert" class="btn">View Recipes</a>
        </div>

    </div>

</section>

<section class="recipes">

    <h1 class="title">Latest Recipes</h1>

    <div class="box-container">

    <?php
        $select_recipes = $conn->prepare("SELECT * FROM `recipes` LIMIT 6");
        $select_recipes->execute();
        if ($select_recipes->rowCount() > 0) {
            while ($fetch_recipes = $select_recipes->fetch(PDO::FETCH_ASSOC)) { 
    ?>
    <form action="" class="box" method="POST">
        <div class="recipe-name"><?= $fetch_recipes['name']; ?></div>
        <a href="view_recipe.php?recipe_id=<?= $fetch_recipes['id']; ?>" class="fas fa-eye"></a>
        <img src="uploaded_img/<?= $fetch_recipes['image']; ?>" alt="">
        <input type="hidden" name="recipe_id" value="<?= $fetch_recipes['id']; ?>">
        <input type="hidden" name="recipe_name" value="<?= $fetch_recipes['name']; ?>">
        <input type="hidden" name="recipe_image" value="<?= $fetch_recipes['image']; ?>">
        <input type="number" min="1" value="1" name="recipe_qty" class="qty">
        <input type="submit" value="save to favorites" class="option-btn" name="save_to_favorites">
        <input type="submit" value="add to grocery list" class="btn" name="add_to_grocery_list">
    </form>
    <?php
        }
    } else {
        echo '<p class="empty">No recipes added yet!</p>';
    }
    ?>

    </div>

</section>

</body>
</html>