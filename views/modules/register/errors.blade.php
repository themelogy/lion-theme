@if($errors->exception->any())
    <div class="alert alert-warning">
        @foreach($errors->exception->all() as $message)
            {{ $message }}
        @endforeach
    </div>
@endif

{!! $slot ?? null !!}
