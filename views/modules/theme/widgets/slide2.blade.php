@if($slides->count()>0)
<div id="rev_slider_4_1_wrapper"
     class="rev_slider_wrapper fullwidthbanner-container"
     data-alias="classicslider1">

    <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
        <ul>
            @foreach($slides as $slide)
            <li data-index="rs-{{ $loop->iteration }}"
                data-transition="slotfade-horizontal"
                data-slotamount="default"
                data-easein="Power4.easeInOut"
                data-easeout="Power4.easeInOut"
                data-masterspeed="2000"
                data-thumb="{!! $slide->present()->firstImage(100,100,'fit',80) !!}"
                data-rotate="0"  data-fstransition="fade"
                data-fsmasterspeed="1500"
                data-fsslotamount="7"
                data-saveperformance="off"
                data-title="{{ $slide->title }}" data-description="">

                <!-- MAIN IMAGE -->
                <img data-lazyload="{!! $slide->present()->firstImage(1240,500,'fit',70) !!}"  alt="{{ $slide->title }}"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>

                <!-- LAYER NR. 2 -->

                @if(!empty($slide->sub_title))
                <div class="tp-caption tp-resizeme tp-caption-theme"
                     id="slide-397-layer-{{ $loop->iteration }}"
                     data-x="left" data-hoffset="100"
                     data-y="center" data-voffset="-50"
                     data-width="['400','350','300','250']"
                     data-height="['auto','auto','auto','auto']"
                     data-transform_idle="o:1;"
                     data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                     data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                     data-start="1000"
                     data-splitin="none"
                     data-splitout="none"
                     data-responsive_offset="on"
                     data-whitespace="normal"
                     data-fontsize="['30', '25', '20', '15']"
                     data-lineheight="['35', '29', '23', '17']">{!! $slide->sub_title !!}
                </div>
                @endif

                @if($slide->link_type != 'none')
                <div class="tp-caption d-none"
                     id="slide-397-layer-5"
                     data-x="left" data-hoffset="100"
                     data-y="center" data-voffset="100"
                     data-width="['auto']"
                     data-height="['auto']"
                     data-transform_idle="o:1;"
                     data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                     data-style_hover="c:rgba(255, 255, 255, 1.00);bg:rgba(41, 46, 49, 0);bc:rgba(255, 255, 255, 1.00);cursor:pointer;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;"
                     data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-start="1500"
                     data-splitin="none"
                     data-splitout="none"
                     data-responsive_offset="on"
                     data-responsive="off">
                    <a target="{{ $slide->link->target }}" class="btn btn-block btn-secondary" data-animation="animated fadeInRight" data-toggle="collapse" href="{{ $slide->link->url }}">{{ $slide->link->title }}</a>
                </div>
                @endif

            </li>
            @endforeach
        </ul>
        <div class="tp-static-layers"></div>
        <div class="tp-bannertimer" style="height: 7px; background-color: rgba(255, 255, 255, 0.25);"></div>
    </div>
</div>

@push('css-stack')
    {!! Theme::style('plugins/revolution/css/settings.css') !!}
    {!! Theme::style('plugins/revolution/css/layers.css') !!}
    {!! Theme::style('plugins/revolution/css/navigation.css') !!}
@endpush

@push('js-stack')
    {!! Theme::script('plugins/revolution/js/jquery.revolution.min.js') !!}
@endpush

@push('js-inline')
    <script type="text/javascript">
        var tpj=jQuery;
        var revapi4;
        tpj(document).ready(function() {
            if(tpj("#rev_slider_4_1").revolution == undefined){
                revslider_showDoubleJqueryError("#rev_slider_4_1");
            }else{
                revapi4 = tpj("#rev_slider_4_1").show().revolution({
                    sliderType:"fullwidth",
                    jsFileLocation:"{{ Theme::url('') }}/plugins/revolution/js/",
                    sliderLayout:"standard",
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
                            hide_onleave:true,
                            hide_delay:200,
                            hide_delay_mobile:1200,
                            tmp:'<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
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
                            v_offset:70,
                            space:2
                        }
                        // bullets: {
                        //     enable:true,
                        //     hide_onmobile:true,
                        //     hide_under:600,
                        //     style:"metis",
                        //     hide_onleave:true,
                        //     hide_delay:200,
                        //     hide_delay_mobile:1200,
                        //     direction:"horizontal",
                        //     h_align:"center",
                        //     v_align:"bottom",
                        //     h_offset:0,
                        //     v_offset:20,
                        //     space:5,
                        //     tmp:'<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span>'
                        // }
                    },
                    viewPort: {
                        enable:true,
                        outof:"pause",
                        visible_area:"100%"
                    },
                    responsiveLevels:[1240,1024,778,480],
                    gridwidth:[1240,1024,778,480],
                    gridheight:[500,500,450,200],
                    lazyType:"smart",
                    parallax: {
                        type:"mouse",
                        origo:"slidercenter",
                        speed:2000,
                        levels:[2,3,4,5,6,7,12,16,10,50]
                    },
                    shadow:0,
                    spinner:"off",
                    stopLoop:"off",
                    stopAfterLoops:-1,
                    stopAtSlide:-1,
                    shuffle:"off",
                    autoHeight:"off",
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
        });	/*ready*/
    </script>
@endpush
@endif
