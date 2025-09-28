<section class="form-section">
    <form id="orderForm">
        <h3>Информация о заказе</h3>
        <p class="delivery-info">Мы доставим за 2 дня</p>
        
        <div class="form-group">
            <label for="fullname">Полное имя</label>
            <input type = "text" id="fullname" name="fullname" class="form-control" minlength="3" required>
        </div>
        
        <div class="form-group">
            <label for="address">Адрес доставки</label>
            <input type = "text" id="address" name="address" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="comments">Комментарии к заказу</label>
            <textarea id="comments" name="comments" class="form-control"></textarea>
        </div>
        
        <div class="form-group checkbox">
            <input type = "checkbox" id="agreement" name="agreement" required>
            <label for="agreement">Принять условия договора-оферты</label>
        </div>
        
        <button type="button" id = "orderButton" class="btn">Создать заказ</button> 
    </form>
</section>