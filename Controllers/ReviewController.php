<?php

namespace Controllers;

use Controllers\Controller;
use Models\Review;

class ReviewController extends Controller{
    private $review;

    private $id = 0;

    public function __construct(){
        $this->review = new Review();
    }

    public function editAction(int $id): void{
        echo $this
            ->setId($id)
            ->view();
    }

    protected function layout(): string{
        $review = $this->getReview();
        $id = $this->getId();

        $review = $this->review->findOne($id);
        
        return $this->getForm($review);
    }

    private function getForm(array $review): string{
        return $this->template('Templates/ReviewLayout/EditForm.php', ['review' => $review]);
    }

    public function getReview(): Review{
        return $this->review;
    }

    public function getCreateReview(array $review): string{
        return $this->template('Templates/ReviewLayout/CreateReview.php', ['review' => $review]);
    }

    private function getRecordedReview(): Review{
        return $this
            ->getReview()
            ->setName($_POST['name'])
            ->setComment($_POST['comment']);
    }

    public function insertAction(): void{
        $this
            ->getRecordedReview()
            ->insert();

        header('Location: /');
    }

    public function updateAction(): void{
        $this
            ->getRecordedReview()
            ->setId((int) $_POST['id'])
            ->update();

        header('Location: /');
    }

    public function deleteAction(int $id): void{
        $this
            ->getReview()
            ->setId($id)
            ->delete();

        header('Location: /');
    }

    public function addAction(): string{
        return $this->header() .
            $this->addLayout() .
            $this->footer();
    }
    
    public function getId(): int{
        return $this->id;
    }

    public function setId(int $id): self{
        $this->id = $id;

        return $this;
    }
}
?>
