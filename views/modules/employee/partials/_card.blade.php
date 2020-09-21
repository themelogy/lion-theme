<div class="col-md-6">
    <div class="business-card">
        <div class="user">
            <i class="fa fa-user"></i>
        </div>
        <ul>
            <li><h4>{{ $employee->fullname }}</h4></li>
            @if($employee->position)
                <li><small>{{ $employee->position }}</small></li>
            @endif
            @if($employee->mobile)
                <li><i class="fa fa-mobile-phone"></i> <a href="tel:{{ $employee->phone }}">{{ $employee->mobile }}</a></li>
            @endif
            @if($employee->phone)
                <li><i class="fa fa-phone"></i> <a href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a></li>
            @endif
            @if($employee->email)
                <li><i class="fa fa-envelope"></i> <a href="mailto:{!! Html::email($employee->email) !!}">{!! Html::email($employee->email) !!}</a></li>
            @endif
        </ul>
    </div>
</div>
