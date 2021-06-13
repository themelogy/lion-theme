@extends('layouts.master')

@section('content')
    @component('partials.components.title')
        <h1 class="title">@lang('register::registers.title.heading')</h1>
    @endcomponent

    <div class="page-content mb20 step-form">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron text-center">
                        <p><i class="fa fa-check" style="color:green; font-size: 3rem;"></i></p>
                        <h1 class="display-3">Başvurunuz Tamamlandı!</h1>
                        <p class="lead">Başvurunuz ile ilgili lütfen e-postanızı kontrol edin.</p>
                        <hr>
                        <p>
                            Sorun yaşıyorsanız? <a href="{{ route('contact') }}">Bizimle İletişime Geçin</a>
                        </p>
                        <p class="lead">
                            <a class="btn btn-primary btn-sm" href="{{ url('') }}" role="button">Anasayfa'ya Dön</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-stack')
    {!! Theme::script('js/jquery.mask.min.js') !!}
    <script>
        $(document).ready(function(){
            $('#collateral_amount').mask('000000000000000', {reverse: true});
            $('#monthly_consumption').mask('000000000000000', {reverse: true});
        });
    </script>
@endpush