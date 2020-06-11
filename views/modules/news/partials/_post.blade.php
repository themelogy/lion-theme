<div class="article post">
    <header class="post-header">
        <a class="hover-img" href="{{ $post->url }}">
            <img class="lazyloader" src="{{ $post->present()->firstImage(360,180,'fit',80) }}" alt="{{ $post->title }}" title="{{ $post->title }}" /><i class="fa fa-link box-icon-# hover-icon round"></i>
        </a>
    </header>
    <div class="post-inner">
        <h4 class="post-title"><a class="text-darken" href="{{ $post->url }}">{{ $post->title }}</a></h4>
        <ul class="post-meta">
            <li><i class="fa fa-th-large"></i> <a href="{{ $post->category->url }}">{{ $post->category->name }}</a></li>
            <li><i class="fa fa-calendar"></i> <a href="#">{{ $post->created_at->formatLocalized('%d %B %Y') }}</a></li>
            <li><i class="fa fa-user"></i> <a href="{{ $post->present()->authorUrl }}">{{ $post->author->fullname }}</a></li>
        </ul>
        <p class="post-desciption">{!! strip_tags($post->intro) !!}</p><a class="btn btn-xs btn-default" href="{{ $post->url }}">{{ trans('global.buttons.read more') }}</a>
    </div>
</div>