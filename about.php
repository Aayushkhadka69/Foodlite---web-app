<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="about">

   <div class="row">

      <div class="box">
         <img src="project images/choose.jpg" alt="">
         <h3>why choose us?</h3>
         <p>We guarantee freshness by sourcing from trusted suppliers, offering a wide variety of local and international products to suit every taste. Enjoy convenient shopping from home with fast delivery and secure payments, all at affordable prices, making premium quality food accessible to everyone.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

      <div class="box">
         <img src="project images/provide.png" alt="">
         <h3>what we provide?</h3>
         <p>At foodlite, we provide a wide range of high-quality food products, including fresh fruits and vegetables, premium cuts of meats, sustainably sourced seafood, artisan bakery items, and delicious prepared meals like momo, burgers, and pizzas. All our offerings are carefully sourced and delivered fresh to your doorstep, ensuring convenience, quality, and great taste with every order.</p>
         <a href="shop.php" class="btn">our shop</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">clients reivews</h1>

   <div class="box-container">

      <div class="box">
         <img src="project images/images.jpeg" alt="">
         <p>I've been ordering from foodlite for a few months now, and I'm always impressed with the quality of the products. The fruits and vegetables are fresh, the meats are top-notch, and the delivery is always on time. This store has made my weekly grocery shopping so much easier!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Rajesh Hamal</h3>
      </div>

      <div class="box">
         <img src="project images/salt bae.jpg" alt="">
         <p>As someone who loves to cook, I’m thrilled with the variety foodlite offers. Whether I'm looking for specialty ingredients or everyday essentials, they have it all. The website is easy to navigate, and I love the recipe suggestions that come with my orders. Highly recommend!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Salt Bae</h3>
      </div>

      <div class="box">
         <img src="project images/nikhil upreti.jpg" alt="">
         <p>From the moment I placed my first order, I knew I found my go-to food store. The customer service is outstanding – they promptly answer any queries I have, and the delivery is always reliable. The quality of the food is superb, and I can trust that I’m getting the best products available.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Nikhil Upreti</h3>
      </div>

      <div class="box">
         <img src="project images/Rekha-Thapa.jpg" alt="">
         <p>foodlite has made my life so much easier. I can do my grocery shopping from the comfort of my home, and the fast delivery means I never have to worry about running out of essentials. The ready-to-eat meals are perfect for my busy schedule, and they taste amazing!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Rekha Thapa</h3>
      </div>

      <div class="box">
         <img src="project images/dhiraj shahi.jpg" alt="">
         <p>I’ve tried several online grocery stores, but foodlite stands out for its combination of quality and affordability. The prices are fair, and the quality is excellent. I love the discounts and special offers – they really help me stay within my budget without compromising on quality.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Dhiraj Shahi</h3>
      </div>

      <div class="box">
         <img src=" project images/sandip.jpg" alt="">
         <p>Switching to foodlite has transformed how I approach my diet. With their wide selection of organic and wholesome foods, I can easily find nutritious options for every meal.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Sandip chettry</h3>
      </div>

   </div>

</section>









<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>