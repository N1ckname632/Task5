<div class="col-6">
    <form action="/phpscript/review/update" method="post" class ="edit-form review-form">
        <input type="text" class ="form-control" value="<?= htmlspecialchars($review['name'] ?? '') ?>" name="name" placeholder="Имя">
        <input type="text" class ="form-control" value="<?= htmlspecialchars($review['comment'] ?? '') ?>" name="comment" placeholder="Отзыв">
        <input type="hidden" class ="form-control" value="<?= htmlspecialchars($review['id'] ?? 0) ?>" name="id">

        <button class="btn">Сохранить</button>
    </form>
</div>