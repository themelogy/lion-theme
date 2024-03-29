@extends('layouts.master')

@section('content')
    @component('partials.components.title')
        <h1 class="title">@lang('register::registers.title.heading')</h1>
    @endcomponent

    <div class="page-content mb20 step-form">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-12">
                    @include('register::stepper', ['step1' => 'active', 'step2'=>'active'])
                    @include('register::errors')
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
                        <fieldset v-if="collateral_id.length !== 0">
                            <legend>Araç Bilgisi</legend>
                            <template v-for="(vehicle, key) in vehicles">
                                <div class="credit_card-cars">
                                    <div>
                                        <div class="form-group @if($errors->first('vehicles.*.plate')) has-error @endif">
                                            <label for="plate"
                                                   v-if="key == 0">@lang('register::forms.form.vehicles.plate')</label>
                                            <input id="plate" :name="'vehicles['+key+'][plate]'"
                                                   placeholder="@lang('register::forms.form.vehicles.plate')"
                                                   class="form-control input-sm" v-model="vehicle.plate"/>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group @if($errors->first('vehicles.*.brand')) has-error @endif">
                                            <label for="brand"
                                                   v-if="key == 0">@lang('register::forms.form.vehicles.brand')</label>
                                            <input id="brand" :name="'vehicles['+key+'][brand]'"
                                                   placeholder="@lang('register::forms.form.vehicles.brand')"
                                                   class="form-control input-sm" v-model="vehicle.brand"/>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group @if($errors->first('vehicles.*.model')) has-error @endif">
                                            <label for="model"
                                                   v-if="key == 0">@lang('register::forms.form.vehicles.model')</label>
                                            <input id="brand" :name="'vehicles['+key+'][model]'"
                                                   placeholder="@lang('register::forms.form.vehicles.model')"
                                                   class="form-control input-sm" v-model="vehicle.model"/>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group @if($errors->first('vehicles.*.fuel')) has-error @endif">
                                            <label for="fuel"
                                                   v-if="key == 0">@lang('register::forms.form.vehicles.fuel')</label>
                                            <select id="fuel" :name="'vehicles['+key+'][fuel]'"
                                                    class="form-control" v-model="vehicle.fuel">
                                                <option v-for="(fuel, index) in fuels" :value="index">@{{ fuel }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group @if($errors->first('vehicles.*.kit')) has-error @endif">
                                            <label for="kit"
                                                   v-if="key == 0">@lang('register::forms.form.vehicles.kit')</label>
                                            <select id="kit" :name="'vehicles['+key+'][kit]'"
                                                    class="form-control" v-model="vehicle.kit">
                                                <option v-for="(kit, index) in kits" :value="index">@{{ kit }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label v-if="key == 0">&nbsp;</label>
                                        <div class="form-group" style="padding: 10px">
                                            <a class="btn-floating"
                                               v-on:click="addRow(key, 'vehicles')" v-if="vehicles.length < 20">
                                                <i class="fa fa-plus"></i></a>
                                            <a class="btn-floating"
                                               v-on:click="removeRow(key, 'vehicles')" v-if="vehicles.length > 1">
                                                <i class="fa fa-minus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </fieldset>
                    </transition>

                    <div class="row" v-if="collateral_id == credit_card">
                        <div class="col-md-12">
                            @lang('register::forms.form.credit_card.agreement1')
                            <div class="checkbox">
                                <label class="form-check @if($errors->first('credit_card.agree')) has-error @endif">
                                    <input name="credit_card[agree]" type="checkbox"
                                           value="1" {{ old('credit_card.agree', @$form->credit_card->agree) ? 'checked="checked"' : '' }}> @lang('register::forms.form.credit_card.agreement2')
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    {!! Form::submit(trans('register::forms.button.next'), ['class'=>'btn btn-primary mt-sm-10']) !!}

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
                vehicles: {!! old('vehicles', @$form->vehicles) ? json_encode(old('vehicles', @$form->vehicles)) : "[{ plate:'', brand: '', model: '', fuel: '1', kit: '1', }]" !!},
                fuels: {!! $fuelTypes->toJson() !!},
                kits: {!! $kitTypes->toJson() !!}
            },
            methods: {
                addRow: function (index, id) {
                    this.vehicles.splice(index + 1, 0, {});
                    this.vehicles[index + 1].fuel = '1';
                    this.vehicles[index + 1].kit = '1';
                },
                removeRow: function (index, id) {
                    this.vehicles.splice(index, 1);
                },
                collateralUpdate: function (index) {
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
        .credit_card-cars {
            display: flex;
            flex-wrap: wrap;
        }
        .credit_card-cars div:first-child {
            padding-left: 0;
        }
        .credit_card-cars div:last-child {
            padding-right: 0;
        }
        .credit_card-cars div {
            padding: 0 5px;
            flex-direction: row;
        }
        @media screen and (max-width: 800px) {
            .credit_card-cars div {
                flex-direction: column;
            }
        }
    </style>
    {!! Theme::script('js/jquery.mask.min.js') !!}
    <script>
        $(document).ready(function () {
            $('#credit_card_no').mask('0000 0000 0000 0000');
            $('#end_date').mask('00/0000', {placeholder: "__/____"});
            $('#cvv').mask('000');
            $('#provision_amount').mask('000000000000000', {reverse: true});
            $('#phone').mask('(000) 000 00 00')
        });
    </script>
@endpush