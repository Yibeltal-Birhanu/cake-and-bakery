<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Light Cakes Bakery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="home_styel.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            
            <div class="logo-text">Light<span>Cakes</span></div>
        </div>
        
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="product.html">Products</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </div>
        
        <div class="auth-buttons">
            <button <a href="#" class="btn login-btn" onclick="openModal('loginModal')">Login</a></button>
            <button <a href="#" class="btn signup-btn" onclick="openModal('signupModal')">Signup</a></button>
           
        </div>
        <div id="overlay" class="overlay"></div>

        <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="closeBtn" onclick="closeModal('loginModal')">&times;</span>
            <h2>Login</h2>

            <input type="email" id="loginEmail" placeholder="Email" />
            <input type="password" id="loginPassword" placeholder="Password" />

            <button onclick="loginUser()">Login</button>

            <p>Don't have an account? 
            <a href="#" onclick="switchModal('loginModal','signupModal')">Signup</a>
            </p>
        </div>
        </div>

        <div id="signupModal" class="modal">
        <div class="modal-content">
            <span class="closeBtn" onclick="closeModal('signupModal')">&times;</span>
            <h2>Sign Up</h2>

            <input type="text" id="signupName" placeholder="Full Name" />
            <input type="email" id="signupEmail" placeholder="Email" />
            <input type="password" id="signupPassword" placeholder="Password" />
            <input type="password" id="confirmsignupPassword" placeholder="Confirm Password" />

            <button onclick="signupUser()">Create Account</button>

            <p>Already have an account? 
            <a href="#" onclick="switchModal('signupModal','loginModal')">Login</a>
            </p>
        </div>
        </div>


        <div class="hamburger">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
    
   <section class="hero">
        <div class="hero-content">
            <h1>Delicious <span>Light Cakes</span> for Every Part Of your life</h1>
            <p>Our Cakes and Bakery is sweet like you😍</p>
            <div class="hero-buttons">
                <button class="btn btn-primary">Explore Our Cakes</button>
                <button class="btn btn-secondary">Learn More</button>
            </div>
        </div>
        <div class="hero-image">
            <div class="image-container">
                <img  class="image" src="download (19).jpg" alt="Delicious Cake">
                
            </div>
        </div>
    </section>

    <section class="cake-product">
        <h2>Cakes</h2>
        <div class="card-container">
            <div class="card">
                <img src="download (19).jpg" alt="Chocolate Cake">
                <h1>Light Chocolate </h1>
                <p class="price">250 birr</p>
                <p>Rich chocolate cake with creamy frosting and chocolate shavings.</p>
                <p><button onclick="openModal('buyModal')">BUY</button></p>

            </div>
            <div class="card">
                <img src="recette simple pour préparer un délicieux gâteau torsadé.jpg" alt="Twisted Cake">
                <h1>Twisted Delight</h1>
                <p class="price">750 birr</p>
                <p>Unique twisted design with layers of vanilla and strawberry flavors.</p>
                <p><button onclick="openModal('buyModal')">BUY</button></p>

            </div>
            <div class="card">
                <img src="download (21).jpg" alt="Berry Cake">
                <h1>Berry Blast</h1>
                <p class="price">1,199 birr</p>
                <p>Fresh mixed berries on top of a light sponge cake with cream filling.</p>
                <p><button onclick="openModal('buyModal')">BUY</button></p>

            </div>
            <div class="card">
                <img src="Classic Chocolate Cake Recipe - Easy Baking, Moist Dessert (PDF Pattern).jpg" alt="Special Cake">
                <h1>Special Celebration</h1>
                <p class="price">1000 birr</p>
                <p>Perfect for birthdays with custom decorations and flavors.</p>
                <p><button onclick="openModal('buyModal')">BUY</button></p>

            </div>
        </div>
        <button class="btn btn-secondary">See More</button>
    </section>
    
    <section class="bakery-product">
        <h2>Bakery</h2>
       <?php
// Example dynamic data (later you can replace with database data)

