<script type="text/x-template" id="modal-template">
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-counter red white-text" v-if="show_counter && auto_close">
                        <slot name="counter">
                            0
                        </slot>
                    </div>

                    <a @click="$emit('close')" href="#" class="close-button red white-text" v-if="show_header == false && show_close == true"><i class="fa fa-times" aria-hidden="true"></i></a>

                    <div class="modal-header brand-bg white-text" v-if="show_header">
                        <a @click="$emit('close')" href="#" class="close-button red white-text" v-if="show_header == true && show_close == true"><i class="fa fa-times" aria-hidden="true"></i></a>
                        <slot name="header">
                            Başlık
                        </slot>
                    </div>

                    <div class="modal-body {{ $popup->design_type }}">
                        <slot name="body">
                            İçerik
                        </slot>
                    </div>

                    <div class="modal-footer brand-bg" v-if="1 != 1">
                        <slot name="footer">
                            <button class="btn btn-primary red" @click="$emit('close')">{{ trans('global.buttons.close') }}</button>
                        </slot>
                    </div>

                </div>
            </div>
        </div>
    </transition>
</script>

<!-- app -->
<div id="popup">
    <modal v-if="showModal" @close="showModal = false">
    <span slot="counter">@{{ counter }}</span>
    @if(isset($popup->settings->show_header))
    <h3 slot="header" class="white-text">{{ $popup->title }}</h3>
    @endif
    <div slot="body">{!! $popup->present()->content !!}</div>
    </modal>
</div>

<script src="{{ Module::asset('popup:js/vue.min.js') }}"></script>
<script src="{{ Module::asset('popup:js/js.cookie.min.js') }}"></script>
<script>
    Vue.component('modal', {
        template: '#modal-template',
        data: function(){
            return {
                show_header: {{ $popup->settings->show_header ?? 0 }},
                show_close: {{ $popup->settings->show_close ?? 0 }},
                show_counter: {{ $popup->settings->show_counter ?? 0 }},
                auto_close: {{ $popup->settings->auto_close ?? 0 }}
            }
        }
    });
    var popup = new Vue({
        el: '#popup',
        data: {
            showModal: true,
            close_delay: {{ $popup->settings->close_delay_at * 1000 }},
            cookie_expire: {{ $popup->settings->cookie_expire }},
            open_delay: {{ $popup->settings->open_delay_at * 1000 }},
            auto_close: {{ $popup->settings->auto_close ?? 0 }},
            counter: '',
            windowWidth: 0,
            windowHeight: 0,
            responsive: {
                show_desktop: {{ $popup->settings->show_desktop ?? 'false' }},
                show_tablet: {{ $popup->settings->show_tablet ?? 'false' }},
                show_mobile: {{ $popup->settings->show_mobile ?? 'false' }}
            }
        },
        mounted: function() {
            if(this.open_delay > 0) {
                this.delayModal();
            } else {
                this.initModal();
            }
        },
        methods: {
            initModal: function() {
                this.checkResponsive();
                if(Cookies.get('popup_show_{{ $popup->id }}')) {
                    this.showModal = false;
                } else {
                    if(this.auto_close) {
                        this.autoClose();
                    }
                    Cookies.set('popup_show_{{ $popup->id }}', 1, { expires: this.cookie_expire } );
                }
            },
            delayModal: function() {
                this.showModal = false;
                setTimeout(function(){
                    this.showModal = true;
                    this.initModal();
                }.bind(this), this.open_delay);
            },
            addCounter: function(status) {
                if(status == true) {
                    this.counter = this.close_delay / 1000;
                    var timerId = setInterval(function(){
                        this.counter -= 1;
                        if(this.counter == 0) {
                            clearInterval(timerId);
                        }
                    }.bind(this),1000);
                }
            },
            autoClose: function() {
                this.addCounter(1);
                setTimeout(function() {
                    this.showModal = false;
                }.bind(this), this.close_delay);
            },
            getWindowWidth: function(event) {
                this.windowWidth = document.documentElement.clientWidth;
            },
            getWindowHeight: function(event) {
                this.windowHeight = document.documentElement.clientHeight;
            },
            checkResponsive: function() {
                this.$nextTick(function(){
                    window.addEventListener('resize', this.getWindowWidth());
                    window.addEventListener('resize', this.getWindowHeight());
                    this.getWindowWidth();
                    this.getWindowHeight();
                    if(this.windowWidth <= 500 && this.responsive.show_mobile === false) {
                        this.showModal = false;
                    }
                    if(this.windowWidth >= 750 && this.windowWidth <= 980 && this.responsive.show_tablet === false) {
                        this.showModal = false;
                    }
                    if(this.windowWidth > 980 && this.responsive.show_desktop === false) {
                        this.showModal = false;
                    }
                });
            }
        },
        beforeDestroy: function() {
            window.removeEventListener('resize', this.getWindowWidth);
            window.removeEventListener('resize', this.getWindowHeight);
        }
    })
</script>

<style>
    .modal-mask {
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-counter {
        position: absolute;
        top:-65px;
        right:-10px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        line-height: 35px;
        width: 40px;
        border-radius: 20px;
        background-color: #fff;
        z-index: 9999;
        border:3px solid #ffffff;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        position:relative;
        width: {{ $popup->settings->width.$popup->settings->width_type }};
        margin: 0 auto;
        padding: 0;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 20px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    @media screen and (max-width:500px) {
        .modal-container {
            width: 90%;
        }
        .modal-container img {
            width: 100%;
        }
    }

    .modal-header {
        position: relative;
        padding: 0;
    }

    .modal-header h3 {
        padding: 10px 20px 0 20px;
        margin-top: 0;
        color: #42b983;
        line-height: 40px;
    }

    .modal-body {
        margin: 0;
        padding: 0;
    }

    .modal-body.text {
        padding: 20px;
        height: {{ $popup->settings->height }};
    }

    .close-button {
        width: 35px;
        line-height: 30px;
        font-size: 14px;
        text-align: center;
        position: absolute;
        right: -10px;
        top:-15px;
        background: #ffffff;
        color: grey;
        border:3px solid #ffffff;
        border-radius: 20px;
        font-weight: bold;
        box-shadow: 0 0 10px rgba(0,0,0,0.25);
        z-index: 9999;
    }

    .modal-default-button {
        float: right;
    }

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
