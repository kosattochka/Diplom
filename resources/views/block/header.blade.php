<header>
    <script defer src="/js/burger.js"></script>
    <img src="/img/background_index.svg" alt="" class="header-logo desktop">
    {{-- <img src="/img/background-mobile.svg" alt="" class="header-logo mobile"> --}}
    <div class="head">
        <a href="/placement" class="{{ (isset($active) and $active == 1) ? 'active' : '' }}">Размещение</a>
        <a href="/service" class="{{ (isset($active) and $active == 2) ? 'active' : '' }}">Услуги</a>
        <a href="/rule" class="{{ (isset($active) and $active == 3) ? 'active' : '' }}">Правила</a>
        <a href="/event" class="{{ (isset($active) and $active == 4) ? 'active' : '' }}">Акции</a>
        <a href="" class="{{ (isset($active) and $active == 5) ? 'active' : '' }}">Блог</a>
        <a href="" class="{{ (isset($active) and $active == 6) ? 'active' : '' }}">Галерея</a>
        <a href="" class="{{ (isset($active) and $active == 7) ? 'active' : '' }}">Отзывы</a>
        <a href="" class="{{ (isset($active) and $active == 8) ? 'active' : '' }}">Контакты</a>
    </div>
    <div class="mobile-rectangle-black">
         <div class="MobileNav">
        <a href="/placement" class="{{ (isset($active) and $active == 1) ? 'active' : '' }}">Размещение</a>
        <a href="/service" class="{{ (isset($active) and $active == 2) ? 'active' : '' }}">Услуги</a>
        <a href="/rule" class="{{ (isset($active) and $active == 3) ? 'active' : '' }}">Правила</a>
        <a href="/event" class="{{ (isset($active) and $active == 4) ? 'active' : '' }}">Акции</a>
        <a href="" class="{{ (isset($active) and $active == 5) ? 'active' : '' }}">Блог</a>
        <a href="" class="{{ (isset($active) and $active == 6) ? 'active' : '' }}">Галерея</a>
        <a href="" class="{{ (isset($active) and $active == 7) ? 'active' : '' }}">Отзывы</a>
        <a href="" class="{{ (isset($active) and $active == 8) ? 'active' : '' }}">Контакты</a>
            <div class="burger-footer">
                <div class="share-content">
                    <a href=""><img src="/img/registration-icon.svg" alt=""><button>Регистрация</button></a>
                    <a href=""><img src="/img/login-icon.svg" alt=""><button>Вход</button></a>
                </div>
                <img src="/img/logo.svg" alt="">
            </div>
    </div>
    </div>

    <div class="baner">
        <div class="head-column">
            <div class="logo-wrapper">
                <img src="/img/burger.svg" alt="" class="burger-img" onclick="Nav()">
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
            <a href="{{$phone}}">
                <img src="/img/phone.svg" alt="">
                Офис продаж (звонок бесплатный): <br>{{$phone}}
            </a>
            <div class="share-content">
                <a href=""><img src="/img/registration-icon.svg" alt=""><button>Регистрация</button></a>
                <a href=""><img src="/img/login-icon.svg" alt=""><button>Вход</button></a>
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
                        Рекомендуем ознакомиться с <a href="">Правилами</a> центра отдыха «Павловский Парк».
                    </p>
                </div>
            </div>
            @break
            @case(2)
            <div class="baner-content-placement">
                <span>Услуги</span>
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
                        <br>
                        <span class="text-yellow">
                        1. Будьте вежливы и уважительны
                        <span>по отношению к другим гостям и персоналу. Мы ценим доброжелательную атмосферу и просим вас избегать конфликтных ситуаций.</span>
                        </span>
                        <br>
                        <br>
                        <span class="text-yellow">
                        2. Соблюдайте тишину с 22:00 до 08:00.
                        <span>Это время предназначено для отдыха, и мы просим вас не шуметь, чтобы не мешать другим гостям.</span>
                        </span>
                        <br>
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
                        <br>
                        <span>Соблюдение этих правил поможет сделать ваш отдых и отдых других гостей приятным и безопасным. Благодарим за понимание и сотрудничество!</span>
                  </div>
                </div>
            @break
            @case(4)
                <div class="baner-content-placement">
                    <span>Акции</span>
                    <div class="rectangle-white-container line-yellow">
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
                        <span class="text-yellow">Звоните:</span><a href=""> 8 (800) 600-93-44</a><br>
                        <span class="text-yellow">Пишите:</span><a href=""> pavlovpark@yandex.ru</a>
                  </div>
                </div>
            @break
            @default

        @endswitch
    </div>
</header>
