@extends('layouts.master')

@section('content')
    @component('partials.components.title')
        <h1 class="title">@lang('register::registers.title.heading')</h1>
    @endcomponent

    <div class="page-content mb20 step-form">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-12">

                    @if($errors->any())
                        <div class="alert alert-warning">
                        @foreach($errors->all() as $message)
                            {{ $message }}
                        @endforeach
                        </div>
                    @endif

                    @include('register::stepper', ['step1' => 'active', 'step2'=>'active', 'step3' => 'active', 'step4' => 'active', 'step5'=>'active'])

                    {!! Form::open(['route' => ['register.form.step-5.put'], 'method' => 'post', 'class' => 'form']) !!}

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <caption><h5 class="theme-txt-color">Başvuru Bilgileri</h5></caption>
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
                                <td>: {{ $form->work_phone }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <caption><h5 class="theme-txt-color">Teminat Türü</h5></caption>
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
                                <td>: {!! str_pad(substr($form->credit_card->no, -11), strlen($form->credit_card->no), '*', STR_PAD_LEFT); !!}</td>
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
                            @if(isset($form->credit_card->cars))
                            <tr>
                                <th>@lang('register::forms.form.credit_card.cars')</th>
                                <td>
                                    @foreach($form->credit_card->cars as $car)
                                    <div style="display: inline-flex;">
                                        <div style="padding: 10px 20px" class="thumbnail">
                                            <h4>{{ $car->plate }}</h4>
                                            <p>
                                                {{ $car->department }}<br/>
                                                {{ $car->brand.' '.$car->model }}<br/>
                                                {{ $car->fuel }}<br/>
                                                {{ $car->kit }}
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
                            <caption><h5 class="theme-txt-color">Teminat/Tüketim</h5></caption>
                            <tr>
                                <th style="width: 25%;">@lang('register::forms.form.collateral_amount')</th>
                                <td>: {{ number_format($form->collateral_amount, 2) }} TL</td>
                                <th style="width: 25%;">@lang('register::forms.form.monthly_consumption')</th>
                                <td>: {{ number_format($form->monthly_consumption, 2) }} TL</td>
                            </tr>
                            <tr>
                                <th style="width: 25%;">İskonto Yüzdesi</th>
                                <td>: %{{ $rate['percent'] }}</td>
                                <th style="width: 25%;">Aylık Tüketim Oranına Göre İndirim</th>
                                <td>: {!! number_format(($rate['percent'] / 100) * $form->monthly_consumption, 2) !!} TL</td>
                            </tr>
                            @if(isset($rate['file']))
                            <tr>
                                <th style="width: 25%;">Teminat Formları</th>
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
                            <caption><h5 class="theme-txt-color">Başvuru Belgeleri</h5></caption>
                            <tr>
                                <th style="width: 25%;">Belgeler</th>
                                <td>
                                    @foreach($form_files as $file)
                                        <a href="{{ url('assets/register/'.$file->name) }}">{{ $file->name }}</a><br/>
                                    @endforeach

                                </td>
                            </tr>
                        </table>
                    </div>
                    @endif

                    @if(isset($form->credit_card->cars))
                        @if(array_search("Automatic Kart", array_column($form->credit_card->cars, "kit")) !== false)
                            {!! Form::normalTextarea('shipping_address', trans('register::forms.form.shipping_address'), $errors, $form, ['class'=>'form-control', 'rows'=>4]) !!}
                        @endif
                    @endif

                    <div class="checkbox">
                        <label class="form-check @if($errors->first('agreement1')) has-error @endif">
                            <input name="agreement1" type="checkbox" value="1" {{ @$form->agreement1 || old('agreement1') == 1 ? 'checked="checked"' : '' }}> @page('aslanlar-petrol-kisisel-verilerin-korunmasi-ve-islenmesi-proseduru', 'link')  sayfamızda bulunan "KVKK PROSEDÜRÜ" nü okudum ve onaylıyorum.
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label class="form-check @if($errors->first('agreement2')) has-error @endif">
                            <input name="agreement2" type="checkbox" value="1" {{ @$form->agreement2 || old('agreement2') == 1 ? 'checked="checked"' : '' }}> @page('musteri-aydinlatma-metni', 'link')  sayfamızda bulunan "MÜŞTERİ AYDINLATMA METNİ" ve "TTS MÜŞTERİ AYDINLATMA METNİ" 'ni okudum ve onaylıyorum.
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    {!! Form::submit(trans('register::forms.button.complete form'), ['class'=>'btn btn-primary mt-sm-10']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-stack')
    {!! Theme::script('js/vue.js') !!}
@endpush