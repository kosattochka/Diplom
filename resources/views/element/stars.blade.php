@php
    // Округляем рейтинг до ближайшего целого числа
    $roundedRating = round($rating);

    // Вычисляем количество жёлтых и серых звёзд
    $yellowStars = $roundedRating;
    $greyStars = 5 - $yellowStars;
@endphp

<div class="star-rating">
    <!-- Жёлтые звёзды -->
    @for ($i = 0; $i < $yellowStars; $i++)
        <img src='/img/star.svg' alt="Yellow Star" class="star">
    @endfor

    <!-- Серые звёзды -->
    @for ($i = 0; $i < $greyStars; $i++)
        <img src='/img/star-grey.svg' alt="Grey Star" class="star">
    @endfor
</div>
