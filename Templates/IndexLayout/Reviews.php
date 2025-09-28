<section class="form-section">
    <button type="button" class="btn" id="createNewReview">Создать отзыв</button>
</section>
<div class="text">
    <h3>Отзывы</h3>
    <p>Популярные отзывы наших клиентов</p>
</div>
</div>
<div id="reviews-container" class="container">
    <?php foreach ($reviews as $review):?>
        <div class="card">
            <div class="title"> 
                <?=$review['name']?>
            </div>
            <div class="body">
                <?=$review['comment']?>
            </div>
            <form method="get" action="/phpscript/review/edit/<?=(int) $review['id']?>">
                <button type="submit" class="btnEdit" id="editReview">Редактировать</button>
            </form>
            
            <form method="post" action="/phpscript/review/delete/<?=(int) $review['id']?>">
                <button type="submit" class ="btnDelete">Удалить</button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>