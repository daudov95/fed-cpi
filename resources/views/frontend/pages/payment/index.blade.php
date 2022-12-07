@extends('frontend.layouts.layout')

@section('content')
    <section class="section about">
        <div class="container">
            <div class="about__wrap">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin-bottom: 0px">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success')}}
                    </div>
                @endif

                <h1 class="page-title">Заполните форму для оформления заказа</h1>

                <form action="{{ route('payment.store', ['id' => 1]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $schedule->id }}">
                    <input type="text" name="name" placeholder="ФИО" class="contacts-form__input">
                    <input type="text" name="phone" placeholder="Телефон" class="contacts-form__input">
                    <input type="email" name="email" placeholder="E-mail" class="contacts-form__input">
                    <button type="submit" class="contacts-form__btn card-price__btn">Оформить</button>
                </form>

            </div>
        </div>

    </section>
@endsection
