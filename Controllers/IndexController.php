<?php

namespace Controllers;

use Controllers\Controller;
use Models\Review;
use Models\User;

class IndexController extends Controller{

    public function indexAction(): void{
        echo $this->view();
    }

    public function getError(): void{
        echo $this->header().
            $this->template('Templates/Error.php').
            $this->footer();
    }

    private function getReviews(): string{
        $reviews = (new Review())->findAll();

        return $this->template('Templates/IndexLayout/Reviews.php', ['reviews' => $reviews]);
    }

    private function getUsers(): string{
        $user = new User();
        
        $users = $user->findAll();

        return $this->template('Templates/IndexLayout/Users.php', ['users' => $users]);
    }

    public function getHelpblock():string{
        return $this->template('Templates/IndexLayout/Helpblock.php');
    }

    public function getOrderblock():string{
        return $this->template('Templates/IndexLayout/Orderblock.php');
    }

    public function createReview():string{
        return $this->template('Templates/IndexLayout/CreateReview.php');
    }
    protected function layout(): string{
        $users = $this->getUsers();
        $reviews = $this->getReviews();
        $createReview = $this->createReview();
        $orderblock = $this->getOrderblock();
        $helpblock = $this->getHelpblock();

        return $this->template('Templates/IndexLayout/Layout.php',[
            'users' => $users,
            'reviews' => $reviews,
            'createReview' => $createReview,
            'orderblock' => $orderblock,
            'helpblock' => $helpblock
        ]);
    }
}
?>