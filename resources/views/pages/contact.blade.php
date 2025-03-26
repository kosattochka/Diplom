@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/contact.css">
@endsection

@section('title') Акции Павловского парка @endsection
@section('main_content')
    @include('block.header', [
        'active' => 8,
        'phone' => '8 (800) 600-93-44',
        'telegram' => 'https://t.me/Pavlovskij_Park',
        'vk' => 'https://vk.com/club23119361',
    ])
<section>
        <div class="six"><p><span><img src="/img/contact/car-icon.svg" alt="">Местоположение офиса продаж</span></p></div>
    <div style="position:relative;overflow:hidden;display:flex;justify-content:center;"><a href="https://yandex.ru/maps/172/ufa/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Уфа</a><a href="https://yandex.ru/maps/172/ufa/?from=mapframe&ll=56.028532%2C54.770634&mode=usermaps&source=mapframe&um=constructor%3ALJ7wHQK_l4qaRS3VG-PyEeT-QhVv8N7o&utm_medium=mapframe&utm_source=maps&z=16" style="color:#eee;font-size:12px;position:absolute;top:14px;border-radius:48px;border:3px solid #0d504d;">Яндекс Карты — транспорт, навигация, поиск мест</a><iframe src="https://yandex.ru/map-widget/v1/?from=mapframe&ll=56.028532%2C54.770634&mode=usermaps&source=mapframe&um=constructor%3ALJ7wHQK_l4qaRS3VG-PyEeT-QhVv8N7o&utm_source=mapframe&z=16" width="1330" height="600" frameborder="1" allowfullscreen="true" style="position:relative;border-radius:48px;border:5px solid #0d504d;"></iframe></div>
    <div class="six"><p><span><img src="/img/contact/car-icon.svg" alt="">Схема проезда</span></p></div>
    <div class="rectangle-white-container line-yellow-bottom">
        <p>Как до нас добраться на общественном транспорте: ежедневно ездят коммерческие автобусы от стадиона «Нефтяник» до с. Павловки!<br>
            <br>
            Расписание можно уточнить у водителей коммерческих автобусов по телефонам:<br>
            <a href="">+7 (927) 235-57-41</a><br>
            <a href="">+7 (927) 082-99-99</a><br>
           <a href="">+7 (960) 380-81-52</a><br>
            Добравшись до села Павловка, которое находится от нас в 7 км, вы можете вызвать такси. Все таксисты хорошо знают, где мы находимся, и с удовольствием довезут до нас.<br>
            <br>
            Телефоны такси в с. Павловке:<br>
            <a href="">+7 (927) 338-74-25</a><br>
            <a href="">+7 (927) 320-87-16</a><br>
            <a href="">+7 (937) 302-42-58</a><br>
            <a href="">+7 (917) 773-50-40</a><br>
        </p>
    </div>
    <div class="six"><p><span><img src="/img/contact/car-icon.svg" alt="">Как добраться на личном автотранспорте?</span></p></div>
    <div class="map-transport">
        <div style="position:relative;overflow:hidden;display:flex;justify-content:center;"><a href="https://yandex.ru/maps?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Яндекс Карты</a><a href="https://yandex.ru/maps/?from=mapframe&ll=56.450550%2C55.113268&mode=usermaps&source=mapframe&um=constructor%3A406970c28ecca9b127b75748359efb861956a3d8dbdce0cb0af8eded1cfe5eca&utm_medium=mapframe&utm_source=maps&z=9" style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс Карты — транспорт, навигация, поиск мест</a><iframe src="https://yandex.ru/map-widget/v1/?from=mapframe&ll=56.450550%2C55.113268&mode=usermaps&source=mapframe&um=constructor%3A406970c28ecca9b127b75748359efb861956a3d8dbdce0cb0af8eded1cfe5eca&utm_source=mapframe&z=9" width="1330" height="600" frameborder="1" allowfullscreen="true" style="position:relative;border-radius:48px;border:5px solid #0d504d;"></iframe></div>
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
