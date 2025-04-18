<div class="card">
    <img src="{{$img}}" alt="">
    <div>
        <div>
            <span>{{$name}}</span>
            @if (isset($square, $capacity))
                <img src="/img/house.svg" alt="">
                <span>{{$square}} м<sup>2</sup></span>
                <img src="/img/people.svg" alt="">
                <span>{{$capacity}}</span>
            @endif
        </div>
    </div>
    <div>
        <p>{{$text}}</p>
        @if (isset($square, $capacity))
            <div>
                <a href=""><button class="modal-open" data-modal="modal4">Заявка на бронь</button></a>
            </div>
        @endif
    </div>
    <a href="{{$link}}">Подробнее</a>
</div>

{{-- Модальное окно бронирования --}}
<div id="modal4" class="modal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <div class="subtitle">
            <div>
                <img src="/img/logo.svg" alt="">
            </div>
        </div>
        <h2>БРОНИРОВАНИЕ</h2>
        <form class="registration-form" id="register">
            <div class="form-group">
                <label>ФИО</label>
                <input type="text" name="name" placeholder="Введите ваше полное имя" required>
            </div>
            <div class="form-group">
                <label>Номер телефона</label>
                <input type="tel" name="phone" placeholder="+7 (___) ___-__-__" required>
            </div>
            <div class="row-input">
                <div class="form-group">
                    <label for="date-input">Дата заезда</label>
                    <input type="date" id="date-input" class="date-input">
                </div>
                <div class="form-group">
                    <label for="date-input">Дата выезда</label>
                    <input type="date" id="date-input" class="date-input">
                </div>
            </div>
            <div class="form-group">
                <label for="adults-input">Гости</label>
                <input type="number" id="adults-input" class="adults-input" min="1" max="10">
            </div>
            <button type="submit" class="submit-btn">Забронировать</button>
            <span>После бронирования с вами свяжется менеджер по номеру <a href="">8 (800) 600-93-44</a></span>
        </form>
    </div>
</div>
