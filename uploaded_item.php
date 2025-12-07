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
        /* Table styling */
        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px 0;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background: white;
        }
        
        .products-table th {
            background: #2c3e50;
            color: white;
            padding: 18px 15px;
            text-align: left;
            font-size: 1.1em;
            font-weight: 600;
            font-family: 'Arial', sans-serif;
            border-bottom: 3px solid #e74c3c;
        }
        
        .products-table td {
            padding: 16px 15px;
            border-bottom: 1px solid #e0e0e0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .products-table tr:hover {
            background: #f9f9f9;
        }
        
        .products-table tr:last-child td {
            border-bottom: none;
        }
        
        /* Category headers */
        .category-header {
            text-align: center;
            font-size: 1.8em;
            color: #2c3e50;
            margin: 40px 0 10px;
            font-family: 'Georgia', serif;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border-left: 5px solid #3498db;
        }
        
        /* Image in table */
        .table-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            border: 2px solid #ddd;
            transition: transform 0.3s ease;
        }
        
        .table-image:hover {
            transform: scale(1.1);
        }
        
        /* Price styling */
        .table-price {
            color: #e74c3c;
            font-weight: bold;
            font-size: 1.1em;
        }
        
        /* Product name */
        .table-name {
            font-weight: 600;
            color: #333;
            font-size: 1.05em;
        }
        
        /* Description */
        .table-description {
            color: #555;
            font-size: 0.95em;
            line-height: 1.4;
            max-width: 300px;
        }
        
        /* Action buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.9em;
            transition: all 0.3s ease;
        }
        
        .btn-view {
            background: #3498db;
            color: white;
        }
        
        .btn-view:hover {
            background: #2980b9;
        }
        
        .btn-edit {
            background: #f39c12;
            color: white;
        }
        
        .btn-edit:hover {
            background: #d68910;
        }
        
        .btn-delete {
            background: #e74c3c;
            color: white;
        }
        
        .btn-delete:hover {
            background: #c0392b;
        }
        
        /* Container for tables */
        .table-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Responsive design for tables */
        @media (max-width: 992px) {
            .products-table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
            
            .table-description {
                max-width: 200px;
                white-space: normal;
            }
        }
        
        @media (max-width: 768px) {
            .products-table th,
            .products-table td {
                padding: 12px 10px;
                font-size: 0.95em;
            }
            
            .table-image {
                width: 60px;
                height: 60px;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 5px;
            }
            
            .btn {
                padding: 6px 10px;
                font-size: 0.85em;
            }
        }
        
        @media (max-width: 480px) {
            .category-header {
                font-size: 1.5em;
                padding: 12px;
            }
            
            .table-container {
                padding: 0 10px;
            }
        }
        
        /* Status indicators */
        .status-in-stock {
            color: #27ae60;
            font-weight: bold;
            padding: 5px 10px;
            background: #d5f4e6;
            border-radius: 20px;
            font-size: 0.85em;
            display: inline-block;
        }
        
        .status-low-stock {
            color: #f39c12;
            font-weight: bold;
            padding: 5px 10px;
            background: #fef5e7;
            border-radius: 20px;
            font-size: 0.85em;
            display: inline-block;
        }
        
        /* No products message */
        .no-products {
            text-align: center;
            padding: 40px;
            color: #7f8c8d;
            font-size: 1.1em;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <!-- Cakes Section -->
        <h2 class="category-header">Our Cakes</h2>
        <table class="products-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM products where item_category='Cake'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $product_name = $row['name'];
                        $product_price = $row['price'];
                        $description = $row['description'];
                        $image_path = $row['image'];
                ?>
                <tr>
                    <td><img src="<?php echo $image_path; ?>" alt="<?php echo $product_name; ?>" class="table-image"></td>
                    <td><span class="table-name"><?php echo $product_name; ?></span></td>
                    <td><span class="table-price">$<?php echo number_format($product_price, 2); ?></span></td>
                    <td><span class="table-description"><?php echo $description; ?></span></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-edit">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="5" class="no-products">No cakes found in the database.</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <!-- Bakery Section -->
        <h2 class="category-header">Bakery Items</h2>
        <table class="products-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM products where item_category='bakery'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $product_name = $row['name'];
                        $product_price = $row['price'];
                        $description = $row['description'];
                        $image_path = $row['image'];
                ?>
                <tr>
                    <td><img src="<?php echo $image_path; ?>" alt="<?php echo $product_name; ?>" class="table-image"></td>
                    <td><span class="table-name"><?php echo $product_name; ?></span></td>
                    <td><span class="table-price">$<?php echo number_format($product_price, 2); ?></span></td>
                    <td><span class="table-description"><?php echo $description; ?></span></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-view">View</button>
                            <button class="btn btn-edit">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="5" class="no-products">No bakery items found in the database.</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>