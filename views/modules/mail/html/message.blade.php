@component('mail::layout')
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ setting('core::site-name') }}
        @endcomponent
    @endslot

    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            {{ setting('theme::address') }} <br/> {{ setting('theme::phone') }} - {{ setting('theme::email') }}<br/>
            &copy; {{ date('Y') }} {{ setting('theme::company-name') }}. Tüm hakları saklıdır.
        @endcomponent
    @endslot
@endcomponent
