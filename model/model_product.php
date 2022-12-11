<?php
class model_product extends model {
    public function __construct()
    {
        parent::__construct();
    }
    function product_info($id) {
        $sql = "SELECT * FROM tbl_product WHERE id= :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $price = $result["price"];
        $discount = $result["discount"];
        $takhfif_product = $this->takhfif($price,$discount);
        $result["discount_total"] = $takhfif_product[0];
        $result["price_total"] = $takhfif_product[1];


        $time_duration = $result["time_special"];
        $option = self::get_option();
        $time_end = $option["special_time"];

        $time_result = $time_duration+$time_end;
        $result["date"] = date("F d,Y H:i:S",$time_result);
        return $result;
    }
}