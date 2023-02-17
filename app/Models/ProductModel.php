<?php
class ProductModel extends Model {  
        function Paging () {
            $records_page_size = 3;
            $stmt = $this->connection->query();
            $total_results = $stmt -> fetchColum();
            $tota_pages = ceil($total_results/$records_page_size);
            //current page
            $page = isset($_GET['page'])? $_GET['page']:1;
            $starting_limit = ($page-1) * $records_page_size;
        }
}

?>