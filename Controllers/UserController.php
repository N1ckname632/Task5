<?php

namespace Controllers;

use Controllers\Controller;
use Models\User;

class UserController extends Controller{
    private $user;
    private $id = 0;


    public function __construct(){
        $this->user = new User();
    }

    protected function layout(): string{
        $user = $this->getUser();
        $id = $this->getId();
        
        $user = $user->findOne( $id);
        
        return $this->getForm($user);
    }

    public function update(): void{
        $this
            ->getRecordedUser()
            ->setId((int) $_POST['id'])
            ->update();
    }

    public function delete(): void{
        $id = $this->getId();

        $this
            ->getUser()
            ->setId($id)
            ->delete();
    }

    private function getForm(array $user): string{
        return $this->template('Templates/UserLayout/EditForm.php', ['user' => $user]);
    }

    public function getUser(): User{
        return $this->user;
    }

    public function insertAction(): void{
        $this
            ->getRecordedUser()
            ->insert();

        header('Location: /phpscript/');
    }

    public function editAction(int $id): void{
        echo $this
            ->setId($id)
            ->view();
    }

    private function getRecordedUser(): User{
        return $this
            ->getUser()
            ->setName($_POST['name'])
            ->setEmail($_POST['email']);
    }

    public function insert(): void{
        $this
            ->getRecordedUser()
            ->insert();
    }

    public function getId(): int{
        return $this->id;   
    }

    public function setId(int $id): self{
        $this->id = $id;

        return $this;
    }

    public function updateAction(): void{
        $this
            ->getRecordedUser()
            ->setId((int) $_POST['id'])
            ->update();

        header('Location: /phpscript/');
    }

    public function deleteAction(int $id): void{
        $this
            ->setId($id)
            ->delete();

        header('Location: /phpscript/');
    }
}
?>