$products = [
    "cakes" => [
        [
            "id" => 1,
            "name" => "Chocolate with Strawbary",
            "price" => 500,
            "description" => "Rich chocolate cake with creamy frosting and chocolate shavings.",
            "image" => "Classic Chocolate Cake Recipe - Easy Baking, Moist Dessert (PDF Pattern).jpg"
        ],
        [
            "id" => 2,
            "name" => "recette simple pour",
            "price" => 1199,
            "description" => "Light and fluffy vanilla cake with buttercream frosting.",
            "image" => "recette simple pour préparer un délicieux gâteau torsadé.jpg"
        ],
        [
            "id" => 3,
            "name" => "Honey cake",
            "price" => 2500,
            "description" => "Classic honey cake with cream frosting.",
            "image" => "download (21).jpg"
        ],
        [
            "id" => 4,
            "name" => "Cozy Husband Birthday Cake",
            "price" => 1500,
            "description" => "Cozy Husband Birthday Cake Ideas for a Warm and Loving Celebration.",
            "image" => "Cozy Husband Birthday Cake Ideas for a Warm and Loving Celebration.jpg"
        ],
        [
            "id" => 5,
            "name" => "Orange Chesses Cake",
            "price" => 370,
            "description" => "Orange Chesses Cake sponge cake with fresh orange.",
            "image" => "Orange Chesses Cake.jpg"
        ],
        [
            "id" => 6,
            "name" => "Honeycomb",
            "price" => 299,
            "description" => "Honeycomb Cheesecake swetty cakes.",
            "image" => "Honeycomb Cheesecake_ Indulge in This Easy Recipe!.jpg"
        ]
    ],

    "bakery" => [
        [
            "id" => 7,
            "name" => "Normal",
            "price" => 250,
            "description" => "Normal breed for morning brakefast",
            "image" => "download (20).jpg"
        ],
        [
            "id" => 8,
            "name" => "Croissants",
            "price" => 300,
            "description" => "Sweet and testy suger cookies for events",
            "image" => "Fresh Croissants Food Photography _ Bakery Branding Image _ Cafe Menu Picture _ Digital Download _ Commercial Use.jpg"
        ],
        [
            "id" => 9,
            "name" => "Cinnamon Roll",
            "price" => 99,
            "description" => "Crispy and testy tosted breed",
            "image" => "Лето на вкус_ визуалы для креатива _ ViGreyArt _ Midjourney AI Art.jpg"
        ],
        [
            "id" => 10,
            "name" => "Cheese Dip",
            "price" => 89,
            "description" => "Normal slice breed for morning brakfast",
            "image" => "The Cheese Dip That Will Make You Famous.jpg"
        ],
        [
            "id" => 11,
            "name" => "Teff cookies",
            "price" => 109,
            "description" => "Sweet black Teff bakery with honey and suger",
            "image" => "Круассан с шоколадной начинкой.jpg"
        ],
        [
            "id" => 12,
            "name" => "Yeast Rolls",
            "price" => 45,
            "description" => "Soft, sweety and sponjy bakery for child",
            "image" => "Simple 6-Ingredient Yeast Rolls Recipe -.jpg"
        ]
    ]
];

?>

<div class="card-container">
    <div class="card-container">
    <?php foreach($products["bakery"] as $product): ?>
        <div class="card">
            <img src="<?php echo $product['image']; ?>" 
                 alt="<?php echo $product['name']; ?>">

            <h1><?php echo $product['name']; ?></h1>

            <p class="price"><?php echo $product['price']; ?> birr</p>

            <p><?php echo $product['description']; ?></p>

            <p><button onclick="openModal('buyModal')">BUY</button></p>
        </div>
    <?php endforeach; ?>
</div>

</div>

        <button class="btn btn-secondary">See More</button>
    </section>

  <!-- ===== CHECKOUT / BUY POPUP ===== -->
<div id="buyModal" class="modal">
  <div class="modal-content">
    <span class="closeBtn" onclick="closeModal('buyModal')">&times;</span>
    <h2>Complete Your Order</h2>

    <!-- Customer Info -->
    <input type="text" id="customerName" placeholder="Full Name" required />
    <input type="text" id="customerPhone" placeholder="Phone Number" required />
    <input type="text" id="customerAddress" placeholder="Delivery Address" required />
    <input type="text" id="customerCity" placeholder="City / Zone" required />

    <!-- Order Info -->
    <input type="hidden" id="orderItem" value="" />
    <input type="hidden" id="orderPrice" value="" />
    <input type="number" id="orderQuantity" placeholder="Quantity" min="1" value="1" required />

    <!-- Payment Method -->
    <!-- <label for="paymentMethod">Payment Method</label> -->
    <select id="paymentMethod" onchange="onPaymentMethodChange()" required>
      <option value="">--Select payment method--</option>
      <option value="telebirr">Telebirr (Mobile Money)</option>
      <option value="cbe_birr">CBE Birr</option>
      <option value="bank_transfer">Bank Transfer</option>
      <option value="cod">Cash on Delivery (COD)</option>
    </select>

    <!-- Payment Instructions -->
    <div id="paymentInfo" style="display: none; margin-top: 10px;">
      <p id="paymentInstructions"></p>
      <input type="text" id="paymentRef" placeholder="Payment Reference (if any)" style="display: none;" />
    </div>

    <button onclick="submitOrder()" class="btn">Place Order</button>
  </div>
</div>



    <section class="About">
        <div class="about-text">
            <h2>About Light Cakes Bakery</h2>
            <br>
            <p>Welcome to LightCakes and Bakery where every day is fresh and delicious. We bake soft cakes, pastries, 
                and breads using quality ingredients and lots of love Our goal is simple bring you testy treats that make every moment special.
            Whether you're celebrating,relaxing, or sharing with friends, we're here to add sweetness to your day.</p>
        </div>
        <div class="about-image">
           <img src="download (21).jpg" alt="Our Bakery">
        </div>
    </section>
    
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Light Cakes Bakery</h3>
                <p>We create your sweet with a love, also we believe that every moment deserves a sweet celebration </p>
              
            </div>
            <div class="footer-section">
                <h3>Quick nav</h3>
                <a href="#">Home</a>
                <a href="#">Cakes</a>
                <a href="#">Bakery</a>
                <a href="#">About Us</a>
                <a href="#">Contact</a>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p><i class="fas fa-map-marker-alt"></i>Hawassa Gorgwada Sefer</p>
                <p><i class="fas fa-phone"></i> 0909202020/ 0909212121</p>
                <p><i class="fas fa-envelope"></i> info@lightcakes.com</p>
                <p><i class="fas fa-clock"></i> Mon-Sat: 8am-10pm, Sun: 8am-11pm</p>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; IT student wolita sodo.</p>
        </div>
    </footer>

    <script src="home.js"></script>
</body>
</html>