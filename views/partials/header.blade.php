<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WG6CNPM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header id="main-header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('partials.header.top-user')
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <nav class="navbar">
            <div class="navbar-header">
                <a class="logo" href="{{ LaravelLocalization::getLocalizedURL(locale(), route('homepage')) }}">
                    <img src="{{ Theme::url('img/logo.svg') }}" alt="{{ setting('theme::company-name') }}" />
                    <span class="hidden">{{ setting('theme::company-name') }}</span>
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headermobile" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="headermobile">
                {!! Menu::render('header', \Themes\Lion\Presenter\HeaderMenuPresenter::class) !!}
            </div>
        </nav>
    </div>
</header>
