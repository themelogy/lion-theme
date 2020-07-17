<footer id="main-footer" class="footer2">
    <div class="container">
        <div class="row pb20">
            <div class="col-lg-3 col-sm-12 col-xs-12">
                <a class="logo" href="{{ LaravelLocalization::getLocalizedURL(locale(), route('homepage')) }}">
                    <img src="{{ Theme::url('img/logo.svg') }}" alt="{{ setting('theme::company-name') }}" title="{{ setting('theme::company-name') }}" style="text-align: left;" />
                </a>
                @include('partials.components.socials', ['listClass'=>'list list-horizontal list-space social mb10 pull-left-lg', 'iconClass'=>'box-icon-normal round animate-icon-bottom-to-top'])

                {{--<img src="{{ Theme::url('img/store-icons.png') }}" alt="App Store and Google Play" style="max-width: 200px;" />--}}
            </div>
            @inject("menuService", "Modules\Menu\Services\MenuService")
            <div class="col-lg-3 col-sm-12 col-xs-12">
                <h5>{{ $menuService->title('corporate') }}</h5>
                {!! Menu::render('corporate', \Themes\Lion\Presenter\FooterMenuLinksPresenter::class) !!}
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12">
                <h5>{{ $menuService->title('services') }}</h5>
                {!! Menu::render('services', \Themes\Lion\Presenter\FooterMenuLinksPresenter::class) !!}
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12">
                <h5>{{ $menuService->title('products') }}</h5>
                {!! Menu::render('products', \Themes\Lion\Presenter\FooterMenuLinksPresenter::class) !!}
            </div>
        </div>
        {{--<div class="row">--}}
            {{--{!! Menu::render('footer', \Themes\Zirve\Presenter\FooterMenuPresenter::class) !!}--}}
        {{--</div>--}}
    </div>
    <div class="footer-bottom">
        <div class="ankara-bg"></div>
        <div class="container">
            <div class="col-lg-8 col-sm-12">
                <div class="footer-bottom-links" style="float:left;">
                    {!! Menu::render('footer', \Themes\Zirve\Presenter\FooterMenuPresenter::class) !!}
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <p class="copyrights pull-right-lg">{{ setting('core::site-name') }} &copy; 2006 Tüm hakları saklıdır.</p>
            </div>
        </div>
    </div>
</footer>
