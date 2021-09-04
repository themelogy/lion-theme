@extends('layouts.master')

@section('content')
    @component('partials.components.title')
        <h1 class="title">@lang('register::registers.title.heading')</h1>
    @endcomponent

    <div class="page-content mb20 step-form" id="step-form">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-12">

                    @include('register::stepper', ['step1' => 'active', 'step2'=>'active', 'step3' => 'active', 'step4' => 'active', 'step5'=>'active'])

                    @component('register::errors')
                        @if($errors->any())
                            <div class="alert alert-warning">
                                @foreach($errors->all() as $message)
                                    {{ $message }}
                                @endforeach
                            </div>
                        @endif
                    @endcomponent

                    {!! Form::open(['route' => ['register.form.step-5.put'], 'method' => 'post', 'class' => 'form']) !!}


                    <div class="table-responsive">
                        <table class="table table-striped">
                            <caption><h5 class="theme-txt-color">@lang('register::forms.stepper.step-1')</h5></caption>
                            <tr>
                                <th>@lang('register::forms.form.reference_no')</th>
                                <td colspan="3">: {{ $form->reference_no }}</td>
                            </tr>
                            <tr>
                                <th style="width: 25%">@lang('register::forms.form.company')</th>
                                <td>: {{ $form->company }}</td>
                                <th>@lang('register::forms.form.identity_no') :</th>
                                <td>: {{ $form->identity_no }}</td>
                            </tr>
                            <tr>
                                <th>@lang('register::forms.form.signatory') :</th>
                                <td>: {{ $form->signatory }}</td>
                                <th>@lang('register::forms.form.email') :</th>
                                <td>: {{ $form->email }}</td>
                            </tr>
                            <tr>
                                <th>@lang('register::forms.form.work_phone') :</th>
                                <td>: {{ $form->work_phone }}</td>
                                <th>@lang('register::forms.form.mobile_phone') :</th>
                                <td>: {{ $form->mobile_phone }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <caption><h5 class="theme-txt-color">@lang('register::forms.stepper.step-2')</h5></caption>
                            <tr>
                                <th style="width: 25%;">@lang('register::forms.form.collateral_id')</th>
                                <td>: <strong>{{ mb_strtoupper($form->collateral()->where('id', $form->collateral_id)->first()->title) }}</strong></td>
                            </tr>
                            @if($form->collateral_id == setting('register::credit-card'))
                            <tr>
                                <th>@lang('register::forms.form.credit_card.name_surname')</th>
                                <td>: {!! $form->credit_card->name_surname !!}</td>
                            </tr>
                            <tr>
                                <th>@lang('register::forms.form.credit_card.bank')</th>
                                <td>: {!! $form->credit_card->bank !!}</td>
                            </tr>
                            <tr>
                                <th>@lang('register::forms.form.credit_card.no')</th>
                                <td>: {!! str_pad(substr($form->credit_card->no, -7), strlen($form->credit_card->no), '*', STR_PAD_LEFT); !!}</td>
                            </tr>
                            <tr>
                                <th>@lang('register::forms.form.credit_card.end_date')</th>
                                <td>: {!! $form->credit_card->end_date !!}</td>
                            </tr>
                            <tr>
                                <th>@lang('register::forms.form.credit_card.cv')</th>
                                <td>: {!! $form->credit_card->cv !!}</td>
                            </tr>
                            <tr>
                                <th>@lang('register::forms.form.credit_card.provision_amount')</th>
                                <td>: {!! number_format($form->credit_card->provision_amount, 2) !!} TL</td>
                            </tr>
                            <tr>
                                <th>@lang('register::forms.form.credit_card.phone')</th>
                                <td>: {!! $form->credit_card->phone !!}</td>
                            </tr>
                            <tr>
                                <th>@lang('register::forms.form.credit_card.address')</th>
                                <td>: {!! $form->credit_card->address !!}</td>
                            </tr>
                            @if(isset($form->vehicles))
                            <tr>
                                <th>@lang('register::forms.form.vehicles.vehicles')</th>
                                <td>
                                    @foreach($form->vehicles as $vehicle)
                                    <div style="display: inline-flex;">
                                        <div style="padding: 10px 20px" class="thumbnail">
                                            <h4>{{ $vehicle->plate }}</h4>
                                            <p>
                                                {{ $vehicle->brand.' '.$vehicle->model }}<br/>
                                                {{ $fuelTypes->get($vehicle->fuel) }}<br/>
                                                {{ $kitTypes->get($vehicle->kit) }}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                </td>
                            </tr>
                            @endif
                            @endif
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-responsive">
                            <caption><h5 class="theme-txt-color">@lang('register::forms.stepper.step-3')</h5></caption>
                            <tr>
                                <th style="width: 25%;">@lang('register::forms.form.collateral_amount')</th>
                                <td>: {{ number_format($form->collateral_amount, 2) }} TL</td>
                                <th style="width: 25%;">@lang('register::forms.form.monthly_consumption')</th>
                                <td>: {{ number_format($form->monthly_consumption, 2) }} TL</td>
                            </tr>
                            <tr>
                                <th style="width: 25%;">@lang('register::forms.collateral.discount percentage')</th>
                                <td>: %{{ $rate['percent'] }}</td>
                                <th style="width: 25%;">@lang(('register::forms.collateral.discount consumption'))</th>
                                <td>: {!! number_format(($rate['percent'] / 100) * $form->monthly_consumption, 2) !!} TL</td>
                            </tr>
                            @if(isset($rate['file']))
                            <tr>
                                <th style="width: 25%;">@lang('register::forms.collateral.forms')</th>
                                <td>
                                    @if(is_array($rate['file']))
                                        @foreach($rate['file'] as $file)
                                            {!! Html::link(url($file['path']), $file['filename']) !!}<br/>
                                        @endforeach
                                    @else
                                        {!! Html::link(url($rate['file']['path']), $rate['file']['filename']) !!}
                                    @endif
                                </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            @endif
                        </table>
                    </div>

                    @if(isset($form_files))
                    <div class="table-responsive">
                        <table class="table table-responsive">
                            <caption><h5 class="theme-txt-color">@lang('register::forms.stepper.step-4')</h5></caption>
                            <tr>
                                <th style="width: 25%;">@lang('register::forms.title.docs')</th>
                                <td>
                                    @foreach($form_files as $file)
                                        <a href="{{ url('assets/register/'.$file->name) }}">{{ $file->name }}</a><br/>
                                    @endforeach

                                </td>
                            </tr>
                        </table>
                    </div>
                    @endif

                    @if(isset($form->vehicles))
                        @if(array_search("1", array_column($form->vehicles, "kit")) !== false)
                            {!! Form::normalTextarea('shipping_address', trans('register::forms.form.shipping_address'), $errors, $form, ['class'=>'form-control', 'rows'=>4]) !!}
                        @endif
                    @endif

                    <div class="checkbox">
                        <label class="form-check @if($errors->first('agreement1')) has-error @endif">
                            <input name="agreement1" type="checkbox" value="1" {{ @$form->agreement1 || old('agreement1') == 1 ? 'checked="checked"' : '' }}>
                            <a @click="showPage({{ Widget::get('page', ['aslanlar-petrol-kisisel-verilerin-korunmasi-ve-islenmesi-proseduru', 'id']) }})">
                                {{ Widget::get('page', ['aslanlar-petrol-kisisel-verilerin-korunmasi-ve-islenmesi-proseduru', 'title']) }}
                            </a>
                            @lang('register::forms.agreement.check1')
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label class="form-check @if($errors->first('agreement2')) has-error @endif">
                            <input name="agreement2" type="checkbox" value="1" {{ @$form->agreement2 || old('agreement2') == 1 ? 'checked="checked"' : '' }}>
                            <a @click="showPage({{ Widget::get('page', ['musteri-aydinlatma-metni', 'id']) }})">
                                @page('musteri-aydinlatma-metni', 'title')
                            </a>
                            @lang('register::forms.agreement.check2')
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    {!! Form::submit(trans('register::forms.button.complete form'), ['class'=>'btn btn-primary mt-sm-10']) !!}

                    {!! Form::close() !!}

                    <modal v-if="showModal" @close="showModal = false">
                        <div slot="header" v-html="showTitle">@lang('register::forms.messages.loading')</div>
                        <div slot="body" v-html="showHtml">@lang('register::forms.messages.loading')</div>
                    </modal>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-stack')
    <script src="{{ Module::asset('register:js/vue.js') }}"></script>
    <script src="{{ Module::asset('register:js/axios.min.js') }}"></script>
    <script type="text/x-template" id="modal-template">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper container">
                    <div class="modal-container">
                        <div class="modal-header">
                            <h3 class="theme-txt-color"><slot name="header"></slot></h3>
                        </div>
                        <div class="modal-body">
                            <slot name="body"></slot>
                        </div>
                        <div class="modal-footer">
                            <slot name="footer">
                                <button class="btn btn-primary modal-default-button" @click="$emit('close')">
                                    Okudum ve Anladım
                                </button>
                            </slot>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </script>
@endpush

@push('js-stack')
    <script>
        Vue.component("modal", {
            template: "#modal-template"
        });
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        new Vue({
            el: "#step-form",
            data: {
                showModal: false,
                showHtml: "",
                showTitle: ""
            },
            methods: {
                showPage: function (pageId) {
                    this.showModal = true;
                    this.showTitle = "Yükleniyor..."
                    this.showHtml = "Yükleniyor..."
                    axios.get('{{ route('api.page.get') }}?page_id='+pageId)
                        .then(response => {
                            this.showHtml = response.data.data.body;
                            this.showTitle = response.data.data.title;
                        })
                }
            }
        });
    </script>
    <style>
        .modal-mask {
            position: fixed;
            z-index: 9998;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: table;
            transition: opacity 0.3s ease;
        }

        .modal-wrapper {
            display: table-cell;
            vertical-align: middle;
        }

        .modal-container {
            max-width: 800px;
            margin: 0px auto;
            padding: 20px 30px;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
            transition: all 0.3s ease;
            font-family: Helvetica, Arial, sans-serif;
        }

        .modal-header h3 {
            margin-top: 0;
            color: #42b983;
        }

        .modal-body {
            margin: 20px 0;
            margin-right: 20px;
            height: 300px;
            overflow: auto;
            width: 100%;
        }

        .modal-body > div {
            max-width: 100%;
            margin: 0;
        }

        .modal-default-button {
            float: right;
        }

        /*
         * The following styles are auto-applied to elements with
         * transition="modal" when their visibility is toggled
         * by Vue.js.
         *
         * You can easily play with the modal transition by editing
         * these styles.
         */

        .modal-enter {
            opacity: 0;
        }

        .modal-leave-active {
            opacity: 0;
        }

        .modal-enter .modal-container,
        .modal-leave-active .modal-container {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

    </style>
@endpush
