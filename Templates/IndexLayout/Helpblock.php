<section class="form-section">
    <form id="contactForm">
        
    <div class="form-group">
        <label for="username">Имя</label>
        <input type = "text" id="username" name="username" class="form-control" minlenght="3" required>
    </div>
    
    <div class="form-group">
        <label for="usersurname">Фамилия</label>
        <input type="text" id="usersurname" name="usersurname" class = "form-control">
    </div>
    
    <div class="form-group">
        <label for="email">Почта</label>
        <input type = "email" id="email" name="email" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="message">Сообщение</label>
        <textarea id="message" name="message" class="form-control" required></textarea>
    </div>
    
    <button type="button" id="sendButton" class="btn">Отправить</button>
</form>
</section>