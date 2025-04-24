<div id="reservation" class="modal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <div class="subtitle">
            <div>
                <img src="/img/logo.svg" alt="">
            </div>
        </div>
        <h2>БРОНИРОВАНИЕ</h2>
        <form class="registration-form" id="register">
            <input name="room_alias" type="hidden" id="room_alias" required>
            <div class="form-group">
                <label>ФИО</label>
                <input name="name" type="text" id="name" placeholder="Введите ваше полное имя"
                    required value="{{auth()->check() ? auth()->user()->name : ''}}">
            </div>
            <div class="form-group">
                <label>Номер телефона</label>
                <input name="phone" type="tel" id="phone" placeholder="+7 (___) ___-__-__"
                    required value="{{auth()->check() ? auth()->user()->phone : ''}}">
            </div>
            <div class="row-input">
                <div class="form-group">
                    <label for="date-input">Дата заезда</label>
                    <input name="start_date" type="date" id="start_date" class="date-input">
                </div>
                <div class="form-group">
                    <label for="date-input">Дата выезда</label>
                    <input name="end_date" type="date" id="end_date" class="date-input">
                </div>
            </div>
            <div class="row-input">
                <div class="form-group">
                    <label for="adults-input">Гости</label>
                    <input name="guests" type="number" id="guests" class="adults-input" min="1" max="10">
                </div>
                <div class="form-group">
                    <label for="adults-input">Гости</label>
                    <input name="child" type="number" id="child" class="adults-input" min="1" max="10">
                </div>
            </div>
            <button type="submit" class="submit-btn">Забронировать</button>
            <span>После бронирования с вами свяжется менеджер по номеру <a href="88006009344">8 (800) 600-93-44</a></span>
        </form>
    </div>
</div>
