<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ trans('hr::positions.form.reference_no') }}</th>
                <th>{{ trans('hr::positions.form.name') }}</th>
                <th>{{ trans('hr::positions.form.personal_number') }}</th>
                <th>{{ trans('hr::positions.form.position.city') }}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($positions as $position)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $position->reference_no }}</td>
                    <td>{{ $position->name }}</td>
                    <td>{{ $position->personal_number }}</td>
                    <td>{{ $position->present()->position('city') }}</td>
                    <td><a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ route('hr.position.view', [$position->slug]) }}">İncele</a>  <a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ route('hr.application.form', ['position_id'=>$position->id]) }}">Başvuru Yap</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
