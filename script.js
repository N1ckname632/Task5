'use strict'

document.addEventListener('DOMContentLoaded', function(){
    document.getElementById("sendButton").addEventListener("click", async function(){

        let username = $('#username').val().trim() || "";
        let usersurname = $('#usersurname').val().trim() || "";
        let email = $('#email').val().trim() || "";
        let message = $('#message').val().trim() || "";
        
        $('#result').text('Отправка запроса на сервер...');
        
        $.ajax({
            //url:'http://127.0.0.1',
            url:'https://httpbin.org/post',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                username,
                usersurname,
                email,
                message
            }),

            success: function(response) {
                $('#result').html(
                    '<strong>Успешный ответ от сервера:</strong><br>' + JSON.stringify(response)
                );
            },
            
            error: function(xhr, status, error) {
                $('#result').html(
                    '<strong>Произошла ошибка:</strong><br>' +
                    'Статус: ' + status + '<br>' +
                    'Текст ошибки: ' + error
                );

                console.error('AJAX Error:', status, error);
                console.error('Full response:', xhr.responseText);
            },
            
            complete: function() {
                console.log('AJAX запрос завершен');
            }
        });

        if (!username || !email){
            alert('Поля "Имя" и "Email" должны быть заполнены');
            return;
        }
        
        try {
            const response = await fetch('/phpscript/api/save-user', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'Accept' : 'application/json'
                },
                body: JSON.stringify({ 
                    username: username,
                    usersurname: usersurname,
                    email:email,
                    message:message
                })
            });

            const result = await response.json();

            if (!response.ok){
                throw new Error(result.message || 'Ошибка сервера');
            }

            $('#result').html(
                '<strong>Успешный ответ от сервера:</strong><br>'+
                'Пользователь успешно сохранен! ID: ' + result.id
            );
            
            alert('Пользователь сохранён!');
            document.getElementById("contactForm").reset();
            location.reload();
        } catch (error) {
            console.error('Ошибка:', error);
            $('#result').html(
                '<strong>Произошла ошибка:</strong><br>' + error.message
            );
            alert(error.message);
        }
    });
    
    document.getElementById("orderButton").addEventListener("click",function(){
        
        let fullname = document.getElementById("fullname")?.value.trim() || "";
        let address = document.getElementById("address")?.value.trim() || "";
        let comments = document.getElementById("comments")?.value.trim() || "";
        let agreement = document.getElementById("agreement")?.checked || false;
        
        if (!fullname) {
            Swal.fire({
                icon: 'warning',
                title: 'Не все поля заполнены',
                text: 'Пожалуйста, укажите ваше полное имя',
            });
            return;
        }
        
        if (!agreement) {
            Swal.fire({
                icon: 'error',
                title: 'Требуется согласие',
                text: 'Для продолжения необходимо принять условия договора-оферты',
            });
            return;
        }
        
        Swal.fire({
            icon: 'success',
            title: 'Заказ создан!',
            html: `Полное имя: ${fullname}<br>` + 
            `Адрес доставки: ${address || "Не указан"}<br>` + 
            `Комментарии: ${comments || "Нет комментариев"}<br>`,
            confirmButtonText: 'OK'
        });
    });
    
    document.getElementById("createReviewButton").addEventListener("click", async function() {
        const name = document.getElementById('createReviewName').value.trim();
        const comment = document.getElementById('createReviewComment').value.trim();
        
        if (!name || !comment){
            alert('Все поля должны быть заполнены');
            return;
        }
        
        try {
            const response = await fetch('/phpscript/api/save-review', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'Accept' : 'application/json'
                },
                body: JSON.stringify({ 
                    name: name, 
                    comment: comment 
                })
            });

            const result = await response.json();''

            if (!response.ok){
                throw new Error(result.message || 'Ошибка сервера');
            }
            
            alert('Отзыв сохранён!');
            document.getElementById('createReviewForm').reset();
            document.getElementById('createReview').classList.toggle('hidden');
            location.reload();
        } catch (error) {
            console.error('Ошибка:', error);
            alert(error.message);
        }
    });
    
    document.getElementById('createNewReview').addEventListener("click",function(){
        document.getElementById('createReview').classList.remove('hidden');
    })
});