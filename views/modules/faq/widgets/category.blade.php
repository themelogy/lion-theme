@foreach($category->faqs as $faq)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $loop->iteration }}" >{{ $faq->title }}</a>
            </h4>
        </div>
        <div class="panel-collapse collapse{{ $loop->first ? ' in' : '' }}" id="collapse-{{ $loop->iteration }}">
            <div class="panel-body">
                {!! $faq->content !!}
                {{--<a class="label label-default pull-right" href="{{ $faq->url }}"><i class="fa fa-angle-right"></i></a>--}}
            </div>
        </div>
    </div>
@endforeach
