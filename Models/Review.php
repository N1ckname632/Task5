<?php

namespace Models;

use Models\Model;

class Review extends Model{
    protected $table = 'reviews';
    public $name;
    public $address;
    public $comment;
    
    public function getName(): string{
        return $this->name;
    }

    public function setName(string $name): self{
        $this->name = $name;
        return $this;
    }

    public function getAddress(): string{
        return $this->address;
    }

    public function setAddress(string $address): self{
        $this->address = $address;
        return $this;
    }

    public function getComment(): string{
        return $this->comment;
    }

    public function setComment(string $comment): self{
        $this->comment = $comment;
        return $this;
    }
}
?>