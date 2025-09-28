<section id="createReview" class="form-section hidden">
    <form id="createReviewForm">
        <h3>Создание отзыва</h3>
        
        <div class="form-group">
            <label for="createReviewName">Имя</label>
            <input type = "text" id="createReviewName" name="createReviewName" class="form-control" minlength="3" placeholder="Введите ваше имя" required>
        </div>
        
        <div class="form-group">
            <label for="createReviewComment">Комментарий</label>
            <textarea id="createReviewComment" name="createReviewComment" class="form-control" placeholder="Введите комментарий"></textarea>
        </div>
        
        <button type="button" id = "createReviewButton" class="btn">Сохранить</button> 
    </form>
</section>