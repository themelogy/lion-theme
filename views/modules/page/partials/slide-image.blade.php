@php
    $img = (object)[
        'width'         => $page->settings->image_width ?? null,
        'height'        => $page->settings->image_height ?? null,
        'mode'          => $page->settings->image_mode ?? 'fit',
        'quality'       => $page->settings->image_quality ?? 80,
        'position'      => $page->settings->image_position ?? null,
        'show_gallery'  => $page->settings->show_gallery ?? false,
        'show_image'    => $page->settings->show_image ?? false,
        'class'         => ['', 'lazyloader'],
        'images'        => null,
        'image'         => null
    ];

    $img->class  = collect($img->class);
    switch ($img->position) {
        case 'top':
            $img->class->push('img-responsive mb20');
            break;
        case 'bottom':
            $img->class->push('img-responsive mt20');
            break;
        case 'left':
            $img->class->push('pull-left mr20 mb20');
            break;
        case 'right':
        $img->class->push('pull-right ml20 mb20');
        break;
        default:
        $img->class->push('lazyload');
    }

    $img->images = $img->show_gallery ? $page->present()->images($img->width, $img->height, $img->mode, $img->quality) : null;
    $img->image  = $img->show_image ? $page->present()->firstImage($img->width, $img->height, $img->mode, $img->quality) : null;

    $html = "";
    if($img->show_gallery && $img->images) {
        $html .= '<div class="gallery '.$img->class->except(0)->implode(' ').'" style="margin-bottom:20px;" id="popup-gallery">';
        $html .= '<div class="owl-carousel owl-theme owl-auto" data-items="'.$page->settings->slide_items.'" data-items-mobile="1" data-items-tablet="2">';
        foreach ($img->images as $image) {
            $html .= '<div class="thumbnail brand" style="padding:5px;">';
            $html .= '<a class="hover-img popup-gallery-image" href="'.$image.'" data-effect="mfp-zoom-out" style="margin:0; padding:0;">';
            $html .= Html::image($image, $page->title, ['class'=>$img->class->implode(' '), 'style'=>'padding:0; position: unset;']);
            $html .= '</a>';
            $html .= '</div>';
        }
        $html .= '</div>';
        $html .= '</div>';
    } elseif ($img->show_image && $img->image) {
        $html .= Html::image($img->image, $page->title, ['class'=>$img->class->implode(' ')]);
    }
    $html = in_array($img->position, ['','left','right','top']) ? $html.$page->body : $page->body.$html;

@endphp

{!! $html !!}

@includeIf('page::partials.video')



