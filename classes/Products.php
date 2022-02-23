<?php

namespace TestApp;

class Products extends \TestApp\ProductAbstractMethods\ProductAbstract {
    
    private $dbServername = "localhost";
    private $dbUsername   = "root";
    private $dbPassword   = "root";
    private $db_name   = "scandiweb-test";

    public  $con;

    protected $product_types = [0 => 'Size: XXX MB', 1 => 'Weight: XXX KG', 2 => 'Dimension: XXX'];

    /* constructor to initiate a database connection */
    public function __construct() {
        $this->con = new \mysqli($this->dbServername, $this->dbUsername, $this->dbPassword, $this->db_name);
        if (mysqli_connect_error()) {
            echo "Failed to connect to MySQL";
        } else {
            return $this->con;
        }
    }


    public function insertProduct($_post) {
        $productSku = $this->con->real_escape_string($_post['sku']);
        $productName = $this->con->real_escape_string($_post['name']);
        $productPrice = $this->con->real_escape_string($_post['price']);
        $productType = $this->con->real_escape_string($_post['productType']);
        $productAttributeValue = $this->con->real_escape_string($this->getProductAttributeValueFromPost($_post));

        $query = "INSERT INTO catalog_product(id,product_name,product_price,product_sku,product_type,product_attribute_value) VALUES(NULL,'$productName','$productPrice','$productSku','$productType','$productAttributeValue')";

        $sql = $this->con->query($query);

        if ($sql == true) {
            header("Location:/");
        } else {
            echo '<div style="text-align:center;">Some Issues encountered when adding new product, Please try Again.</div>';
        }
    }

    /* fetch all data from database and return as array */
    public function getAllProductsData() {
        
        $query = "SELECT * FROM catalog_product ORDER BY id Desc";
        $result = $this->con->query($query);
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    /* get product custom attribute value depend on product type */
    public function getProductAttributeValueLabel($product) {

        return str_replace('XXX', $product['product_attribute_value'], $this->product_types[$product['product_type']]);

    }

    /* get product custom attribute value depend on product type when adding a new product */
    public function getProductAttributeValueFromPost($post){

        $label = '';
        switch($post['productType']) {
            case "0";
                $label = $post['size'];
                break;

            case "1";
                $label = $post['weight'];
                break;

            case "2";
                $label = $post['height'].'x'.$post['width'].'x'.$post['length'];
                break;

            default:
                $label = 'Invalid';
                break;
                
        }
        return $label;
    }

    /* Delete products from database */
    public function deleteProducts($ids) {

        $ids = explode(',',$ids);

        if(count($ids) > 0){
            foreach($ids as $key => $id){
                $deleteQuery = "DELETE FROM catalog_product WHERE id = '$id'";
                $this->con->query($deleteQuery);
            }
            header("Location:/");
        }

    }

    /* check if sku already exists in db */
    public function checkSkuExists($sku) {

        $query = "SELECT count(1) FROM catalog_product WHERE product_sku like '".$sku."'";
        $result = $this->con->query($query);
        
        $result = $result->fetch_array();

        if($result['0'] > 0){
            echo 'exists';
            return;
        }
        echo 'not exists';
        return;
    }


}
