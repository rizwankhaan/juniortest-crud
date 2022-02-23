<?php

    require_once realpath('vendor/autoload.php');
    $productObject = new \TestApp\Products();

    if (isset($_GET['checksku']) && !empty($_GET['checksku'])) {
        // echo $_GET['checksku']; die;
        $response = $productObject->checkSkuExists($_GET['checksku']);
        return $response;
    }
    // Delete record from the table
    if (isset($_POST['Save'])) {
        $productObject->insertProduct($_POST);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ScandiWeb Test - Add New Product</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="./web/images/favicon-32x32.png">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="./web/css/custom.css" rel="stylesheet" >
        <script src="./web/js/custom.js"></script>
    </head>
    <body>
        <div class="container">
            <form id="product_form" name="product_form1" class="form-horizontal" action="<?=$_SERVER['PHP_SELF'];?>" method="post" target="_self">
                <div class="mt-3 mb-5 col-md-12">
                    <div class="float-left">
                        <h2>Product Add</h2>
                    </div>
                    <div class="float-right">
                        <input type="submit" class="btn btn-secondary save_product" value="Save" name="Save"/>
                        <button type="button" class="btn btn-secondary" onClick="document.location.href='/'">Cancel</button>
                    </div>
                </div>
                <hr/>
                <div class="form-group row mb-3">
                    <label for="sku" class="col-sm-2 col-form-label">Sku</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter Product Sku" required onblur="checkSkuExists()" />
                    </div>
                    <label class="col-sm-4 col-form-label d-none label-success">Sku Available.</label>
                    <label class="col-sm-4 col-form-label d-none label-error">Sku Already Exists.</label>
                </div>
                <div class="form-group row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" required />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter Product Price" step="any" min="0" required />
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Type Switcher</label>
                    <div class="col-sm-3">
                        <select id="productType" class="form-control" onchange="toggleForm()" name="productType" required>
                            <option selected="true" disabled="disabled">Please Select Product Type</option>
                            <option value="0">DVD</option>
                            <option value="1">Book</option>
                            <option value="2">Furniture</option>
                        </select>
                    </div>
                </div>
                <!-- Product Type DVD -->
                <div class="product-type-dvd d-none">
                    <div class="form-group row mb-3">
                        <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="size" name="size" placeholder="Enter Size" step="any" min="0" required />
                        </div>
                    </div>
                    <label class="col-sm-4 col-form-label font-weight-bold">Please Enter Size In MB (MegaByte)</label>
                </div>
                <!-- Product Type Book -->
                <div class="product-type-book d-none">
                    <div class="form-group row mb-3">
                        <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter Size" step="any" min="0" required />
                        </div>
                    </div>
                    <label class="col-sm-4 col-form-label font-weight-bold">Please Enter Weight In KG</label>
                </div>
                <!-- Product Type Furniture -->
                <div class="product-type-furniture d-none">
                    <div class="form-group row mb-3">
                        <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="height" name="height" placeholder="Enter Height In CM" step="any" min="0" required />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="width" name="width" placeholder="Enter Width In CM" step="any" min="0" required />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="length" name="length" placeholder="Enter Length In CM" step="any" min="0" required />
                        </div>
                    </div>
                    <label class="col-sm-4 col-form-label font-weight-bold">Please provide dimensions in HxWxL format</label>
                </div>
            </form>
            <hr/>
            <div class="text-center">Scandiweb Test assignment</div>
        </div>
    </body>
</html>