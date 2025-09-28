<div class="text">
    <h3>Пользователи</h3>
</div>
<div id="user-container" class="container">
    <?php foreach ($users as $user):?>
        <div class="card">
            <div class="title"> 
                <?=$user['name']?>
            </div>
            <div class="body">
                <?=$user['email']?>
            </div>
            
            <form method="get" action="/user/edit/<?=(int) $user['id']?>">
                <button type="submit" class="btnEdit" id="editUser">Редактировать</button>
            </form>
            
            <form method="post" action="/user/delete/<?=(int) $user['id']?>">
                <button type="submit" class ="btnDelete">Удалить</button>
            </form>
        </div>

        <?php endforeach; ?>

    </div>
