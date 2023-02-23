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
                'product_code' => $row['product_code'],
                'product_name' => $row['product_name'],
                'product_category' => $row['Category'],
                'product_price' => $row['price'],
            ]);
        }
        $list = array_reverse($list, true);
        return $list;
    }

    public function Create($code, $name, $price, $cate) {
        $stmt = $this->connection->prepare('INSERT INTO product (id, product_code, product_name, price, Category, canceled) VALUES (NULL, ?, ?, ?, ?, "0");');  
        $stmt->execute([$code, $name, $price, $cate]);
        
    }

    public function Edit($code, $name, $price, $cate, $id) {
        $stmt = $this->connection->prepare('UPDATE product SET product_code = ?, product_name = ?, price = ?, Category = ? WHERE id = ?;');
        $stmt->execute([$code, $name, $price, $cate, $id]);
    }

    public function Delete($id) {
        $stmt = $this->connection->prepare('UPDATE product SET canceled = 1 Where id=?');
        $stmt->execute([$id]);
    }

    public function GetById($id) {
        $stmt =  $this->connection->prepare("SELECT * FROM `product` WHERE canceled = false AND id = ?;");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return [$result['id'], $result['product_code'],$result['product_name'],$result['Category'],$result['price'],];
    }
}

?>