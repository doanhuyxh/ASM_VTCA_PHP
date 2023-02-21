<?php
class ProductModel extends Model {  

    public function GetAllProduct () {
        $list = array();

        $stmt =  $this->connection->prepare("SELECT * FROM `product` WHERE canceled = false;");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        foreach($stmt->fetchAll() as $row) {
            array_push($list, (object)[
                'id' => $row['id'],
                'product_code' => $row['product-code'],
                'product_name' => $row['product-name'],
                'product_category' => $row['price'],
                'product_price' => $row['Category'],
            ]);
        }
        return $list;
    }

    public function Create($code, $name, $price, $cate) {
        $stmt = $this->connection->prepare('INSERT INTO product (id, product-code, product-name, price, Category, canceled) VALUES (NULL, ?, ?, ?, ?, "0");');
        $stmt->execute([$code, $name, $price, $cate]);
    }

    public function Edit($code, $name, $price, $cate, $id) {
        $stmt = $this->connection->prepare('UPDATE product SET product-code = ?, product-name = ?, price = ?, Category = ? WHERE id = ?;');
        $stmt->execute([$code, $name, $price, $cate, $id]);
    }

    public function Delete($id) {
        $stmt = $this->connection->prepare('UPDATE product SET canceled = 1 Where id=?');
        $stmt->execute([$id]);
    }
}

?>