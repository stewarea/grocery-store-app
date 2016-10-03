<?php
// ./vendor/bin/phpunit tests
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Product.php";

    $server = 'mysql:host=localhost;dbname=shopper_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class ProductTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown(){
            Product::deleteAll();
        }

        function testSetName()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = 1;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product -> setName("granny smith");

            $result = $test_product->getName();

            $this->assertEquals("Granny Smith", $result);
        }

        function testSetPrice()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = 1;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product -> setPrice(1.89);

            $result = $test_product->getPrice();

            $this->assertEquals(1.89, $result);
        }

        function testSetPurchaseQuantity()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = 1;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product -> setPurchaseQuantity(3);

            $result = $test_product->getPurchaseQuantity();

            $this->assertEquals(3, $result);
        }

        function testSetInventory()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = 1;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product -> setInventory(4);

            $result = $test_product->getInventory();

            $this->assertEquals(4, $result);
        }

        function testSetPhoto()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = 1;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product -> setPhoto("apple.jpeg");

            $result = $test_product->getPhoto();

            $this->assertEquals("apple.jpeg", $result);
        }

        function testGetId()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = 1;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);

            $result = $test_product->getId();

            $this->assertEquals(1, $result);
        }

        function testSave()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = null;
            $test_product= new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product->save();

            $result = Product::getAll();

            $this->assertEquals($test_product, $result[0]);
        }

        function testGetAll()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = null;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product->save();

            $test_name2 = "lettuce";
            $test_price2 = .75;
            $test_purchase_quantity2 = 1;
            $test_inventory2 = 5;
            $test_photo2 = "";
            $test_id2 = null;
            $test_product2 = new Product($test_name2, $test_price2, $test_purchase_quantity2, $test_inventory2, $test_photo2, $test_id2);
            $test_product2->save();

            $result = Product::getAll();

            $this->assertEquals([$test_product, $test_product2], $result);
        }

        function testUpdateName()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = null;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product->save();

            $new_test_name = "Granny Smith";
            $new_test_price = 1.25;
            $new_test_purchase_quantity = 1;
            $new_test_inventory = 3;
            $new_test_photo = "apple.jpeg";

            $test_product -> updateProduct($new_test_name, $new_test_price, $new_test_purchase_quantity, $new_test_inventory, $new_test_photo);

            $this->assertEquals("Granny Smith", $test_product->getName());
        }

        function testUpdatePrice()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = null;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product->save();

            $new_test_name = "Granny Smith";
            $new_test_price = 1.25;
            $new_test_purchase_quantity = 1;
            $new_test_inventory = 3;
            $new_test_photo = "apple.jpeg";

            $test_product -> updateProduct($new_test_name, $new_test_price, $new_test_purchase_quantity, $new_test_inventory, $new_test_photo);

            $this->assertEquals(1.25, $test_product->getPrice());
        }

        function testUpdatePurchaseQuantity()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = null;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product->save();

            $new_test_name = "Granny Smith";
            $new_test_price = 1.25;
            $new_test_purchase_quantity = 1;
            $new_test_inventory = 3;
            $new_test_photo = "apple.jpeg";

            $test_product -> updateProduct($new_test_name, $new_test_price, $new_test_purchase_quantity, $new_test_inventory, $new_test_photo);

            $this->assertEquals(1, $test_product->getPurchaseQuantity());
        }

        function testUpdateInventory()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = null;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product->save();

            $new_test_name = "Granny Smith";
            $new_test_price = 1.25;
            $new_test_purchase_quantity = 1;
            $new_test_inventory = 3;
            $new_test_photo = "apple.jpeg";

            $test_product -> updateProduct($new_test_name, $new_test_price, $new_test_purchase_quantity, $new_test_inventory, $new_test_photo);

            $this->assertEquals(3, $test_product->getInventory());
        }

        function testUpdatePhoto()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = null;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product->save();

            $new_test_name = "Granny Smith";
            $new_test_price = 1.25;
            $new_test_purchase_quantity = 1;
            $new_test_inventory = 3;
            $new_test_photo = "apple.jpeg";

            $test_product -> updateProduct($new_test_name, $new_test_price, $new_test_purchase_quantity, $new_test_inventory, $new_test_photo);

            $this->assertEquals("apple.jpeg", $test_product->getPhoto());
        }

        function testDeleteAll()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = null;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product->save();

            $test_name2 = "lettuce";
            $test_price2 = .75;
            $test_purchase_quantity2 = 1;
            $test_inventory2 = 5;
            $test_photo2 = "";
            $test_id2 = null;
            $test_product2 = new Product($test_name2, $test_price2, $test_purchase_quantity2, $test_inventory2, $test_photo2, $test_id2);
            $test_product2->save();

            Product::deleteAll();
            $result = Product::getAll();

            $this->assertEquals([], $result);
        }

        function testFind()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 2;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = null;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product->save();

            $test_name2 = "lettuce";
            $test_price2 = .75;
            $test_purchase_quantity2 = 1;
            $test_inventory2 = 5;
            $test_photo2 = "";
            $test_id2 = null;
            $test_product2 = new Product($test_name2, $test_price2, $test_purchase_quantity2, $test_inventory2, $test_photo2, $test_id2);
            $test_product2->save();

            $result = Product::find($test_product2->getId());

            $this->assertEquals($test_product2, $result);
        }

        function testInStock()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 3;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = null;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product->save();

            $result = $test_product->inStock($test_purchase_quantity);

            $this->assertEquals(true, $result);
        }

        function testCalculateProductPrice()
        {
            $test_name = "apple";
            $test_price = 1.00;
            $test_purchase_quantity = 3;
            $test_inventory = 5;
            $test_photo = "";
            $test_id = null;
            $test_product = new Product($test_name, $test_price, $test_purchase_quantity, $test_inventory, $test_photo, $test_id);
            $test_product->save();

            $result = $test_product->calculateProductPrice($test_purchase_quantity);

            $this->assertEquals(3.00, $result);
        }
    }
?>