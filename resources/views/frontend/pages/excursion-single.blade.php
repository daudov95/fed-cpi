@extends('frontend.layouts.layout')

@section('custom_styles')
{{--    <link src="{{ asset('') }}">--}}
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
/>
@endsection

@section('content')
    <section class="section single-card">
        <div class="container">
            <div class="single-card__wrap">

                <!-- <h1 class="single-card__title">Tour 1</h1> -->

                <div class="single-card__block">
                    <div class="single-card-img">

                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @if(isset($excursion->schedules))
                                    @foreach($excursion->images as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ $image->link }}" alt="img">
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <div class="single-card-img__pagination">
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>

                    <h2 class="card-info__title">Описание</h2>
                    <div class="card">
                        <div class="card-info">
                            <h3 class="card-info__title">{{ $excursion->title }}</h3>
                            <p class="card-info__desc">{!! $excursion->description !!}</p>

                            <ul class="card-info__list">
                                <li class="card-info-item">
                                    <span class="card-info-item__title">Места показа:</span>
                                    <span class="card-info-item__value">{{ $excursion->place }}</span>
                                </li>
                                <li class="card-info-item">
                                    <span class="card-info-item__title">Допустимый возраст:</span>
                                    <span class="card-info-item__value">{{ $excursion->age }}</span>
                                </li>
                                <li class="card-info-item">
                                    <span class="card-info-item__title">Ближайшая дата:</span>
                                    <span class="card-info-item__value">30 ноября 2022 в 14:00</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-price">
                            <div class="card-price-block">
                                <h4 class="card-price-block__title">Продолжительность</h4>
                                <span class="card-price-block__text">4 часа</span>
                            </div>
                            <div class="card-price-block">
                                <h4 class="card-price-block__title">Цена за человека от</h4>
                                <span class="card-price-block__price">{{ $excursion->price }} руб.</span>
                            </div>
                            <a href="#timetable" class="card-price__btn card-price__scroll">Расписание</a>
                        </div>
                    </div>

                    <h2 class="card-info__title">Программа тура</h2>
                    <div class="card-info-program">
                        <div class="card-info-program__list">
{{--                            <li class="card-info-program__item">10.00 - Цветочный парк</li>--}}
{{--                            <li class="card-info-program__item">10.30 - Смотровая площадка высотного комплекса «Грозный Сити»</li>--}}
{{--                            <li class="card-info-program__item">11.00 - Мечеть им. Ахмата-Хаджи Кадырова «Сердце Чечни»</li>--}}
{{--                            <li class="card-info-program__item">12.00 - Центральная площадь им Кадырова</li>--}}
{{--                            <li class="card-info-program__item">12.30 - Пешеходный бульвар имени Махмуда Эсамбаева</li>--}}
{{--                            <li class="card-info-program__item">13.00 - Барский дом</li>--}}
{{--                            <li class="card-info-program__item">13.20 - Национальный музей Чеченской Республики</li>--}}
{{--                            <li class="card-info-program__item">14.00 - Смотровая площадка «Лестница в небеса»</li>--}}
{{--                            <li class="card-info-program__item">Место начала / Завершения тура: Грозный / Грозный</li>--}}
                            {!! $excursion->program !!}
                            <!-- <li class="card-info-program__item">Места показа: Россия, Чеченская Республика, г. Грозный</li> -->
                        </div>
                    </div>

                    <h2 class="card-info__title">В стоимость тура включено</h2>
                    <div class="card-info-program">
                        <ul class="card-info-program__list">
                            @foreach(explode(';', $excursion->including) as $include)
                                <li class="card-info-program__item">- {{ $include }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <h2 class="card-info__title" id="timetable">Расписание</h2>

                    <div class="single-card__table">

                        <ul class="single-card__list">
                            @if(isset($excursion->schedules))
                                @foreach($excursion->schedules as $schedule)
                                    <li class="single-card-item">
                                        <div class="single-card-item__date">
                                            <h4 class="single-card-item__title">Дата</h4>
                                            <span class="single-card-item__value">{{ $schedule->time }}</span>
                                        </div>
                                        <div class="single-card-item__price">
                                            <h4 class="single-card-item__title">Цена за человека от</h4>
                                            <span class="single-card-item__value">{{ $schedule->price }} руб.</span>
                                        </div>
                                        <div class="single-card-item__btn">
                                            <a href="#" class="card-price__btn">Забронировать</a>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>


                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection


@section('custom_scripts')
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            effect: "fade",
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2000,
                pauseOnMouseEnter: true
            },
        });
    </script>
@endsection
