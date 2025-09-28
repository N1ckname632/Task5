<?php

namespace Models;

use Exception;
use Cfg\Config;
abstract class Model extends Config{
    private const DIFFERENT_PROPERTY = [
        'table' => null,
        'connect' => null,
        'username' => null,
        'password' => null,
        'host' => null,
        'dbname' => null,
        'id' => null,
    ];

    protected $connect;
    protected $table = '';
    public $id = 0;

    public function __construct(){
        $this->connect = mysqli_connect($this->host,$this->username,$this->password,$this->dbname);

        if(!$this->connect){
            die("Connection fail");
        }

        mysqli_set_charset($this->connect, "utf8");
    }
    
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function findAll(): array{
        $select = "SELECT * FROM `". $this->table . "`";

        $result = mysqli_query($this->connect, $select);

        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $rows;
    }

    public function delete(): void{
        
        $delete = "DELETE FROM `" .$this->table . "` where `id` = '" . $this->getId() . "'";
        
        mysqli_query($this->connect,$delete);
    }

    public function update(): void
    {
        $properties = $this->getProperties();

        if($properties){
            $update = "UPDATE `" . $this->table . "` SET" . implode(', ', $properties) . "WHERE `id` = '" . $this->getId() . "'";

            mysqli_query($this->connect, $update);
        }
    }

    public function findOne(string $id): array
    {
        $select = "SELECT * FROM `" . $this->table . "` where id = '" . $id . "'";

        $result = mysqli_query($this->connect, $select);

        return mysqli_fetch_assoc($result);
    }

    public function insert(): void{
        $properties = $this->getProperties();

        $insert = "INSERT INTO `" . $this->table . "` SET" . implode(', ', $properties);

        mysqli_query($this->connect, $insert);
    }

    private function getProperties(): array{
        $properties_diff = array_diff_key(get_object_vars($this), self::DIFFERENT_PROPERTY);

        $properties = [];

        foreach($properties_diff as $key => $value){
            $properties[] = "`" . $key . "` = '" . $value . "'";
        }

        return $properties;
    }
}
?>