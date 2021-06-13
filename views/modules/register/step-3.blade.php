@extends('layouts.master')

@section('content')
    @component('partials.components.title')
        <h1 class="title">@lang('register::registers.title.heading')</h1>
    @endcomponent

    <div class="page-content mb20 step-form">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-12">

                    @include('register::stepper', ['step1' => 'active', 'step2'=>'active', 'step3' => 'active'])
                    {!! Form::open(['route' => ['register.form.step-3.put'], 'method' => 'post', 'class' => 'form', 'id'=>'step-form']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::normalInputGroup('collateral_amount', trans('register::forms.form.collateral_amount'), $errors, $form, ['style'=>'text-align:right;'], 'TL') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::normalInputGroup('monthly_consumption', trans('register::forms.form.monthly_consumption'), $errors, $form, ['style'=>'text-align:right;', 'v-on:keydown' => 'onPageDown', 'v-on:change' => 'onPageDown', 'v-model'=>'monthly_consumption'], 'TL') !!}
                        </div>
                    </div>

                    <transition name="slide-fade">
                    <div class="row" v-if="percent && price">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th style="width: 25%;">İskonto Yüzdesi</th>
                                    <td>: @{{ percent }}</td>
                                    <th style="width: 25%;">Aylık Tüketim Oranına Göre İndirim</th>
                                    <td>: @{{ price }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    </transition>

                    <transition name="slide-fade">
                    <div class="loading" v-if="loading == false">
                        Oranlar Yükleniyor...
                    </div>
                    </transition>

                    {!! Form::submit(trans('register::forms.button.next'), ['class'=>'btn btn-primary mt-sm-10']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-stack')
    {!! Theme::script('js/vue.js') !!}
    {!! Theme::script('js/axios.min.js') !!}
    <script>
        new Vue({
            el: '#step-form',
            data: {
                monthly_consumption: '{{ old('monthly_consumption', @$form->monthly_consumption) }}',
                timeout: null,
                percent: null,
                price: null,
                loading: false
            },
            mounted() {
              this.onPageDown();
            },
            methods: {
                onPageDown: function() {
                    clearTimeout(this.timeout);
                    this.percent = null;
                    this.price = null;
                    this.loading = false;
                    if( this.monthly_consumption > 0) {
                        this.timeout = setTimeout(()=>{
                            axios.post('{{ route('register.form.rates') }}', {
                                monthly_consumption: this.monthly_consumption
                            })
                                .then(response=>{
                                    this.percent = '%' + response.data.percent;
                                    this.price = response.data.price + ' TL';
                                    this.loading = true;
                                })
                                .catch(function (error){
                                    console.log(error);
                                });
                        }, 800);
                    }
                }
            }
        });
    </script>
    {!! Theme::script('js/jquery.mask.min.js') !!}
    <script>
        $(document).ready(function(){
            $('#collateral_amount').mask('000000000000000', {reverse: true});
            $('#monthly_consumption').mask('000000000000000', {reverse: true});
        });
    </script>
@endpush