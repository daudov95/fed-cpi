<footer class="footer">
    <div class="container">
        <div class="footer__wrap">
            <div class="header__wrap">
                <div class="header-logo">
                    <img src="{{ asset('assets/img/header/logo.png')  }}" class="header-logo__img" alt="Logo">
                </div>
                <div class="header-nav">
                    <ul class="header-nav__list">
                        <li class="header-nav__link"><a href="{{ route('index') }}">Главная</a></li>
                        <li class="header-nav__link"><a href="{{ route('about') }}">О нас</a></li>
                        <li class="header-nav__link"><a href="{{ route('events') }}">Мероприятия организации</a></li>
                        <li class="header-nav__link"><a href="{{ route('excursions') }}">Пушкинская карта</a></li>
                        <li class="header-nav__link"><a href="#">Законодательство</a></li>
                        <li class="header-nav__link"><a href="#">Контакты</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-info">
                <a href="#" class="footer-info__oferta">Оферта</a>
                <a href="#" class="footer-info__polician">Политика конфиденциальности</a>

                <span class="footer-info__copy">© company 2022</span>
            </div>
        </div>


    </div>
</footer>


<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('assets/js/custom.js')  }}"></script>
