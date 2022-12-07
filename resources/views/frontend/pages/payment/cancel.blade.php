@extends('frontend.layouts.layout')

@section('content')
    <section class="section about">
        <div class="container">
            <div class="about__wrap">

                <h1 class="page-title">Вы отменили заказ</h1>

                <p class="about-info__text">
                    Вы можете заново оформить в разделе <a href="{{ route('excursions') }}">Пушкинская карта</a>
                </p>
            </div>
        </div>

    </section>
@endsection
