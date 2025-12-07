<?php
require 'dbconn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Display</title>
    <style>
        /* Main container */
        .products-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            padding: 20px;
            justify-content: center;
        }
        
        /* Product card styling */
        .product-card {
            width: 300px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        
        /* Product image */
        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        /* Product info */
        .product-info {
            padding: 20px;
        }
        
        .product-name {
            font-size: 1.3em;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            font-family: 'Arial', sans-serif;
        }
        
        .product-price {
            font-size: 1.4em;
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .product-description {
            color: #666;
            font-size: 0.95em;
            line-height: 1.5;
            margin-bottom: 15px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* Category headers */
        .category-header {
            text-align: center;
            font-size: 2em;
            color: #2c3e50;
            margin: 40px 0 20px;
            font-family: 'Georgia', serif;
            position: relative;
        }
        
        .category-header::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: #e74c3c;
            margin: 10px auto;
        }
        
        /* Grid layout for multiple products */
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .category-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
                padding: 15px;
            }
            
            .product-card {
                width: 100%;
            }
            
            .category-header {
                font-size: 1.7em;
            }
        }
        
        @media (max-width: 480px) {
            .category-grid {
                grid-template-columns: 1fr;
            }
            
            .category-header {
                font-size: 1.5em;
            }
        }
        
        /* Badge for category */
        .category-badge {
            background: #3498db;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8em;
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 1;
        }
        
        /* Add to cart button style */
        .add-to-cart {
            background: #27ae60;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            width: 100%;
            transition: background 0.3s ease;
        }
        
        .add-to-cart:hover {
            background: #219653;
        }
    </style>
</head>
<body>
    <!-- Cakes Section -->
    <h2 class="category-header">Our Cakes</h2>
    <div class="category-grid">
        <?php
        $sql = "SELECT * FROM products where item_category='Cake'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $product_name = $row['name'];
            $product_price = $row['price'];
            $description = $row['description'];
            $image_path = $row['image'];
        ?>
        <div class="product-card">
            <div class="category-badge">Cake</div>
            <img src="<?php echo $image_path; ?>" alt="<?php echo $product_name; ?>" class="product-image">
            <div class="product-info">
                <h3 class="product-name"><?php echo $product_name; ?></h3>
                <div class="product-price">$<?php echo number_format($product_price, 2); ?></div>
                <p class="product-description"><?php echo $description; ?></p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>
        <?php } ?>
    </div>
    
    <!-- Bakery Section -->
    <h2 class="category-header">Bakery Items</h2>
    <div class="category-grid">
        <?php
        $sql = "SELECT * FROM products where item_category='bakery'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $product_name = $row['name'];
            $product_price = $row['price'];
            $description = $row['description'];
            $image_path = $row['image'];
        ?>
        <div class="product-card">
            <div class="category-badge">Bakery</div>
            <img src="<?php echo $image_path; ?>" alt="<?php echo $product_name; ?>" class="product-image">
            <div class="product-info">
                <h3 class="product-name"><?php echo $product_name; ?></h3>
                <div class="product-price">$<?php echo number_format($product_price, 2); ?></div>
                <p class="product-description"><?php echo $description; ?></p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>