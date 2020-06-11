@extends('layouts.master')

@section('content')

    @component('partials.components.title', ['breadcrumb'=>'hr.application.form'])
        <h1 class="title">{{ trans('hr::applications.title.application') }}</h1>
    @endcomponent

    <section class="section-padding pb20 section-page" id="app">
        <div class="container">
            {!! Form::open(['v-on:submit'=>'submitForm', 'files'=>true, 'method'=>'post']) !!}
            <div class="row">
                <div class="col-md-12">
                    <!-- Kişisel Bilgiler -->
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.personal') }}</h2></legend>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>{{ trans('hr::applications.form.gender') }}</label>
                                            <select class="form-control select" name="gender"
                                                    v-model="application.gender">
                                                @foreach(HrApplication::gender()->lists() as $key => $gender)
                                                    <option value="{{ $key }}">{{ $gender }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>{{ trans('hr::applications.form.nationality') }}</label>
                                            <select class="form-control select" name="nationality"
                                                    v-model="application.nationality">
                                                @foreach(HrApplication::nationality()->lists() as $key => $gender)
                                                    <option value="{{ $key }}">{{ $gender }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>{{ trans('hr::applications.form.marital') }}</label>
                                            <select class="form-control" name="marital"
                                                    v-model="application.marital">
                                                @foreach(HrApplication::marital()->lists() as $key => $marital)
                                                    <option value="{{ $key }}">{{ $marital }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!-- Kimlik Bilgisi -->
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.identity') }}</h2></legend>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"
                                             :class="{ 'has-error' : formErrors['identity.birthdate'] }">
                                            <label class="browser-default">{{ trans('hr::applications.form.identity.birthdate') }}</label>
                                            <date-picker v-model="application.identity.birthdate" input-class="browser-default" :config="config.date" placeholder="{{ trans('hr::applications.form.identity.birthdate') }}"></date-picker>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"
                                             :class="{ 'has-error' : formErrors['identity.birthplace'] }">
                                            <label>{{ trans('hr::applications.form.identity.birthplace') }}</label>
                                            <select class="form-control select"
                                                    v-model="application.identity.birthplace">
                                                @foreach(HrInformation::city()->lists() as $key => $city)
                                                    <option value="{{ $key }}">{{ $city }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ trans('hr::applications.form.identity.bloodgroup') }}</label>
                                            <select class="form-control select"
                                                    v-model="application.identity.blood_group">
                                                @foreach(HrApplication::bloodgroup()->lists() as $key => $blood)
                                                    <option value="{{ $key }}">{{ $blood }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['identity.no'] }">
                                            <label class="browser-default">{{ trans('hr::applications.form.identity.no') }}</label>
                                            <input class="form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.identity.no') }}"
                                                   v-model="application.identity.no">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="browser-default">{{ trans('hr::applications.form.identity.sgk') }}</label>
                                            <input class="form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.identity.sgk') }}"
                                                   v-model="application.identity.sgk">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="browser-default">{{ trans('hr::applications.form.identity.tax') }}</label>
                                            <input class="form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.identity.tax') }}"
                                                   v-model="application.identity.tax">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!-- İletişim Bilgileri -->
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.contact') }}</h2></legend>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"
                                             :class="{ 'has-error' : formErrors['contact.address1'] }">
                                            <label>{{ trans('hr::applications.form.contacts.address1') }}</label>
                                            <input class="form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.contacts.address1') }}"
                                                   v-model="application.contact.address1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"
                                             :class="{ 'has-error' : formErrors['contact.address2'] }">
                                            <label>{{ trans('hr::applications.form.contacts.address2') }}</label>
                                            <input class="form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.contacts.address2') }}"
                                                   v-model="application.contact.address2">
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
                                    <div class="col-md-3">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['contact.phone'] }">
                                            <label>{{ trans('hr::applications.form.contacts.phone') }}</label>
                                            <input class="form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.contacts.phone') }}"
                                                   v-model="application.contact.phone">
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
                                        <div class="form-group"
                                             :class="{ 'has-error' : formErrors['contact.postcode'] }">
                                            <label>{{ trans('hr::applications.form.contacts.postcode') }}</label>
                                            <input class="form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.contacts.postcode') }}"
                                                   v-model="application.contact.postcode">
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
                            </fieldset>
                        </div>
                    </div>
                    <!-- Sürücü Belgesi -->
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.driver') }}</h2></legend>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['driving.type'] }">
                                            <label>{{ trans('hr::applications.form.driver.type') }}</label>
                                            <select class="form-control select"
                                                    v-model="application.driving.type">
                                                @foreach(HrApplication::driving()->lists() as $key => $gender)
                                                    <option value="{{ $key }}">{{ $gender }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['driving.no'] }">
                                            <label>{{ trans('hr::applications.form.driver.no') }}</label>
                                            <input class="form-control" type="text"
                                                   placeholder="{{ trans('hr::applications.form.driver.no') }}"
                                                   v-model="application.driving.no">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['driving.issue_at'] }">
                                            <label>{{ trans('hr::applications.form.driver.issue_at') }}</label>
                                            <date-picker v-model="application.driving.issue_at" input-class="browser-default" :config="config.year" placeholder="{{ trans('hr::applications.form.driver.issue_at') }}"></date-picker>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!-- Sağlık Durumu -->
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.health') }}</h2></legend>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>{{ trans('hr::applications.form.health_desc') }}</label>

                                            <input type="radio" id="health.no" value="0" v-model="application.health.status" v-on:click="application.health.desc = ''" />
                                            <label for="health.no">{{ trans('hr::applications.select.no') }}</label>

                                            <input type="radio" id="health.yes" value="1" v-model="application.health.status" />
                                            <label for="health.yes">{{ trans('hr::applications.select.yes') }}</label>

                                            <div v-if="application.health.status == 1">
                                                <input class="form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.health') }}"
                                                       v-model="application.health.desc">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!-- Sabıka Durumu -->
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend>{{ trans('hr::applications.legend.criminal') }}</legend>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>{{ trans('hr::applications.form.criminal_desc') }}</label>

                                            <input type="radio" id="criminal.no" value="0" v-model="application.criminal.status" v-on:click="application.criminal.desc = ''" />
                                            <label for="criminal.no">{{ trans('hr::applications.select.no') }}</label>

                                            <input type="radio" id="criminal.yes" value="1" v-model="application.criminal.status" />
                                            <label for="criminal.yes">{{ trans('hr::applications.select.yes') }}</label>

                                            <div v-if="application.criminal.status == 1">
                                                <input class="form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.criminal') }}"
                                                       v-model="application.criminal.desc">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!-- Kişisel Beceriler -->
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.skills') }}</h2></legend>
                                <div v-for="(skill, key) in application.skills">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label v-if="key == 0">{{ trans('hr::applications.select.skills.program') }}</label>
                                                <select class="form-control" class="select" v-model="skill.program">
                                                    @foreach(HrApplication::skill()->lists() as $key => $skill)
                                                        <option value="{{ $key }}" {{ $loop->first ? 'selected' : null }}>{{ $skill }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" v-if="skill.program == 7">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['skills.'+key+'.other'] }">
                                                <label v-if="key == 0">{{ trans('hr::applications.select.skills.other') }}</label>
                                                <input class="form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.select.skills.other') }}"
                                                       v-model="skill.other">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label v-if="key == 0">{{ trans('hr::applications.select.skills.level') }}</label>
                                            <div class="form-group" :class="{ 'has-error' : formErrors['skills.'+key+'.level'] }">
                                                <input type="radio" :id="'level.better'+key" value="4" v-model="skill.level"/>
                                                <label :for="'level.better'+key">{{ trans('hr::applications.select.skills.radio.better') }}</label>

                                                <input type="radio" :id="'level.good'+key" value="3" v-model="skill.level"/>
                                                <label :for="'level.good'+key">{{ trans('hr::applications.select.skills.radio.good') }}</label>

                                                <input type="radio" :id="'level.middle'+key" value="2" v-model="skill.level"/>
                                                <label :for="'level.middle'+key">{{ trans('hr::applications.select.skills.radio.middle') }}</label>

                                                <input type="radio" :id="'level.little'+key" value="1" v-model="skill.level"/>
                                                <label :for="'level.little'+key">{{ trans('hr::applications.select.skills.radio.little') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label v-if="key == 0">&nbsp;</label>
                                            <div class="form-group">
                                                <a class="btn-floating"
                                                   v-on:click="addRow(key, 'skills')"
                                                   v-if="application.skills.length < {{ count(HrApplication::skill()->lists()) }}"><i class="fa fa-plus"></i></a>
                                                <a class="btn-floating" v-on:click="removeRow(key, 'skills')" v-if="key > 0"><i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!-- Yabancı Dil Bilgisi -->
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.language') }}</h2></legend>
                                <div v-for="(lang, key) in application.language" v-if="key < {{ count(HrApplication::language()->lists()) }}">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label v-if="key == 0">{{ trans('hr::applications.select.language.lang') }}</label>
                                                <select class="form-control" class="select" v-model="lang.lang">
                                                    @foreach(HrApplication::language()->lists() as $key => $language)
                                                        <option value="{{ $key }}" {{ $loop->first ? 'selected' : null }}>{{ $language }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label v-if="key == 0">{{ trans('hr::applications.select.language.speak') }}</label>
                                                    <div class="form-group">
                                                        <input type="radio" :id="'speak.better'+key" value="3"
                                                               v-model="lang.speak"/>
                                                        <label :for="'speak.better'+key">{{ trans('hr::applications.select.language.radio.better') }}</label>

                                                        <input type="radio" :id="'speak.middle'+key" value="2"
                                                               v-model="lang.speak"/>
                                                        <label :for="'speak.middle'+key">{{ trans('hr::applications.select.language.radio.middle') }}</label>

                                                        <input type="radio" :id="'speak.little'+key" value="1"
                                                               v-model="lang.speak"/>
                                                        <label :for="'speak.little'+key">{{ trans('hr::applications.select.language.radio.little') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label v-if="key == 0">{{ trans('hr::applications.select.language.read') }}</label>
                                                    <div class="form-group">
                                                        <input type="radio" :id="'read.better'+key" value="3"
                                                               v-model="lang.read"/>
                                                        <label :for="'read.better'+key">{{ trans('hr::applications.select.language.radio.better') }}</label>

                                                        <input type="radio" :id="'read.middle'+key" value="2"
                                                               v-model="lang.read"/>
                                                        <label :for="'read.middle'+key">{{ trans('hr::applications.select.language.radio.middle') }}</label>

                                                        <input type="radio" :id="'read.little'+key" value="1"
                                                               v-model="lang.read"/>
                                                        <label :for="'read.little'+key">{{ trans('hr::applications.select.language.radio.little') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label v-if="key == 0">{{ trans('hr::applications.select.language.write') }}</label>
                                                    <div class="group">
                                                        <input type="radio" :id="'write.better'+key" value="3"
                                                               v-model="lang.write"/>
                                                        <label :for="'write.better'+key">{{ trans('hr::applications.select.language.radio.better') }}</label>

                                                        <input type="radio" :id="'write.middle'+key" value="2"
                                                               v-model="lang.write"/>
                                                        <label :for="'write.middle'+key">{{ trans('hr::applications.select.language.radio.middle') }}</label>

                                                        <input type="radio" :id="'write.little'+key" value="1"
                                                               v-model="lang.write"/>
                                                        <label :for="'write.little'+key">{{ trans('hr::applications.select.language.radio.little') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label v-if="key == 0">&nbsp;</label>
                                            <div class="form-group">
                                                <a class="btn-floating"
                                                   v-on:click="addRow(key, 'language')"
                                                   v-if="application.language.length < {{ count(HrApplication::language()->lists()) }}"><i class="fa fa-plus"></i></a>
                                                <a class="btn-floating"
                                                   v-on:click="removeRow(key, 'language')" v-if="key > 0"><i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!-- Öğrenim Durumu -->
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.education') }}</h2></legend>
                                <div v-for="(educate, key) in application.education">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['education.'+key+'.start_at'] }">
                                                        <label v-if="key == 0" class="browser-default">{{ trans('hr::applications.form.educate.start_at') }}</label>
                                                        <date-picker v-model="educate.start_at" input-class="browser-default" :config="config.date" placeholder="{{ trans('hr::applications.form.educate.start_at') }}"></date-picker>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['education.'+key+'.end_at'] }">
                                                        <label v-if="key == 0" class="browser-default">{{ trans('hr::applications.form.educate.end_at') }}</label>
                                                        <date-picker v-model="educate.end_at" input-class="browser-default" :config="config.date" placeholder="{{ trans('hr::applications.form.educate.end_at') }}"></date-picker>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['education.'+key+'.name'] }">
                                                        <label v-if="key == 0">{{ trans('hr::applications.form.educate.name') }}</label>
                                                        <input class="form-control" type="text"
                                                               placeholder="{{ trans('hr::applications.form.educate.name') }}"
                                                               v-model="educate.name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['education.'+key+'.branch'] }">
                                                        <label v-if="key == 0">{{ trans('hr::applications.form.educate.branch') }}</label>
                                                        <input class="form-control" type="text"
                                                               placeholder="{{ trans('hr::applications.form.educate.branch') }}"
                                                               v-model="educate.branch">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['education.'+key+'.status'] }">
                                                        <label v-if="key == 0">{{ trans('hr::applications.form.educate.status') }}</label>
                                                        <select class="form-control" class="select"
                                                                v-model="educate.status">
                                                            @foreach(HrApplication::educationStatus()->lists() as $key => $status)
                                                                <option value="{{ $key }}">{{ $status }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label v-if="key == 0">&nbsp;</label>
                                                    <div class="form-group">
                                                        <a class="btn-floating"
                                                           v-on:click="addRow(key, 'education')"
                                                           v-if="application.education.length < {{ count(HrCriteria::education()->lists()) }}"><i class="fa fa-plus"></i></a>
                                                        <a class="btn-floating"
                                                           v-on:click="removeRow(key, 'education')" v-if="key > 0"><i class="fa fa-minus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!-- Kurs ve Eğitimler -->
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.course') }}</h2></legend>
                                <div v-for="(cours, key) in application.course">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['course.'+key+'.name'] }">
                                                <label v-if="key == 0">{{ trans('hr::applications.form.courses.name') }}</label>
                                                <input class="form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.courses.name') }}"
                                                       v-model="cours.name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['course.'+key+'.company'] }">
                                                <label v-if="key == 0">{{ trans('hr::applications.form.courses.company') }}</label>
                                                <input class="form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.courses.company') }}"
                                                       v-model="cours.company">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['course.'+key+'.issue_at'] }">
                                                <label v-if="key == 0" class="browser-default">{{ trans('hr::applications.form.courses.date') }}</label>
                                                <date-picker v-model="cours.issue_at" input-class="browser-default" :config="config.date" placeholder="{{ trans('hr::applications.form.courses.date') }}"></date-picker>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label v-if="key == 0">&nbsp;</label>
                                            <div class="form-group">
                                                <a class="btn-floating"
                                                   v-on:click="addRow(key, 'course')" v-if="application.course.length < 6"><i class="fa fa-plus"></i></a>
                                                <a class="btn-floating"
                                                   v-on:click="removeRow(key, 'course')" v-if="key > 0"><i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!-- İş Tecrübesi -->
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.experience') }}</h2></legend>
                                <div v-for="(exper, key) in application.experience">
                                    <div class="row m-bot-20">
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['experience.'+key+'.start_at'] }">
                                                        <label v-if="key == 0" class="browser-default">{{ trans('hr::applications.form.experiences.start_at') }}</label>
                                                        <date-picker v-model="exper.start_at" input-class="browser-default" :config="config.date" placeholder="{{ trans('hr::applications.form.experiences.start_at') }}"></date-picker>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['experience.'+key+'.end_at'] }">
                                                        <label v-if="key == 0" class="browser-default">{{ trans('hr::applications.form.experiences.end_at') }}</label>
                                                        <date-picker v-model="exper.end_at" input-class="browser-default" :config="config.date" placeholder="{{ trans('hr::applications.form.experiences.end_at') }}"></date-picker>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group" :class="{ 'has-error' : formErrors['experience.'+key+'.company'] }">
                                                                <label v-if="key == 0">{{ trans('hr::applications.form.experiences.company') }}</label>
                                                                <input class="form-control" type="text"
                                                                       placeholder="{{ trans('hr::applications.form.experiences.company') }}"
                                                                       v-model="exper.company">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group" :class="{ 'has-error' : formErrors['experience.'+key+'.department'] }">
                                                                <label v-if="key == 0">{{ trans('hr::applications.form.experiences.department') }}</label>
                                                                <input class="form-control" type="text"
                                                                       placeholder="{{ trans('hr::applications.form.experiences.department') }}"
                                                                       v-model="exper.department">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group" :class="{ 'has-error' : formErrors['experience.'+key+'.position'] }">
                                                                <label v-if="key == 0">{{ trans('hr::applications.form.experiences.position') }}</label>
                                                                <input class="form-control" type="text"
                                                                       placeholder="{{ trans('hr::applications.form.experiences.position') }}"
                                                                       v-model="exper.position">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['experience.'+key+'.reason'] }">
                                                        <label v-if="key < 0">{{ trans('hr::applications.form.experiences.reason') }}</label>
                                                        <input class="form-control" type="text"
                                                               placeholder="{{ trans('hr::applications.form.experiences.reason') }}"
                                                               v-model="exper.reason">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <label v-if="key < 0">{{ trans('hr::applications.form.experiences.title_desc') }}</label>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group" :class="{ 'has-error' : formErrors['experience.'+key+'.full_name'] }">
                                                                <input class="form-control" type="text"
                                                                       placeholder="{{ trans('hr::applications.form.experiences.full_name') }}"
                                                                       v-model="exper.full_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group" :class="{ 'has-error' : formErrors['experience.'+key+'.title'] }">
                                                                <input class="form-control" type="text"
                                                                       placeholder="{{ trans('hr::applications.form.experiences.title') }}"
                                                                       v-model="exper.title">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group" :class="{ 'has-error' : formErrors['experience.'+key+'.phone'] }">
                                                                <input class="form-control" type="text"
                                                                       placeholder="{{ trans('hr::applications.form.experiences.phone') }}"
                                                                       v-model="exper.phone">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label v-if="key == 0">&nbsp;</label>
                                            <div class="form-group">
                                                <a class="btn-floating"
                                                   v-on:click="addRow(key, 'experience')" v-if="application.experience.length < 5">
                                                    <i class="fa fa-plus"></i></a>
                                                <a class="btn-floating"
                                                   v-on:click="removeRow(key, 'experience')" v-if="key > 0">
                                                    <i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!-- Referanslar -->
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.reference') }}</h2></legend>
                                <div v-for="(ref, key) in application.reference">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['reference.'+key+'.full_name'] }">
                                                <label v-if="key == 0">{{ trans('hr::applications.form.references.full_name') }}</label>
                                                <input class="form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.references.full_name') }}"
                                                       v-model="ref.full_name">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['reference.'+key+'.work_place'] }">
                                                <label v-if="key == 0">{{ trans('hr::applications.form.references.work_place') }}</label>
                                                <input class="form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.references.work_place') }}"
                                                       v-model="ref.work_place">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['ref.position'] }">
                                                        <label v-if="key == 0">{{ trans('hr::applications.form.references.position') }}</label>
                                                        <input class="form-control" type="text"
                                                               placeholder="{{ trans('hr::applications.form.references.position') }}"
                                                               v-model="ref.position">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['ref.proximity'] }">
                                                        <label v-if="key == 0">{{ trans('hr::applications.form.references.proximity') }}</label>
                                                        <input class="form-control" type="text"
                                                               placeholder="{{ trans('hr::applications.form.references.proximity') }}"
                                                               v-model="ref.proximity">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" :class="{ 'has-error' : formErrors['reference.'+key+'.phone'] }">
                                                        <label v-if="key == 0">{{ trans('hr::applications.form.references.phone') }}</label>
                                                        <input class="form-control" type="text"
                                                               placeholder="{{ trans('hr::applications.form.references.phone') }}"
                                                               v-model="ref.phone">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label v-if="key == 0">&nbsp;</label>
                                            <div class="form-group">
                                                <a class="btn-floating"
                                                   v-on:click="addRow(key, 'reference')" v-if="application.reference.length < 5"><i class="fa fa-plus"></i></a>
                                                <a class="btn-floating"
                                                   v-on:click="removeRow(key, 'reference')" v-if="key > 0"><i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p><small>{{ trans('hr::applications.form.references.description') }}</small></p>
                            </fieldset>
                        </div>
                    </div>
                    <!-- Başvuru Bilgileri -->
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.request') }}</h2></legend>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['request.price'] }">
                                            <label class="browser-default">{{ trans('hr::applications.form.requests.price') }}</label>
                                            <input class="form-control" id="first_name" type="text"
                                                   placeholder="{{ trans('hr::applications.form.requests.price') }}"
                                                   v-model="application.request.price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['request.work_time'] }">
                                            <label>{{ trans('hr::applications.form.requests.work_time') }}</label>
                                            <select class="form-control" class="select"
                                                    v-model="application.request.work_time">
                                                @foreach(HrInformation::worktime()->lists() as $key => $status)
                                                    <option value="{{ $key }}">{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['request.department'] }">
                                            <label>{{ trans('hr::positions.form.position.department') }}</label>
                                            <select class="form-control" class="select"
                                                    v-model="application.request.department">
                                                @foreach(HrInformation::department()->lists() as $key => $status)
                                                    <option value="{{ $key }}">{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['request.travel'] }">
                                            <label>{{ trans('hr::applications.form.requests.travel') }}</label>
                                            <select class="form-control" class="select"
                                                    v-model="application.request.travel">
                                                <option value="0">{{ trans('hr::applications.select.select') }}</option>
                                                <option value="1">{{ trans('hr::applications.select.no') }}</option>
                                                <option value="2">{{ trans('hr::applications.select.yes') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" :class="{ 'has-error' : formErrors['request.job_rotation'] }">
                                            <label>{{ trans('hr::applications.form.requests.job_rotation') }}</label>
                                            <select class="form-control" class="select"
                                                    v-model="application.request.job_rotation">
                                                <option value="0">{{ trans('hr::applications.select.select') }}</option>
                                                <option value="1">{{ trans('hr::applications.select.no') }}</option>
                                                <option value="2">{{ trans('hr::applications.select.yes') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!-- Acil Durumlarda Haber Vereceğiniz Kişiler-->
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><h2>{{ trans('hr::applications.legend.emergency') }}</h2></legend>
                                <div v-for="(emr, key) in application.emergency">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['emergency.'+key+'.full_name'] }">
                                                <label v-if="key == 0">{{ trans('hr::applications.form.emergencies.full_name') }}</label>
                                                <input class="form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.emergencies.full_name') }}"
                                                       v-model="emr.full_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" :class="{ 'has-error' : formErrors['emergency.'+key+'.phone'] }">
                                                <label v-if="key == 0">{{ trans('hr::applications.form.emergencies.phone') }}</label>
                                                <input class="form-control" type="text"
                                                       placeholder="{{ trans('hr::applications.form.emergencies.phone') }}"
                                                       v-model="emr.phone">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label v-if="key == 0">&nbsp;</label>
                                            <div class="form-group">
                                                <a class="btn-floating"
                                                   v-on:click="addRow(key, 'emergency')" v-if="application.emergency.length < 5">
                                                    <i class="fa fa-plus"></i></a>
                                                <a class="btn-floating"
                                                   v-on:click="removeRow(key, 'emergency')" v-if="key > 0">
                                                    <i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
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
                            {!! Form::submit(trans('hr::applications.buttons.create'), ['class'=>'btn btn-default btn btn-primary btn-bordered', 'v-bind:value'=>'button']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push('js-stack')
<script src="{!! Module::asset('hr:js/underscore-min.js') !!}"></script>
<script src="{!! Module::asset('hr:js/loadingoverlay.min.js') !!}"></script>
<script src="{!! Module::asset('hr:js/loadingoverlay_progress.min.js') !!}"></script>
<script src="{!! Module::asset('hr:js/pnotify.js') !!}"></script>
<link rel="stylesheet" href="{!! Module::asset('hr:css/pnotify.css') !!}"/>
<script src="{!! Module::asset('hr:js/moment.min.js') !!}"></script>
<script src="{!! Module::asset('hr:js/tr.js') !!}"></script>
<script src="{!! Module::asset('hr:js/bootstrap-datetimepicker.min.js') !!}"></script>
<link rel="stylesheet" href="{!! Module::asset('hr:css/bootstrap-datetimepicker.min.css') !!}" />
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
    Vue.prototype.$http = axios;
    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    window.axios.defaults.headers.common['X-CSRF-TOKEN']     = '{{ csrf_token() }}';
    @if($currentUser)
        window.axios.defaults.headers.common['Authorization']    = 'Bearer {{ $currentUser->getFirstApiKey() }}';
    @endif
    window.axios.defaults.headers.common['Cache-Control'] = 'no-cache';
    Vue.component('date-picker', VueBootstrapDatetimePicker.default);
    var app = new Vue({
        el: '#app',
        data: {
            config: {
                date: {
                    format: 'DD.MM.YYYY',
                    extraFormats: [moment.ISO_8601, 'DD.MM.YYYY']
                },
                year: {
                    format: 'YYYY',
                    extraFormats: [moment.ISO_8601, 'YYYY']
                }
            },
            application: {
                id: '',
                gender: 1,
                first_name: '{{ $currentUser ? $currentUser->first_name : '' }}',
                last_name: '{{ $currentUser ? $currentUser->last_name : '' }}',
                nationality: 1,
                marital: 2,
                health: { status: 0, desc: '' },
                criminal: { status: 0, desc: '' },
                captcha_hr: null,
                identity: {
                    birthdate: null,
                    blood_group: 0,
                    birthplace: 6
                },
                driving: {
                    type: '',
                    no: null,
                    issue_at: null
                },
                contact: {
                    city: 6,
                    email: '{{ $currentUser ? $currentUser->email : '' }}'
                },
                language: [
                    { lang: '' }
                ],
                skills: [
                    { program: '' }
                ],
                education: [
                    { status: '' }
                ],
                course: [
                    {company: null }
                ],
                experience: [
                    {company: null }
                ],
                reference: [
                    {full_name: null }
                ],
                emergency: [
                    { full_name: null }
                ],
                request: {
                    price: null,
                    work_time: 0,
                    travel: 0,
                    job_rotation: 0,
                    department: 0
                },
                user_id: '{{ $currentUser ? $currentUser->id : '' }}',
                position_id: '{{ !isset($position) ? '' : $position->id }}'
            },
            newApplication: {},
            formErrors: {
                identity: {}
            },
            hasCaptcha: {{ setting('hr::user-login') ? 0 : 1 }},
            authorization_key: null,
            button: '{{ trans('hr::applications.buttons.create') }}'
        },
        created: function() {
            this.newApplication    = _.clone(this.application, true);
            this.authorization_key = '{{ csrf_token() }}';
        },
        mounted: function() {
            if(this.application.id) {
                this.getUser(this.application.user_id);
            }
        },
        methods: {
            buttonStatus: function() {
                if(this.application.id != '') {
                    this.button = '{{ trans('hr::applications.buttons.update') }}';
                } else {
                    this.button = '{{ trans('hr::applications.buttons.create') }}';
                }
            },
            getDefaults: function() {
                return _.clone(this.newApplication);
            },
            addRow: function (index, id) {
                if(id == 'language') {
                    this.application.language.splice(index + 1, 0, {});
                    this.application.language[index+1].lang = '';
                    this.application.language[index+1].write = 3;
                    this.application.language[index+1].read  = 3;
                    this.application.language[index+1].speak = 3;
                } else if(id == 'skills') {
                    this.application.skills.splice(index + 1, 0, {});
                } else if(id == 'education') {
                    this.application.education.splice(index + 1, 0, {});
                } else if(id == 'course') {
                    this.application.course.splice(index + 1, 0, {});
                } else if(id == 'experience') {
                    this.application.experience.splice(index + 1, 0, {});
                } else if(id == 'reference') {
                    this.application.reference.splice(index + 1, 0, {});
                } else if(id == 'emergency') {
                    this.application.emergency.splice(index + 1, 0, {});
                }
            },
            removeRow: function (index, id) {
                if(id == 'language') {
                    this.application.language.splice(index, 1);
                } else if(id == 'skills') {
                    this.application.skills.splice(index, 1);
                } else if(id == 'education') {
                    this.application.education.splice(index, 1);
                } else if(id == 'course') {
                    this.application.course.splice(index, 1);
                } else if(id == 'experience') {
                    this.application.experience.splice(index, 1);
                } else if(id == 'reference') {
                    this.application.reference.splice(index, 1);
                } else if(id == 'emergency') {
                    this.application.emergency.splice(index, 1);
                }
            },
            submitForm: function (e) {
                e.preventDefault();
                @if($currentUser)
                if(this.application.id != '') {
                    this.applicationUpdate('{{ route('api.hr.application.update') }}', this.application);
                } else {
                    this.applicationUpdate('{{ route('api.hr.application.create') }}', this.application);
                    this.getUser(this.user_id);
                }
                @else
                if(this.application.id != '') {
                    this.applicationUpdate('{{ route('api.hr.application.update') }}', this.application);
                } else {
                    this.applicationUpdate('{{ route('api.hr.application.create') }}', this.application);
                }
                @endif

                if(this.hasCaptcha) {
                    this.application.captcha_hr = grecaptcha.getResponse(captcha_hr);
                    grecaptcha.reset(captcha_hr);
                }
            },
            ajaxStart: function (loading) {
                if (loading) {
                    $('#app').LoadingOverlay("show");
                } else {
                    $('#app').LoadingOverlay("hide");
                }
            },
            pnotify: function (errors, type='error') {
                var html = "<div class=\"notify\">";
                if(type=='error') {
                    html += _.map(errors, function (error, key) {
                        return "<p>" + error + "</p>";
                    }).join('');
                } else {
                    html += errors;
                }
                html += "</div>";
                PNotify.prototype.options.styling = "bootstrap3";
                new PNotify({
                    title: '{{ trans('hr::applications.title.application') }}',
                    text: html,
                    type: type
                });
            },
            applicationUpdate: function(route, data) {
                this.ajaxStart(true);
                axios.post(route, data).then(response => {
                    this.ajaxStart(false);
                    this.formErrors = {};
                    this.pnotify(response.data.message, "success");
                }).catch(error => {
                    this.ajaxStart(false);
                    this.pnotify(error.response.data.message);
                    this.formErrors = error.response.data.message;
                });
            },
            getUser: function(id) {
                this.ajaxStart(true);
                axios.get('{{ route('api.hr.application.user') }}')
                        .then(({ data })=> {
                            this.application = JSON.parse(data.message);
                            if(typeof data.notification != "undefined") {
                                this.pnotify(data.notification, 'notice');
                            }
                            this.buttonStatus();
                            this.ajaxStart(false);
                        }).catch(error => {
                    this.pnotify(error.response.data.message, 'notice');
                    // this.formErrors = error.response.data.message;
                    this.ajaxStart(false);
                });
            }
        }
    });
</script>
@endpush

@push('css-inline')
<style>
    .section-page h2 {
        font-size: 1.2em;
    }
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
        display: inline;
        /*padding-left: 25px;*/
        padding-right: 5px;
    }

    .btn-floating {
        width: 30px;
        height: 30px;
        line-height: 30px;
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
