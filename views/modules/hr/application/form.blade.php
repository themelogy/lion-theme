@extends('layouts.master')

@section('content')

    @component('partials.components.title', ['breadcrumbs'=>'hr.application.form'])
        <h1 class="title">{{ trans('hr::applications.title.application') }}</h1>
    @endcomponent

    <section class="page-content mb20" id="app">
        <div class="container">
            <div class="page-wrapper">
                <div class="content-wrapper">
                    <div class="section-padding md-p-top-bot-50 section-page" id="app">
                        <div class="container">
                            {!! Form::open(['v-on:submit'=>'submitForm', 'files'=>true, 'method'=>'post']) !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Kişisel Bilgiler -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group" :class="{ 'has-error' : formErrors.first_name }">
                                                <label class="browser-default">{{ trans('hr::applications.form.first_name') }}</label>
                                                <input class="form-control" id="first_name" type="text"
                                                       placeholder="{{ trans('hr::applications.form.first_name') }}"
                                                       v-model="application.first_name">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group" :class="{ 'has-error' : formErrors.last_name }">
                                                <label>{{ trans('hr::applications.form.last_name') }}</label>
                                                <input class="form-control" id="last_name" type="text"
                                                       placeholder="{{ trans('hr::applications.form.last_name') }}"
                                                       v-model="application.last_name">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['contact.gsm'] }">
                                                <label>{{ trans('hr::applications.form.contacts.gsm') }}</label>
                                                <input class="form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.contacts.gsm') }}"
                                                       v-model="application.contact.gsm">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['contact.email'] }">
                                                <label>{{ trans('hr::applications.form.contacts.email') }}</label>
                                                <input class="form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.contacts.email') }}"
                                                       v-model="application.contact.email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group"
                                                 :class="{ 'has-error' : formErrors['contact.address1'] }">
                                                <label>{{ trans('hr::applications.form.contacts.address1') }}</label>
                                                <input class="form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.contacts.address1') }}"
                                                       v-model="application.contact.address1">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['contact.county'] }">
                                                <label>{{ trans('hr::applications.form.contacts.county') }}</label>
                                                <input class="form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.contacts.county') }}"
                                                       v-model="application.contact.county">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['contact.city'] }">
                                                <label>{{ trans('hr::applications.form.contacts.city') }}</label>
                                                <select class="form-control select"
                                                        v-model="application.contact.city">
                                                    @foreach(HrInformation::city()->lists() as $key => $city)
                                                        <option value="{{ $key }}">{{ $city }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="fileinput fileinput-new" data-provides="fileinput" :class="{ 'has-error' : formErrors['application.attachment'] }">
                                <span class="btn btn-warning btn-file" v-show="!application.attachment">
                                    <span>{{ trans('hr::applications.form.attachment') }}</span>
                                    <input id="attachment" type="file" name="attachment" @change="onFileChange" />
                                </span>
                                                <button class="btn btn-danger" @click="removeFile" v-show="application.attachment">{{ trans('hr::applications.form.attachment delete') }}</button>
                                                <span class="fileinput-filename" v-show="application.attachment"></span>
                                                <span class="fileinput-new"> {{ trans('hr::applications.form.attachment not found') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <!-- Save Button -->
                                    <div class="row">
                                        <div class="col-md-12 m-top-bot-20">
                                            <p class="font-12">{{ trans('hr::applications.messages.notice') }}</p>
                                        </div>
                                    </div>
                                    @if(!setting('hr::user-login'))
                                        <div class="row">
                                            <div class="col-md-12 m-top-bot-20">
                                                {!! Captcha::image('captcha_hr') !!}
                                            </div>
                                        </div>
                                    @endif
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-12 m-top-20">
                                            {!! Form::submit(trans('hr::applications.buttons.create'), ['class'=>'btn btn-primary', 'v-bind:value'=>'button']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js-stack')
    <script src="{!! Module::asset('hr:js/underscore-min.js') !!}"></script>
    <script src="{!! Module::asset('hr:js/loadingoverlay.min.js') !!}"></script>
    <script src="{!! Module::asset('hr:js/loadingoverlay_progress.min.js') !!}"></script>
    <script src="{!! Module::asset('hr:js/pnotify.js') !!}"></script>
    <link rel="stylesheet" href="{!! Module::asset('hr:css/pnotify.css') !!}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.js"></script>
    @if(App::environment()=='production')
        <script src="{!! Module::asset('hr:js/vue.min.js') !!}"></script>
    @else
        <script src="{!! Module::asset('hr:js/vue.js') !!}"></script>
    @endif
    <script src="{!! Module::asset('hr:js/axios.min.js') !!}"></script>
    <script src="{!! Module::asset('hr:js/vue-bootstrap-datetimepicker.min.js') !!}"></script>
@endpush

@push('js-inline')
    <script>
        @if(App::environment()=='local')
            Vue.config.devtools = true;
        @endif
            window.axios.defaults.headers.common['X-CSRF-TOKEN']     = '{{ csrf_token() }}';
        window.axios.defaults.headers.common['Cache-Control']    = 'no-cache';
        function appendFormdata(FormData, data, name){
            name = name || '';
            if (typeof data === 'object'){
                $.each(data, function(index, value){
                    if (name == ''){
                        appendFormdata(FormData, value, index);
                    } else {
                        appendFormdata(FormData, value, name + '['+index+']');
                    }
                })
            } else {
                FormData.append(name, data);
            }
        }
        function pnotifiy (errors, type='error') {
            var html = "<ul>";
            if(type=='error') {
                html += _.map(errors, function (error, key) {
                    if(typeof error[0] === 'object') {
                        er = '';
                        _.each(error[0], function(e,k){
                            if(k === 'file')
                                er += "<li>" + e + "</li>";
                        });
                        return er;
                    }
                    return "<li>" + error + "</li>";
                }).join('');
            } else {
                html += errors;
            }
            html += "</ul>";
            PNotify.prototype.options.styling = "bootstrap3";
            new PNotify({
                title: '{{ trans('hr::applications.title.application') }}',
                text: html,
                type: type
            });
        }
        new Vue({
            el: '#app',
            data: {
                application: {
                    contact: {
                        city: 6
                    },
                    language: [
                        { lang: '' }
                    ],
                    attachment: '',
                    captcha_hr: ''
                },
                newApplication: {
                    contact: {
                        city: 6
                    },
                    language: [
                        { lang: '' }
                    ],
                    attachment: '',
                    captcha_hr: ''
                },
                formData: new FormData(),
                formErrors: {},
                button: '{{ trans('hr::applications.buttons.create') }}'
            },
            mounted: function() {
                if(this.application.language.length === 0) {
                    this.addRow(0, this.application.language);
                }
            },
            methods: {
                onFileChange: function (e) {
                    e.preventDefault();
                    var files = e.target.files || e.dataTransfer.files;
                    this.application.attachment = files[0];
                    this.formData.append('attachment', files[0]);
                },
                removeFile: function (e) {
                    e.preventDefault();
                    this.application.attachment = '';
                    this.formData.delete('attachment');
                },
                resetFile: function() {
                    this.application.attachment = '';
                    this.formData.delete('attachment');
                    $('#attachment').val('');
                },
                submitForm: function (e) {
                    e.preventDefault();
                    this.application.captcha_hr = grecaptcha.getResponse(captcha_hr);
                    appendFormdata(this.formData, this.application);
                    this.applicationUpdate('{{ route('api.hr.application.create') }}', this.formData);
                },
                applicationUpdate: function(route, data) {
                    this.ajaxStart(true);
                    axios.post(route, data, {
                        headers: { 'Content-Type': 'multipart/form-data' }
                    }).then(response => {
                        this.ajaxStart(false);
                        pnotifiy(response.data.message, "success");
                        this.formErrors = {};
                        this.formData = new FormData();
                        this.application = this.getDefaults();
                        this.resetFile();
                    }).catch(error => {
                        this.ajaxStart(false);
                        pnotifiy(error.response.data.message);
                        this.formErrors = error.response.data.message;
                    });
                    grecaptcha.reset(captcha_hr);
                },
                getDefaults: function() {
                    return _.clone(this.newApplication);
                },
                addRow: function (index, id) {
                    id.splice(index + 1, 0, {});
                    id[index+1].lang = '';
                },
                removeRow: function (index, id) {
                    id.splice(index, 1);
                },
                ajaxStart: function (loading) {
                    if (loading) {
                        $('#app').LoadingOverlay("show");
                    } else {
                        $('#app').LoadingOverlay("hide");
                    }
                }
            }
        });
    </script>
@endpush

@push('css-inline')
    <style>
        .has-error label {
            color: darkred;
        }

        fieldset {
            margin-top: 20px;
        }

        label {
            font-size: 12px;
        }

        [type="radio"]:not(:checked) + label, [type="radio"]:checked + label {
            padding-left: 25px;
            padding-right: 5px;
        }

        .btn-floating {
            width: 30px;
            height: 30px;
            line-height: 30px;
            cursor: pointer;
        }

        .btn-floating i {
            line-height: 30px;
        }

        .notify {
            padding: 10px 5px 0 5px;
        }

        .notify p {
            line-height: 12px;
        }
    </style>
@endpush

@if(!setting('hr::user-login'))
    @push('js-inline')
        {!! Captcha::setLang(locale())->scriptWithCallback(['captcha_hr']) !!}
    @endpush
@endif
