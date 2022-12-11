<?php
class model_index extends model {
    public function __construct()
    {
        parent::__construct();
    }
    function get_slider1(){
        $sql = "SELECT * FROM tbl_slider1";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function get_slider2(){
        $sql = "SELECT * FROM tbl_product where special=1";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $first_row = $result[0];
        $time_duration = $first_row["time_special"];

        $sql = "SELECT * FROM tbl_option where setting='special_time'";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $result2 = $stmt->fetch(PDO::FETCH_ASSOC);
        $time_end = $result["value"];

        $time_result = $time_duration+$time_end;
        $date = date("F d,Y H:i:S",$time_result);
        return [$result,$date];
    }
}