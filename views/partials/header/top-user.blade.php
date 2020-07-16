<div class="top-user-area clearfix">
    <ul class="top-user-area-list list list-horizontal list-border">
        <li>
            <div class="top-link">
                <a href="#"><i class="fa fa-credit-card mr5"></i> <span class="hidden-xs">ONLINE ÖDE</span></a>
            </div>
        </li>
        <li>
            <div class="top-link">
                <a href="#"><i class="fa fa-car mr5"></i> <span class="hidden-xs">TAŞIT TANIMA SİSTEMİ</span></a>
            </div>
        </li>
        <li>
            @include('partials.components.socials', ['listClass'=>'list list-horizontal list-space top-socials', 'iconClass'=>''])
        </li>
        @auth
            <li class="top-user-area-avatar nav-drop">
                <a>
                    <img class="origin round" src="{{ $user->present()->gravatar() }}" alt="{{ $currentUser->fullname }}" title="{{ $currentUser->fullname }}" />{{ $currentUser->fullname }}
                </a>
                <ul class="list nav-drop-menu">
                    <li><a href="{{ route('dashboard.index') }}">Yönetim Paneli</a></li>
                </ul>
            </li>
            <li><a href="{{ LaravelLocalization::getLocalizedURL(locale(), route('logout')) }}">Çıkış</a></li>
        @endauth
        <li class="top-user-area-lang nav-drop">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                <strong>{{ mb_strtoupper(LaravelLocalization::getCurrentLocaleNative()) }}</strong><i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i>
            </a>
            <ul class="list nav-drop-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale)
                    <li>
                        <a href="{{ url($locale) }}">
                            <span>{{ mb_strtoupper($supportedLocale['native']) }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</div>
