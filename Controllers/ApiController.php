<?php
namespace Controllers;

use Controllers\Controller;
use Models\User;
use Models\Review;

class ApiController extends Controller{
    protected function layout(): string{
        return '';
    }

    public function saveUserAction(): void{
        header('Content-Type: application/json');

        try{
            $input = json_decode(file_get_contents('php://input'),true);

            if(json_last_error() !== JSON_ERROR_NONE){
                throw new \Exception('Ошибка декодирования JSON');
            }

            $username = htmlspecialchars($input['username'] ?? '');
            $usersurname = htmlspecialchars($input['usersurname'] ?? '');
            $email = htmlspecialchars($input['email'] ?? '');
            $message = htmlspecialchars($input['message'] ?? '');

            if(empty($username) || empty($email)){
                throw new \Exception('Поля "Имя" и "Email" обязательны для заполнения');
            }

            $user = new User();
            $user->setName($username)
                ->setSurname($usersurname)
                ->setEmail($email)
                ->setMessage($message)
                ->insert();

            echo json_encode([
                'success' => true,
                'message' => 'Пользователь успешно сохранен',
                'id' => $user->getId()
            ]);
        } catch(\Exception $e) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function saveReviewAction(): void{
        header('Content-Type: application/json');

        try{
            $input = json_decode(file_get_contents('php://input'), true);

            if(json_last_error() !== JSON_ERROR_NONE){
                throw new \Exception('Ошибка декодирования JSON');
            }

            $name = htmlspecialchars($input['name'] ?? '');
            $comment = htmlspecialchars($input['comment'] ?? '');

            if(empty($name) || empty($comment)){
                throw new \Exception('Все поля обязательные для заполнения');
            }

            $review = new Review();
            $review->setName($name)
                ->setComment($comment)
                ->insert();

            echo json_encode([
                'success' => true,
                'message' => 'Отзыв успешно добавлен',
                'id' => $review->getId()
            ]);
        } catch(\Exception $e){
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
?>