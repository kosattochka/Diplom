<header>
    <img src="/img/background_index.svg" alt="" class="header-logo desktop">
    <div class="head">
        <a href="/placement" class="{{ (isset($active) and $active == 1) ? 'active' : '' }}">Размещение</a>
        <a href="/service" class="{{ (isset($active) and $active == 2) ? 'active' : '' }}">Услуги</a>
        <a href="/rule" class="{{ (isset($active) and $active == 3) ? 'active' : '' }}">Правила</a>
        <a href="/event" class="{{ (isset($active) and $active == 4) ? 'active' : '' }}">Акции</a>
        <a href="/new" class="{{ (isset($active) and $active == 5) ? 'active' : '' }}">Блог</a>
        <a href="/gallery" class="{{ (isset($active) and $active == 6) ? 'active' : '' }}">Галерея</a>
        <a href="/review" class="{{ (isset($active) and $active == 7) ? 'active' : '' }}">Отзывы</a>
        <a href="/contact" class="{{ (isset($active) and $active == 8) ? 'active' : '' }}">Контакты</a>
    </div>
    <div class="mobile-rectangle-black modal" id="burger">
        <div class="MobileNav">
            <a href="/placement" class="{{ (isset($active) and $active == 1) ? 'active' : '' }}">Размещение</a>
            <a href="/service" class="{{ (isset($active) and $active == 2) ? 'active' : '' }}">Услуги</a>
            <a href="/rule" class="{{ (isset($active) and $active == 3) ? 'active' : '' }}">Правила</a>
            <a href="/event" class="{{ (isset($active) and $active == 4) ? 'active' : '' }}">Акции</a>
            <a href="/new" class="{{ (isset($active) and $active == 5) ? 'active' : '' }}">Блог</a>
            <a href="/gallery" class="{{ (isset($active) and $active == 6) ? 'active' : '' }}">Галерея</a>
            <a href="/review" class="{{ (isset($active) and $active == 7) ? 'active' : '' }}">Отзывы</a>
            <a href="/contact" class="{{ (isset($active) and $active == 8) ? 'active' : '' }}">Контакты</a>
            <div class="burger-footer">
                <div class="share-content">
                    @if (Auth::check())
                    <a href="/account"><img src="/img/account-icon.svg" alt="">{{Auth::user()->name}}</a>
                    <a href="/logout"><img src="/img/login-icon.svg" alt="">Выход</a>
                    @else
                        <a href="">
                            <img src="/img/registration-icon.svg" alt="">
                            <button class="modal-open" data-modal="modal1">Регистрация</button></a>
                        <a href="">
                            <img src="/img/login-icon.svg" alt="">
                            <button class="modal-open" data-modal="modal2">Вход</button>
                        </a>
                    @endif
                </div>
                <img src="/img/logo.svg" alt="">
            </div>
        </div>
    </div>

    @if (!Auth::check())
        <!-- Модальное окно для регистрации -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <span class="modal-close">&times;</span>
                <div class="subtitle">
                    <div>
                        <img src="/img/logo.svg" alt="">
                    </div>
                </div>
                <h2>РЕГИСТРАЦИЯ</h2>
                <form class="registration-form" id="register">
                    <div class="form-group">
                        <label>ФИО</label>
                        <input type="text" name="name" placeholder="Введите ваше полное имя" required>
                    </div>
                    <div class="form-group">
                        <label>Номер телефона</label>
                        <input type="tel" name="phone" placeholder="+7 (___) ___-__-__" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="example@mail.com" required>
                    </div>
                    <div class="form-group">
                        <label>Придумайте пароль</label>
                        <input type="password" name="password" placeholder="Не менее 8 символов" required>
                    </div>
                    <div class="form-group">
                        <label>Повторите пароль</label>
                        <input type="password" name="password_confirmation" placeholder="Повторите ваш пароль" required>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" id="existing" name="rule">
                        <label for="existing">Нажимая на кнопку, вы соглашаетесь на <a href="/politics">политику конфиденциальной информации</a></label>
                    </div>
                    <button type="submit" class="submit-btn">Зарегистрироваться</button>
                    <div class="button-center">
                        <button type="button" class="modal-open" data-modal="modal2">Если уже есть аккаунт, войти</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Модальное окно для входа -->
        <div id="modal2" class="modal">
            <div class="modal-content">
                <span class="modal-close">&times;</span>
                <div class="subtitle">
                    <div>
                        <img src="/img/logo.svg" alt="">
                    </div>
                </div>
                <h2>ВХОД</h2>
                <form class="registration-form" id="login">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="example@mail.com" required>
                    </div>
                    <div class="form-group">
                        <label>Пароль</label>
                        <input type="password" name="password" placeholder="Напишите ваш пароль" required>
                    </div>
                    <button type="submit" class="submit-btn">Войти</button>
                    <div class="share-modal">
                        <button type="button" class="modal-open" data-modal="modal3">Забыли пароль?</button>
                        <button type="button" class="modal-open" data-modal="modal1">Зарегистрироваться</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Модальное окно для восстановления пароля --}}
        <div id="modal3" class="modal">
            <div class="modal-content">
                <span class="modal-close">&times;</span>
                <div class="subtitle">
                    <div>
                        <img src="/img/logo.svg" alt="">
                    </div>
                </div>
                <h2>ВОССТАНОВЛЕНИЕ ПАРОЛЯ</h2>
                <form class="registration-form" id="forgot">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="example@mail.com" required>
                    </div>
                    <button type="submit" class="submit-btn">Отправить</button>
                    <span>Нажимая на кнопку, вам придёт электронное письмо с ссылкой для восстановления пароля</span>
                </form>
            </div>
        </div>
    @endif

    <div class="baner">
        <div class="head-column">
            <div class="logo-wrapper">
                <img src="/img/burger.svg" alt="" class="burger-img modal-open" data-modal="burger">
                <a href="/"><img src="/img/logo.svg" alt="" class="logo"></a>
            </div>
            <a href="{{$vk}}">
                <img src="/img/vk.svg" alt="">
                Вконтакте
            </a>
            <a href="{{$telegram}}">
                <img src="/img/telegram.svg" alt="">
                Телеграм
            </a>
            <a href="tel:{{$phone}}">
                <img src="/img/phone.svg" alt="">
                Офис продаж (звонок бесплатный): <br>{{$phone}}
            </a>
            <div class="share-content">
                @if (Auth::check())
                    <a href="/account"><img src="/img/account-icon.svg" alt="">{{Auth::user()->name}}</a>
                    <a href="/logout"><img src="/img/login-icon.svg" alt="">Выход</a>
                @else
                    <a href=""><img src="/img/registration-icon.svg" alt=""><button class="modal-open" data-modal="modal1">Регистрация</button></a>
                    <a href=""><img src="/img/login-icon.svg" alt=""><button class="modal-open" data-modal="modal2">Вход</button></a>
                @endif
            </div>
        </div>
        @switch($active)
            @case(0)
                <div class="baner-content-index">
                    <div class="icon-container">
                        <img src="/img/icon-ecolist.svg" alt="">
                        <div>
                            <span class="text-icon-big">Экологически <span class="text-icon-small">чистый воздух</span></span>
                        </div>
                    </div>
                    <div class="icon-container">
                        <img src="/img/icon-entertaiment.svg" alt="">
                        <div>
                            <span class="text-icon-big">Все развлечения <span class="text-icon-small">в одном месте</span></span>
                            <span class="text-icon-big">Обширные возможности  <span class="text-icon-small">отдыха</span></span>
                        </div>
                    </div>
                    <div class="icon-container">
                        <img src="/img/icon-excursions.svg" alt="">
                        <div>
                            <span class="text-icon-big">Экскурсии для <span class="text-icon-small">туристов</span></span>
                            <span class="text-icon-big">Близкое расположение <span class="text-icon-small">к столице</span></span>
                        </div>
                    </div>
                    <div class="icon-container">
                        <img src="/img/icon-quality.svg" alt="">
                        <div>
                            <span class="text-icon-big">Высокое качество <span class="text-icon-small">обслуживания</span></span>
                            <span class="text-icon-big">Комфортабельное <span class="text-icon-small">проживание</span></span>
                        </div>
                    </div>
                    <div class="icon-container">
                        <img src="/img/icon-price.svg" alt="">
                        <div>
                            <span class="text-icon-big">Привлекательные <span class="text-icon-small">цены</span></span>
                        </div>
                    </div>
                </div>
                @break
            @case(1)
                <div class="baner-content-placement">
                    <span>Номера в гостинице</span>
                    <div class="rectangle-white-container">
                        <p>Гостиничный комплекс включает: <br>
                            • 3 двухэтажных коттеджа и 1 трехэтажный корпус.  <br>
                            • В каждом коттедже — 8 номеров категории «Стандарт» (по 4 на этаже). <br>
                            • В главном корпусе: 4 номера «Люкс», 2 номера «Люкс плюс» и 35 номеров «Стандарт» (по 4 на этаже). <br>
                            • Все номера оснащены ванной, телевизором, чайником, полотенцами, мыльными принадлежностями, отоплением и Wi-Fi. <br>
                            • Курение в номерах запрещено. <br>
                            <br>
                            Рекомендуем ознакомиться с <a href="/rule">Правилами</a> центра отдыха «Павловский Парк».
                        </p>
                    </div>
                </div>
                @break
            @case(2)
                <div class="baner-content-placement">
                    @if (isset($title) and $title!=null)
                        <span>Услуги/{{$title}}</span>
                    @else
                        <span>Услуги</span>
                    @endif
                    <div class="rectangle-white-container">
                        <p>Отдых на Павловке доступен круглый год. В наших домиках комфортно как летом, так и зимой. Всесезонные развлечения включают бассейн с подогревом, который работает уже с весны, а также бани и кафе с аппетитным меню. Летом гости могут насладиться водными развлечениями на водохранилище, поиграть на спортивных площадках или посетить аквапарк с увлекательными горками. Зимой доступны профессиональные трассы для горных лыж, спуски на тюбингах и прокат беговых лыж для прогулок по замёрзшему водохранилищу с живописными видами.
                            Для делового туризма мы организуем конференции и семинары, обеспечивая всё необходимое: пространство, питание, экскурсии и развлечения. Любители истории могут отправиться на экскурсии к интересным местам, включая самый высоконапорный шлюз в нашей части света и скалистые берега водохранилища.
                            Наши коттеджи идеально подходят для свадеб, праздников и дружеских встреч. Мы создаём условия, чтобы торжества оставляли приятные впечатления на всю жизнь. Павловка – это место, где каждый найдёт отдых по душе в любое время года.
                        </p>
                    </div>
                </div>
                @break
            @case(3)
                <div class="baner-content-placement">
                    <span>Правила</span>
                    <div class="rectangle-white-container line-yellow">
                        <span class="text-center">Общие правила поведения</span>
                        <br>
                        <span>Мы стремимся создать комфортную и безопасную атмосферу для всех гостей нашего центра отдыха. Пожалуйста, соблюдайте следующие правила:</span>
                        <br>
                        <span class="text-yellow">
                        1. Будьте вежливы и уважительны
                        <span>по отношению к другим гостям и персоналу. Мы ценим доброжелательную атмосферу и просим вас избегать конфликтных ситуаций.</span>
                        </span>
                        <br>
                        <span class="text-yellow">
                        2. Соблюдайте тишину с 22:00 до 08:00.
                        <span>Это время предназначено для отдыха, и мы просим вас не шуметь, чтобы не мешать другим гостям.</span>
                        </span>
                        <br>
                        <span class="text-yellow">
                        3. Курение разрешено
                        <span>только</span>
                        в специально отведенных
                        <span>для этого</span>
                        местах
                        <span>Пожалуйста, не курите в помещениях, на детских площадках и в других зонах, где это запрещено. Это помогает нам поддерживать чистоту и заботиться о здоровье всех посетителей.</span>
                        </span>
                        <br>
                        <span>Соблюдение этих правил поможет сделать ваш отдых и отдых других гостей приятным и безопасным. Благодарим за понимание и сотрудничество!</span>
                  </div>
                </div>
                @break
            @case(4)
                <div class="baner-content-placement">
                    <span>Акции</span>
                    <div class="rectangle-white-container line-yellow-top">
                        <span>Почему выбирают подарочные сертификаты и акции «Павловского парка»?</span>
                        <br>
                        <br>
                        <li>
                        <span class="text-yellow">Универсальность:</span>
                        сертификат подойдет на любой праздник – день рождения, Новый год, юбилей или просто как знак внимания.
                        </li>
                        <li>
                        <span class="text-yellow">Свобода выбора:</span>
                        получатель сам решит, когда воспользоваться сертификатом – срок действия до 12 месяцев!
                        </li>
                        <li>
                        <span class="text-yellow">Эмоции вместо вещей:</span>
                        подарите не просто подарок, а незабываемые впечатления и отдых в окружении природы.
                        </li>
                        <li>
                        <span class="text-yellow">Выгодно:</span>
                        скидка 10% на покупку сертификатов – дарите больше за меньшие деньги!
                        </li>
                        <br>
                        <span class="text-yellow text-center">НЕ УПУСТИТЕ ВОЗМОЖНОСТЬ!</span>
                        <br>
                        <span class="text-yellow">Звоните:</span><a href="tel:{{$phone}}">{{$phone}}</a><br>
                        <span class="text-yellow">Пишите:</span><a href="mailto:{{$email}}">{{$email}}</a>
                  </div>
                </div>
                @break
            @case(5)
                <div class="baner-content-placement new-padding">
                    <span>Новости</span>
                    <div class="new-baner">
                        <span>"Павловский парк: где каждая новость — это повод собрать чемоданы и убежать от городской суеты в объятия природы!"</span>
                        <img src="/img/news/new-baner.png" alt="">
                    </div>
                </div>
                @break
            @case(6)
                <div class="baner-content-placement">
                    <span>Галерея</span>
                    <div class="rectangle-white-container line-yellow-bottom column-gap">
                        <div>
                            <img src="/img/albums/icon-gallery-1.svg" alt="">
                            <span>Уважаемые гости Павловского парка!<br>Здесь проводят корпоративы, свадьбы, встречают Новый Год, дни рождения и просто отлично проводят время.</span>
                        </div>
                        <div>
                            <img src="/img/albums/icon-gallery-2.svg" alt="">
                            <span>Для бронирования домиков обязательно свяжитесь с менеджером по телефону: <a href="tel:{{$phone}}">{{$phone}}</a>.</span>
                        </div>
                  </div>
                </div>
                @break
            @case(7)
                <div class="baner-content-placement">
                    <span>Отзывы</span>
                    <div class="rectangle-white-container line-yellow-bottom column-gap">
                        <span>Павловский Парк предлагает ознакомиться с фотографиями, сделанными отдыхающими.<br>Ваше мнение важно для нас! Поделитесь впечатлениями о парке, услугах, развлечениях и кухне. Ваши отзывы помогут нам стать лучше. Оставьте их на Яндекс.Картах или 2ГИС. Спасибо!</span>
                        <div class="rewiev-block">
                            <a href="https://yandex.ru/maps/org/pavlovskiy_park/1203779586/reviews/?ll=56.525875%2C55.459164&utm_campaign=v1&utm_medium=rating&utm_source=badge&z=13" class="review-block">
                                <img src="/img/Yandex.svg" alt="">
                                <div>
                                    <h1>{{round($rating['Яндекс'], 1)}}</h1>
                                    @include('element.stars', [
                                        'rating'=> $rating['Яндекс']
                                    ])
                                </div>
                                <span>Оценка в Яндекс</span>
                            </a>
                            <a href="https://2gis.ru/ufa/firm/2393065583227349?utm_source=widget_firm" class="review-block">
                                <img src="/img/2gis.svg" alt="">
                                <div>
                                    <h1>{{round($rating['2gis'], 1)}}</h1>
                                    @include('element.stars', [
                                        'rating'=> $rating['2gis']
                                    ])
                                </div>
                                <span>Оценка в 2gis</span>
                            </a>
                        </div>
                        <span>Мы благодарим вас за ваше внимание и ждем ваших отзывов! С уважением, администрация Павловского парка.</span>
                  </div>
                </div>
                @break
            @case(8)
                <div class="baner-content-placement">
                    <span>Контакты</span>
                    <div class="rectangle-white-container line-yellow-bottom">
                        <span class="text-center text-yellow Gabriela-text">Офис продаж<span class="Gabriela-text"> в г.Уфа</span></span>
                        <br>
                        <span>{{$mail_index}}, {{$address_office}}</span><br>
                        <span class="text-yellow">
                        Телефон:
                        <a href="tel:{{$phone}}">{{$phone}}</a>
                        </span><br>
                        <span class="text-yellow">
                        e-mail:
                        <a href="mailto:{{$email}}">{{$email}}</a>
                        </span><br>
                        <span class="text-yellow">
                        Режим работы:
                        <span>пн.- пт. с 09:00- 18:00, без перерыва. сб.- вс. выходной</span>
                        </span>
                        <br>
                        <br>
                        <span class="text-center text-yellow Gabriela-text">Адрес<span class="Gabriela-text"> места нахождения</span></span>
                        <br>
                        <span>{{$address_place}}</span>
                        <br>
                        <span class="text-yellow">
                        Дежурный администратор
                        <span>на базе отдыха «Павловский Парк»:</span>
                        <a class="text-yellow">{{$operator}}</a>
                        </span>
                  </div>
                </div>
                @break
            @case(9)
                <div class="baner-content-placement">
                    <span>Политика<br> конфиденциальности сайта<br> pavlovpark.ru</span>
                    <div class="rectangle-white-container line-yellow-bottom">
                        <p>Настоящая Политика конфиденциальности персональной информации (далее — Политика) действует в отношении всей информации, которую Сайт pavlovpark.ru (далее — Сайт) может получить о пользователе во время использования им сайта. Согласие пользователя на предоставление персональной информации, данное им в соответствии с настоящей Политикой в рамках отношений с одним из лиц, входящих в число собственников сайта и распространяется на все лица.
                            Использование Сайта означает безоговорочное согласие пользователя с настоящей Политикой и указанными в ней условиями обработки его персональной информации; в случае несогласия с этими условиями пользователь должен воздержаться от использования Сайта.
                        </p>
                    </div>
                </div>
                @break
            @case(10)
                <div id="bottom-content">
                    @include('block.slider', [
                        'id'=>1,
                        'desktopCount' => 1,
                        'elements' => $imgs
                    ])
                </div>
                @break
            @case(11)
                <div class="baner-content-placement">
                    <span>Размещение/{{$title}}</span>
                    @include('block.slider', [
                        'id'=>1,
                        'desktopCount' => 1,
                        'elements' => $img
                    ])
                @break
            @case(12)
                <div class="account-content">
                    <div class="baner-content-placement">
                        <span>Персональные данные</span>
                        <div class="rectangle-white-container account-baner">
                            <p class="account-text">Эти данные необходимы, чтобы автоматически заполнять соответствующие поля и ускорять процесс бронирования.</p>
                        </div>
                        <form class="registration-form" id="editUser">
                            <input type="hidden" name="id" value="{{Auth::user()->id}}">
                            <div class="form-group" id="name">
                                <input type="text" name="name" placeholder="Введите ваше полное имя" required value='{{$user->name}}'>
                            </div>
                            <div>
                                <div class="form-group" id="email">
                                    <input type="email" name="email" placeholder="example@mail.com" required value='{{$user->email}}'>
                                </div>
                                <select class="form-group" id="sex" name="is_man">
                                    <option value="" disabled {{$user->is_man == null ? 'selected' : ''}}>Пол</option>
                                    <option value="0" title="Женский пол" {{$user->is_man == 0 ? 'selected' : ''}}>Жен</option>
                                    <option value="1" title="Мужской пол" {{$user->is_man == 1 ? 'selected' : ''}}>Муж</option>
                                </select>
                            </div>
                            <div>
                                <div class="form-group" id="phone">
                                    <input type="tel" name="phone" placeholder="+7 (___) ___-__-__" required value='{{$user->phone}}'>
                                </div>
                                <div class="form-group" id="date">
                                    @php
                                        $user->birthday = Carbon\Carbon::parse($user->birthday)->format('Y-m-d');
                                    @endphp
                                    <input type="date" name="birthday" placeholder="Дата рождения" required value='{{$user->birthday}}'>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="submit-btn form-button">Сохранить изменения</button>
                                <button type="button" class="submit-btn form-button" id="changePasswordBtn">Изменить пароль</button>
                            </div>
                        </form>
                    </div>
                </div>
                @break
            @case(13)
                <div class="baner-content-placement top-none">
                    <span>Услуги/{{$title}}</span>
                    <div class="rectangle-white-container">
                        {{$page_description}}
                    </div>
                @break
            @case(14)
                <div class="baner-content-placement">
                    <span>Правила/{{$title}}</span>
                    <div class="rectangle-white-container">
                        <p>Данные правила в Круглогодичном центре отдыха «Павловский Парк» (далее Правила) разработаны в соответствии с Законом Российской Федерации «О защите прав потребителей», Правилами предоставления гостиничных услуг в Российской Федерации, утвержденными постановлением Правительства РФ от 18.11.2020 г. № 1853 и другими нормативными актами,  регулирующими правоотношения между исполнителями и потребителями в области предоставления гостиничных услуг.
                        </p>
                    </div>
                </div>
                @break
            @case(15)
                <div class="baner-content-placement">
                    <span>Акции/{{$title}}</span>
                    <img src="{{$certificate}}" alt="" class="foto-certificate">
                </div>
                @break
            @case(16)
                <div class="baner-content-placement">
                    <span>Галерея/Фотоальбом {{$title}}</span>
                    <img src="{{$img}}" alt="">
                </div>
                @break
            @case(17)
                <div class="baner-content-placement">
                    <span>{{$title}}</span>
                    <img src="{{$img}}" alt="">
                </div>
                @break
            @default
        @endswitch
    </div>
</header>
