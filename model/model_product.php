<?php
class model_product extends model {
    public function __construct()
    {
        parent::__construct();
    }
    function product_info($id) {
        $sql = "SELECT * FROM tbl_product WHERE id=:id";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}