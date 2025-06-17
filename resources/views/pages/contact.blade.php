@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/contact.css">
@endsection

@section('title') Контакты Павловского парка @endsection
@section('main_content')
    @include('block.header', [
        'active' => 8,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'address_office'=>$contacts->address_office,
        'address_place'=>$contacts->address_place,
        'mail_index'=>$contacts->mail_index,
        'email'=>$contacts->email,
        'operator'=>$contacts->operator
    ])

    <section>
        <div class="six"><p><span><img src="/img/contact/car-icon.svg" alt="">Местоположение офиса продаж</span></p></div>
        <div class="map-transport">
            {!!$contacts->map!!}
        </div>
        <div class="six"><p><span><img src="/img/contact/car-icon.svg" alt="">Схема проезда</span></p></div>
        <div class="rectangle-white-container line-yellow-bottom">
            <p>Как до нас добраться на общественном транспорте: ежедневно ездят коммерческие автобусы от стадиона «Нефтяник» до с. Павловки!<br>
                <br>
                Расписание можно уточнить у водителей коммерческих автобусов по телефонам:<br>
                <a href="tel:+7 (927) 235-57-41">+7 (927) 235-57-41</a><br>
                <a href="tel:+7 (927) 082-99-99">+7 (927) 082-99-99</a><br>
                <a href="tel:+7 (960) 380-81-52">+7 (960) 380-81-52</a><br>
                Добравшись до села Павловка, которое находится от нас в 7 км, вы можете вызвать такси. Все таксисты хорошо знают, где мы находимся, и с удовольствием довезут до нас.<br>
                <br>
                Телефоны такси в с. Павловке:<br>
                <a href="tel:+7 (927) 338-74-25">+7 (927) 338-74-25</a><br>
                <a href="tel:+7 (927) 320-87-16">+7 (927) 320-87-16</a><br>
                <a href="tel:+7 (937) 302-42-58">+7 (937) 302-42-58</a><br>
                <a href="tel:+7 (917) 773-50-40">+7 (917) 773-50-40</a><br>
            </p>
        </div>
        <div class="six"><p><span><img src="/img/contact/car-icon.svg" alt="">Как добраться на личном автотранспорте?</span></p></div>
        <div class="map-transport">
            {!!$contacts->map_route!!}
            <p>
                1. С трассы М-5 Челябинск-Уфа-поворот на поселок Иглино, не доезжая г.Уфы 20 км. Далее ехать в сторону поселка Красная горка, поселка Красный ключ до Павловской ГЭС, не переезжая плотину- направо в гору до поселка Павловка. В самом поселке ехать по главной дороге до Дома Культуры — увидите наши баннеры со стрелками на повороты. Далее за поселком направо вниз с горы, через 6 километров начинается Зона отдыха Бирючево Поле. КЦО «Павловский Парк» расположен в конце Зоны отдыха на Павловском водохранилище.
                <br><br>
                2. С трассы Уфа-Бирск, не доезжая города Благовещенск, повернуть направо по указателю «БЕДЕЕВА ПОЛЯНА» и «УСПЕНСКИЙ СВЯТО-ГЕОРГИЕВСКИЙ МУЖСКОЙ МОНАСТЫРЬ» в сторону поселков Надеждино, Языково, Бедеева поляна. За поселком Танайка —  направо до Павловской ГЭС, через плотину, прямо в гору до поселка Павловка, далее —  как по предыдущему маршруту.
            </p>
        </div>
        <div class="six"><p><span><img src="/img/contact/gps-icon.svg" alt="">GPS-координаты</span></p></div>
        <div class="rectangle-white-container width-container">
            <span class="text-yellow">Широта:<span>+55° 27' 13.0674" (55.45363)</span></span>
            <br>
            <span class="text-yellow">Долгота:<span>+56° 31' 4.404" (56.51789)</span></span>
        </div>
    </section>

    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])

@endsection
