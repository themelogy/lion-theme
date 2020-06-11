<section class="rev-slider">
    <div id="rev_slider_wrapper"
         class="rev_slider_wrapper fullwidthbanner-container"
         data-alias="webster-slider-5"
         data-source="gallery"
         style="margin:0 auto;background:transparent;padding:0;">
        <!-- START REVOLUTION SLIDER 5.4.6.3 auto mode -->
        <div id="rev_slider" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.6.3">
            <ul>  <!-- SLIDE  -->
                @foreach($slides as $slide)
                <li data-index="rs-{{ $loop->iteration }}"
                    data-transition="fade"
                    data-slotamount="default"
                    data-hideafterloop="0"
                    data-hideslideonmobile="off"
                    data-easein="default"
                    data-easeout="default"
                    data-masterspeed="300"
                    data-thumb="{!! $slide->present()->firstImage(100,100,'fit',80) !!}"
                    data-rotate="0"
                    data-saveperformance="off"
                    data-title="Slide"
                    data-param1=""
                    data-param2=""
                    data-param3=""
                    data-param4=""
                    data-param5=""
                    data-param6=""
                    data-param7=""
                    data-param8=""
                    data-param9=""
                    data-param10=""
                    data-description="">
                    <!-- MAIN IMAGE -->
                    <img data-lazyload="{!! $slide->present()->firstImage(1240,500,'fit',70) !!}"  alt="{{ $slide->title }}"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->
                    @if(!empty($slide->title))
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption   tp-resizeme"
                         id="slide-762-layer-3"
                         data-x="395"
                         data-y="bottom" data-voffset="340"
                         data-width="['auto']"
                         data-height="['auto']"
                         data-type="text"
                         data-responsive_offset="on"
                         data-frames='[{"delay": 0, "speed": 300, "from": "opacity: 0", "to": "opacity: 1"}, {"delay": "wait", "speed": 300, "to": "opacity: 0"}]'
                         data-textAlign="['inherit','inherit','inherit','inherit']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 7; white-space: nowrap; font-size: 60px; line-height: 70px; font-weight: 700; color: #ffffff; text-shadow: 0 2px rgba(0,0,0,0.5);">{!! $slide->title !!} </div>
                    @endif
                    @if(!empty($slide->sub_title))
                    <!-- LAYER NR. 1 -->
                        <div class="tp-caption   tp-resizeme"
                             id="slide-762-layer-2"
                             data-x="394"
                             data-y="top" data-voffset="290"
                             data-width="['800']"
                             data-height="['auto']"
                             data-type="text"
                             data-responsive_offset="on"
                             data-frames='[{"delay": 0, "speed": 300, "from": "opacity: 0", "to": "opacity: 1"}, {"delay": "wait", "speed": 300, "to": "opacity: 0"}]'
                             data-textAlign="['inherit','inherit','inherit','inherit']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,0,0,0]"
                             style="z-index: 6; letter-spacing: -0.02em; white-space: normal; font-size: 30px; line-height: 35px; font-weight: 400; color: #ffffff; text-shadow: 0 2px rgba(0,0,0,0.5);">{!! $slide->sub_title !!}</div>
                    @endif
                    @if($slide->link_type != 'none')
                    <!-- LAYER NR. 4 -->
                    <a class="tp-caption rev-btn tp-resizeme rev-button"
                       target="{{ $slide->link->target }}"
                       href="{{ $slide->link->url }}"
                       id="slide-762-layer-4"
                       data-x="395"
                       data-y="bottom" data-voffset="190"
                       data-width="['auto']"
                       data-height="['auto']"
                       data-type="button"
                       data-actions=''
                       data-responsive_offset="on"
                       data-frames='[{"delay": 0, "speed": 300, "from": "opacity: 0", "to": "opacity: 1"}, {"delay": "wait", "speed": 300, "to": "opacity: 0"}]'
                       data-textAlign="['inherit','inherit','inherit','inherit']"
                       data-paddingtop="[12,12,12,12]"
                       data-paddingright="[35,35,35,35]"
                       data-paddingbottom="[12,12,12,12]"
                       data-paddingleft="[35,35,35,35]"
                       style="z-index: 8; white-space: nowrap; font-size: 14px; line-height: 14px; font-weight: 400; color: rgba(255,255,255,1); text-transform:uppercase;background-color:red;border-color:rgba(0,0,0,1);border-radius:3px 3px 3px 3px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;text-decoration: none;">{{ $slide->link->title }} </a>
                </li>
                @endif
                @endforeach
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div> </div>
    </div>
</section>


@push('js-stack')
    {!! Theme::style('plugins/revolution/css/jquery.revolution.min.css') !!}
    {!! Theme::script('plugins/revolution/js/jquery.revolution.min.js') !!}
@endpush

@push('js-inline')
    <script>
        var revapi271,
            tpj=jQuery;
            tpj(document).ready(function() {
            if(tpj("#rev_slider").revolution == undefined){
                revslider_showDoubleJqueryError("#rev_slider");
            }else{
                revapi271 = tpj("#rev_slider").show().revolution({
                    sliderType:"standard",
                    sliderLayout:"auto",
                    dottedOverlay:"none",
                    delay:9000,
                    navigation: {
                        keyboardNavigation:"off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation:"off",
                        onHoverStop:"off",
                        touch:{
                            touchenabled:"on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style:"zeus",
                            enable:true,
                            hide_onmobile:true,
                            hide_under:600,
                            hide_onleave:false,
                            hide_delay:200,
                            hide_delay_mobile:1200,
                            tmp:'<div class="tp-title-wrap"><div class="tp-arr-imgholder"></div></div>',
                            left: {
                                h_align:"left",
                                v_align:"center",
                                h_offset:30,
                                v_offset:0
                            },
                            right: {
                                h_align:"right",
                                v_align:"center",
                                h_offset:30,
                                v_offset:0
                            }
                        },
                        bullets: {
                            enable: true,
                            style: 'hesperiden',
                            h_align: "center",
                            v_align: "bottom",
                            v_offset:80,
                            space:2
                        }
                    },
                    visibilityLevels:[1240,1024,778,480],
                    gridwidth:1920,
                    gridheight:600,
                    lazyType:"smart",
                    shadow:0,
                    spinner:"spinner2",
                    stopLoop:"off",
                    stopAfterLoops:-1,
                    stopAtSlide:-1,
                    shuffle:"off",
                    autoHeight:"off",
                    disableProgressBar:"on",
                    hideThumbsOnMobile:"off",
                    hideSliderAtLimit:0,
                    hideCaptionAtLimit:0,
                    hideAllCaptionAtLilmit:0,
                    debugMode:false,
                    fallbacks: {
                        simplifyAll:"off",
                        nextSlideOnWindowFocus:"off",
                        disableFocusListener:false,
                    }
                });
            }
        });
    </script>
@endpush
