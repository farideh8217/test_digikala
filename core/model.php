<?php
class model{
    public static $conn ='';
    public function __construct()
    {
        $database = [
            'host'=>'localhost',
            'dbname'=>'digikala',
            'user'=>'root',
            'pass'=>''
        ];
        try {
            self::$conn = new PDO("mysql:host={$database['host']};dbname={$database['dbname']}", $database['user'], $database['pass']);
        } catch (PDOException $e) {
            exit("An error happend, Error: " . $e->getMessage());
        }
    }

    public static function get_option(){
        $sql = "SELECT * FROM tbl_option";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $option_new = [];
        foreach ($result as $item) {
            $setting = $item["setting"];
            $value = $item["value"];
            $option_new[$setting] = $value;
        }
        return $option_new;
    }

    function takhfif($price,$discount)
    {
        $takhfif_koli = ($price*$discount)/100;
        $gheymat_nahaee = $price-$takhfif_koli;
        return[$takhfif_koli,$gheymat_nahaee];
    }
}