<?php
    require_once realpath('vendor/autoload.php');
    $productObject = new \TestApp\Products();

    // Delete record from the table
    if(isset($_GET['deleteProductId']) && !empty($_GET['deleteProductId'])) {
        $deleteId = $_GET['deleteProductId'];
        $productObject->deleteProducts($deleteId);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ScandiWeb Test - Product Management - Rizwan Khan</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="./web/images/favicon-32x32.png">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="./web/css/custom.css" rel="stylesheet" >
        <script src="./web/js/custom.js"></script>
    </head>
    <body>
        <div class="container">
            
            <div class="mt-3 mb-5 col-md-12">
                <div class="float-left">
                    <h2>Product List</h2>
                </div>
                <div class="float-right">
                    <button id="add-product-btn" type="button" class="btn btn-secondary" onClick="document.location.href='add-product'">ADD</button>
                    <button id="delete-product-btn" type="button" class="btn btn-secondary" onClick="confirmDelete();">MASS DELETE</button>
                </div>
            </div>
            <hr/>

            <?php $productData = $productObject->getAllProductsData(); ?>

            <div class="row">
                <?php if(count($productData) > 0): ?>
                    <?php foreach($productData as $key => $product): ?>
                        <div class="col-md-3 mt-2 mb-3">
                            <div class="p-3 product-inner">
                                <input type="checkbox" class="delete-checkbox" value="<?= $product['id']; ?>" />
                                <ul class="text-center">
                                    <li class="product-sku"><?= $product['product_sku']; ?></li>
                                    <li class="product-name"><?= $product['product_name']; ?></li>
                                    <li class="product-price"><?= number_format($product['product_price'],2); ?> $</li>
                                    <li class="product-attribute-value"><?= $productObject->getProductAttributeValueLabel($product); ?></li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="text-center col-md-12">No Products Found</div>
                <?php endif; ?>
            </div>

            <hr/>
            <div class="text-center">Scandiweb Test assignment</div>
        </div>
    </body>
</html>