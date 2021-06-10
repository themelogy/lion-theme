@extends('layouts.master')

@section('content')
    @component('partials.components.title')
        <h1 class="title">TAŞIT TANIMA SİSTEMİ ONLİNE BAŞVURU</h1>
    @endcomponent

    <div class="page-content mb20 step-form">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-12">
                    @include('register::stepper', ['step1' => 'active', 'step2'=>'active'])
                    {!! Form::open(['route' => ['register.form.step-2.put'], 'method' => 'post', 'class' => 'form', 'id'=>'step-form']) !!}

                    <div class="form__group">
                        <div class="form__radio-group" v-for="(collateral, index) in collateral_types">
                            <input v-model="collateral_id" type="radio" name="collateral_id" class="form__radio-input"
                                   :id="'collateral-' + collateral.id" :value="collateral.id">
                            <label :for="'collateral-' + collateral.id " class="form__radio-label">
                                <span class="form__radio-button"></span>
                                @{{ collateral.title }}
                            </label>
                        </div>
                    </div>

                    @if($errors->first('collateral_id'))
                        <div class="alert alert-danger">
                            {{ $errors->first('collateral_id') }}
                        </div>
                    @endif

                    <transition name="slide-fade">
                        <fieldset v-if="collateral_id == credit_card">
                            <legend>Kredi Kartı Bilgileri</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::arrayInput('credit_card[name_surname]', trans('register::forms.form.credit_card.name_surname'), $errors, $form) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::arrayInput('credit_card[bank]', trans('register::forms.form.credit_card.bank'), $errors, $form) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::arrayInput('credit_card[no]', trans('register::forms.form.credit_card.no'), $errors, $form, ['id'=>'credit_card_no']) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::arrayInput('credit_card[end_date]', trans('register::forms.form.credit_card.end_date'), $errors, $form, ['id'=>'end_date']) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::arrayInput('credit_card[cv]', trans('register::forms.form.credit_card.cv'), $errors, $form, ['id'=>'cvv']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::arrayInputGroup('credit_card[provision_amount]', trans('register::forms.form.credit_card.provision_amount'), $errors, $form, ['id'=>'provision_amount', 'style'=>'text-align:right;'], 'TL') !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::arrayInput('credit_card[phone]', trans('register::forms.form.credit_card.phone'), $errors, $form, ['id'=>'phone']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::arrayInput('credit_card[address]', trans('register::forms.form.credit_card.address'), $errors, $form, ['class'=>'form-control', 'rows'=>4]) !!}
                                </div>
                            </div>
                        </fieldset>
                    </transition>

                    <transition name="slide-fade">
                    <fieldset v-if="collateral_id == credit_card">
                        <legend>Araç Bilgisi</legend>
                        <template v-for="(car, key) in cars">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="plate" v-if="key == 0">@lang('register::forms.form.credit_card.cars_plate')</label>
                                        <input id="plate" :name="'credit_card[cars]['+key+'][plate]'" placeholder="@lang('register::forms.form.credit_card.cars_plate')" class="form-control input-sm" v-model="car.plate" />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label v-if="key == 0">&nbsp;</label>
                                    <div class="form-group">
                                        <a class="btn-floating"
                                           v-on:click="addRow(key, 'cars')" v-if="cars.length < 20">
                                            <i class="fa fa-plus"></i></a>
                                        <a class="btn-floating"
                                           v-on:click="removeRow(key, 'cars')" v-if="cars.length > 1">
                                            <i class="fa fa-minus"></i></a>
                                    </div>
                                </div>
                            </div>
                            {{ $errors->first('credit_card.cars.*.plate') }}
                        </template>
                    </fieldset>
                    </transition>

                    <div class="row" v-if="collateral_id == credit_card">
                        <div class="col-md-12">
                            Kullanım bedellerini provizyon tutarı üzerinden yukarıda belirttiğim Kredi Kartı hesabıma borç kaydediniz. Şahsi bilgileriniz, (kredi kartı, adres, e-mail, telefon veya müşteri numarası vb.) bu bilgiler, sizin haberiniz veya onayınız olmadan ya da yasal yükümlülük altında bulunmadığı sürece 3. şahıslara kesinlikle verilmeyecektir. Bu bilgiler, en yüksek güvenlik ve gizlilik standartlarımızla korunacaktır. Bu sorumluluk firmamız tarafından, yerine getirilemediği takdirde bütün sorumluğu kayıtsız şartsız kabul etmektedir.
                            <div class="checkbox">
                                <label class="form-check @if($errors->first('credit_card.agree')) has-error @endif">
                                    <input name="credit_card[agree]" type="checkbox" value="1" {{ @$form->credit_card->agree ? 'checked="checked"' : '' }}> Onay Bilgisi (Yukarıda belirttiğim araç plakalarının alımlarını yukarıda belirtmiş olduğum kredi kartından tahsil ediniz. Bilginize sunulur.)
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    {!! Form::submit('İLERİ', ['class'=>'btn btn-primary mt-sm-10']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-inline')
    {!! Theme::script('js/vue.js') !!}

    <script>
        new Vue({
            el: '#step-form',
            data: {
                collateral_id: '{{ old('collateral_id', $form->collateral_id) }}',
                credit_card: '{{ setting('register::credit-card') }}',
                collateral_types: {!! $collateralTypes !!},
                cars : {!! isset($form->credit_card->cars) ? json_encode($form->credit_card->cars) : "[{ plate: '' }]" !!}
            },
            methods: {
                addRow: function (index, id) {
                    this.cars.splice(index + 1, 0, {});
                },
                removeRow: function (index, id) {
                    this.cars.splice(index, 1);
                },
                collateralUpdate: function(index) {
                    this.collateral_code = this.collateral_types[index].code;
                }
            }
        })
    </script>
    <style>
        .slide-fade-enter-active {
            transition: all .3s ease;
        }

        .slide-fade-leave-active {
            transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
        }

        .slide-fade-enter, .slide-fade-leave-to
            /* .slide-fade-leave-active below version 2.1.8 */
        {
            transform: translateX(10px);
            opacity: 0;
        }
    </style>
    {!! Theme::script('js/jquery.mask.min.js') !!}
    <script>
        $(document).ready(function(){
            $('#credit_card_no').mask('0000 0000 0000 0000');
            $('#end_date').mask('00/0000', {placeholder: "__/____"});
            $('#cvv').mask('000');
            $('#provision_amount').mask('000000000000000', {reverse: true});
            $('#phone').mask('(000) 000 00 00')
        });
    </script>
@endpush