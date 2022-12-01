@extends('frontend.layouts.layout')

@section('content')
    <section class="section single-card">
        <div class="container">
            <div class="single-card__wrap">

                <!-- <h1 class="single-card__title">Tour 1</h1> -->

                <div class="single-card__block">
                    <div class="single-card-img">

                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://chechentour.com/images/jatoms/tours/ekskursiya-na-oz-kezenoj-am-s-audiogidom/729d3c3dc6184d07b0e97a478d52212c.jpeg" alt="img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://groznycityhotel.ru/wp-content/uploads/2016/04/chechnya-2013.jpg" alt="img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://img.geliophoto.com/grozny/00_grozny.jpg" alt="img">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://chechentour.com/images/jatoms/tours/ekskursiya-na-oz-kezenoj-am-s-audiogidom/729d3c3dc6184d07b0e97a478d52212c.jpeg" alt="img">
                                </div>
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
                            <h3 class="card-info__title">Экскурсия по Грозному</h3>
                            <p class="card-info__desc">Во время экскурсии Вас ждет рассказ про историю города, улиц и проспектов, памятники, парки, места отдыха, удивительный колорит, гостеприимство и неповторимая кавказская кухня. Взойдем на смотровую площадку Комплекса Грозный Сити и насладимся видами города с высоты птичьего полета. Мечеть Сердце Чечни откроет нам двери в духовный мир. Национальный музей Чеченской Республики проведет нас путями истории из глуби веков в наши дни. Алея Славы напомнит нам о героях советского союза. А музей Ахмат Хаджи Кадырова поможет нам понять истинный смысл героического самопожертвования на пути служению своему народу. Стадион Ахмат Арена завершит прекрасный день и закрепит прекрасные впечатления.</p>

                            <ul class="card-info__list">
                                <li class="card-info-item">
                                    <span class="card-info-item__title">Места показа:</span>
                                    <span class="card-info-item__value">Россия, Чеченская Республика, г. Грозный</span>
                                </li>
                                <li class="card-info-item">
                                    <span class="card-info-item__title">Допустимый возраст:</span>
                                    <span class="card-info-item__value">6+</span>
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
                                <span class="card-price-block__price">1000 руб.</span>
                            </div>
                            <a href="#timetable" class="card-price__btn card-price__scroll">Расписание</a>
                        </div>
                    </div>

                    <h2 class="card-info__title">Программа тура</h2>
                    <div class="card-info-program">
                        <ul class="card-info-program__list">
                            <li class="card-info-program__item">10.00 - Цветочный парк</li>
                            <li class="card-info-program__item">10.30 - Смотровая площадка высотного комплекса «Грозный Сити»</li>
                            <li class="card-info-program__item">11.00 - Мечеть им. Ахмата-Хаджи Кадырова «Сердце Чечни»</li>
                            <li class="card-info-program__item">12.00 - Центральная площадь им Кадырова</li>
                            <li class="card-info-program__item">12.30 - Пешеходный бульвар имени Махмуда Эсамбаева</li>
                            <li class="card-info-program__item">13.00 - Барский дом</li>
                            <li class="card-info-program__item">13.20 - Национальный музей Чеченской Республики</li>
                            <li class="card-info-program__item">14.00 - Смотровая площадка «Лестница в небеса»</li>
                            <li class="card-info-program__item">Место начала / Завершения тура: Грозный / Грозный</li>
                            <!-- <li class="card-info-program__item">Места показа: Россия, Чеченская Республика, г. Грозный</li> -->
                        </ul>
                    </div>

                    <h2 class="card-info__title">В стоимость тура включено</h2>
                    <div class="card-info-program">
                        <ul class="card-info-program__list">
                            <li class="card-info-program__item">- Трансфер</li>
                            <li class="card-info-program__item">- Услуги гида</li>
                            <li class="card-info-program__item">- Обед</li>
                            <li class="card-info-program__item">- Входные билеты на смотровую площадку</li>
                        </ul>
                    </div>

                    <h2 class="card-info__title" id="timetable">Расписание</h2>

                    <div class="single-card__table">

                        <ul class="single-card__list">

                            <li class="single-card-item">
                                <div class="single-card-item__date">
                                    <h4 class="single-card-item__title">Дата</h4>
                                    <span class="single-card-item__value">01.12.2022</span>
                                </div>
                                <div class="single-card-item__price">
                                    <h4 class="single-card-item__title">Цена за человека от</h4>
                                    <span class="single-card-item__value">1000 руб.</span>
                                </div>
                                <div class="single-card-item__btn">
                                    <button class="card-price__btn">Забронировать</button>
                                </div>
                            </li>

                            <li class="single-card-item">
                                <div class="single-card-item__date">
                                    <h4 class="single-card-item__title">Дата</h4>
                                    <span class="single-card-item__value">05.12.2022</span>
                                </div>
                                <div class="single-card-item__price">
                                    <h4 class="single-card-item__title">Цена за человека от</h4>
                                    <span class="single-card-item__value">5000 руб.</span>
                                </div>
                                <div class="single-card-item__btn">
                                    <button class="card-price__btn">Забронировать</button>
                                </div>
                            </li>

                        </ul>


                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
