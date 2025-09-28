<div class="col-6">
    <form action="/phpscript/user/update" method="post" class ="edit-form user-form">
        <input type="text" class ="form-control" value="<?= htmlspecialchars($user['name'] ?? '') ?>" name="name" placeholder="Имя">
        <input type="text" class ="form-control" value="<?= htmlspecialchars($user['email'] ?? '') ?>" name="email" placeholder="Email">
        <input type="hidden" class ="form-control" value="<?= htmlspecialchars($user['id'] ?? 0) ?>" name="id">

        <button class="btn">Сохранить</button>
    </form>
</div>