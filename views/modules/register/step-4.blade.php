@extends('layouts.master')

@section('content')
    @component('partials.components.title')
        <h1 class="title">@lang('register::registers.title.heading')</h1>
    @endcomponent

    <div class="page-content mb20 step-form">
        <div class="container txt-lg">
            <div class="row">
                <div class="col-md-12">

                    @include('register::stepper', ['step1' => 'active', 'step2'=>'active', 'step3' => 'active', 'step4' => 'active'])

                    <div id="step-form">

                    <vue-dropzone name="registerFiles" message="test" ref="registerFiles" id="registerFiles" :options="dropzoneOptions" v-on:vdropzone-removed-file="removeThisFile"></vue-dropzone>

                    </div>
                    <p>Vergi Levhası, Ticaret Sicil Gazetesi, Kimlik Fotokopisi, Ruhsat Fotokopisi vb. (pdf, xls, xlsx, doc, docx, jpg, jpeg, png)</p>

                    <a class="btn btn-primary mt-sm-10" href="{{ route('register.form.step-5') }}">@lang('register::forms.button.next'))</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-stack')
    {!! Theme::script('js/vue.js') !!}
    {!! Theme::script('js/axios.min.js') !!}
    {!! Theme::script('js/vue2Dropzone.js') !!}
    {!! Theme::style('css/vue2Dropzone.min.css') !!}
    <script>
        Vue.component('vue-dropzone', vue2Dropzone);
        new Vue({
            el: '#step-form',
            data: {
                dropzoneOptions: {
                    url: '{{ route('register.form.upload') }}',
                    thumbnailWidth: 150,
                    maxFilesize: 0.5,
                    headers: {
                        "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
                    },
                    dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Dosya yüklemek için tıklayınız",
                    dictRemoveFile: "Dosya Sil",
                    dictCancelUpload: "Yüklemeyi İptal Et",
                    addRemoveLinks: true,
                    autoDiscover: false,
                    acceptedFiles: '.png, .jpg, .xls, .xlsx, .doc, .docx, .pdf, .txt'
                }
            },
            mounted() {
                var files = {!! $form_files ?? '[]' !!};
                var url = '';
                for (let i=0; i < files.length; i++) {
                    let mockFile = { name: files[i].name, size: files[i].size };
                    this.$refs.registerFiles.manuallyAddFile(mockFile, url);
                }
            },
            methods: {
                removeThisFile: function(file){
                    axios.post('{{ route('register.form.remove') }}', {
                        name: file.name,
                        type: file.type,
                        size: file.size
                    })
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }
            }
        });
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
@endpush