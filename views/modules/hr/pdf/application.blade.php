<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        * {
            font-family: DejaVu Sans !important;
        }
        td, th {
            text-align: left;
        }
    </style>

</head>
<body>
<div>
    <h2>{{ trans('hr::applications.title.view application', ['id'=>$application->id]) }}</h2><br/>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.personal') }}</legend>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th class="col-md-2">{{ trans('hr::applications.form.gender') }}</th>
                        <td>{{ $application->present()->gender }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('hr::applications.form.first_name') }}</th>
                        <td>{{ $application->first_name }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('hr::applications.form.last_name') }}</th>
                        <td>{{ $application->last_name }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('hr::applications.form.identity.birthdate') }}</th>
                        <td>{{ $application->present()->identity('birthdate') }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('hr::applications.form.identity.birthplace') }}</th>
                        <td>{{ $application->present()->identity('birthplace') }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th class="col-md-2">{{ trans('hr::applications.form.marital') }}</th>
                        <td>{{ $application->present()->marital }}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2">{{ trans('hr::applications.form.identity.bloodgroup') }}</th>
                        <td>{{ $application->present()->identity('blood_group') }}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2">{{ trans('hr::applications.form.identity.no') }}</th>
                        <td>{{ $application->present()->identity('no') }}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2">{{ trans('hr::applications.form.identity.sgk') }}</th>
                        <td>{{ $application->present()->identity('sgk') }}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2">{{ trans('hr::applications.form.identity.tax') }}</th>
                        <td>{{ $application->present()->identity('tax') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.contact') }}</legend>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.contacts.address1') }}</th>
                <td>{{ $application->present()->contact('address') }}</td>
            </tr>
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.contacts.phone') }}</th>
                <td>{{ $application->present()->contact('phone') }}</td>
            </tr>
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.contacts.gsm') }}</th>
                <td>{{ $application->present()->contact('gsm') }}</td>
            </tr>
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.contacts.email') }}</th>
                <td>{{ $application->present()->contact('email') }}</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.driver') }}</legend>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.driver.type') }}</th>
                <td>{{ $application->present()->driver('type') }}</td>
            </tr>
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.driver.no') }}</th>
                <td>{{ $application->present()->driver('no') }}</td>
            </tr>
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.driver.issue_at') }}</th>
                <td>{{ $application->present()->driver('issue_at') }}</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.health') }}</legend>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="col-md-3">{{ trans('hr::applications.form.health_desc') }}</th>
                <td>{{ $application->present()->health }}</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.criminal') }}</legend>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.criminal_desc') }}</th>
                <td>{{ $application->present()->criminal }}</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.skills') }}</legend>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="col-md-3">{{ trans('hr::applications.select.skills.program') }}</th>
                <th class="col-md-9">{{ trans('hr::applications.select.skills.level') }}</th>
            </tr>
            @if(@$application->present()->skills)
                @foreach($application->present()->skills as $skill)
                    <tr>
                        <td>{{ $skill->program }}</td>
                        <td>{{ $skill->level }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </fieldset>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.language') }}</legend>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="col-md-3">{{ trans('hr::applications.form.language') }}</th>
                <th class="col-md-3">{{ trans('hr::applications.form.languages.read') }}</th>
                <th class="col-md-3">{{ trans('hr::applications.form.languages.write') }}</th>
                <th class="col-md-3">{{ trans('hr::applications.form.languages.speak') }}</th>
            </tr>
            @if(@$application->present()->language)
                @foreach($application->present()->language as $language)
                    <tr>
                        <td>{{ $language->lang }}</td>
                        <td>{{ $language->read }}</td>
                        <td>{{ $language->write }}</td>
                        <td>{{ $language->speak }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </fieldset>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.education') }}</legend>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.educate.start_at') }}</th>
                <th class="col-md-2">{{ trans('hr::applications.form.educate.end_at') }}</th>
                <th class="col-md-4">{{ trans('hr::applications.form.educate.name') }}</th>
                <th>{{ trans('hr::applications.form.educate.branch') }}</th>
                <th>{{ trans('hr::applications.form.educate.status') }}</th>
            </tr>
            @if(@$application->present()->education)
                @foreach($application->present()->education as $education)
                    <tr>
                        <td>{{ $education->start_at }}</td>
                        <td>{{ $education->end_at }}</td>
                        <td>{{ $education->name }}</td>
                        <td>{{ $education->branch }}</td>
                        <td>{{ $education->status }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </fieldset>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.course') }}</legend>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="col-md-5">{{ trans('hr::applications.form.courses.name') }}</th>
                <th class="col-md-5">{{ trans('hr::applications.form.courses.company') }}</th>
                <th class="col-md-2">{{ trans('hr::applications.form.courses.date') }}</th>
            </tr>
            @if(@$application->present()->courses)
                @foreach($application->present()->courses as $course)
                    @if(isset($course->name))
                        <tr>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->company }}</td>
                            <td>{{ $course->issue_at }}</td>
                        </tr>
                    @endif
                @endforeach
            @endif
        </table>
    </fieldset>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.experience') }}</legend>
        <div class="row">
            @if(@$application->present()->experience)
                @foreach($application->present()->experience as $experience)
                    @if(isset($experience->end_at))
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered experience">
                                <tr>
                                    <th class="col-md-6">{{ trans('hr::applications.form.experiences.end_at') }}</th>
                                    <td>{{ $experience->end_at }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('hr::applications.form.experiences.start_at') }}</th>
                                    <td>{{ $experience->start_at }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('hr::applications.form.experiences.company') }}</th>
                                    <td>{{ $experience->company }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('hr::applications.form.experiences.department') }}</th>
                                    <td>{{ $experience->department }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('hr::applications.form.experiences.position') }}</th>
                                    <td>{{ $experience->position }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('hr::applications.form.experiences.reason') }}</th>
                                    <td>{{ $experience->reason }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('hr::applications.form.experiences.title') }}</th>
                                    <td>{{ $experience->title }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('hr::applications.form.experiences.full_name') }}</th>
                                    <td>{{ $experience->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('hr::applications.form.experiences.phone') }}</th>
                                    <td>{{ $experience->phone }}</td>
                                </tr>
                            </table>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </fieldset>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.reference') }}</legend>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="col-md-3">{{ trans('hr::applications.form.references.full_name') }}</th>
                <th class="col-md-3">{{ trans('hr::applications.form.references.work_place') }}</th>
                <th class="col-md-2">{{ trans('hr::applications.form.references.position') }}</th>
                <th class="col-md-2">{{ trans('hr::applications.form.references.proximity') }}</th>
                <th class="col-md-2">{{ trans('hr::applications.form.references.phone') }}</th>
            </tr>
            @if(@$application->present()->references)
                @foreach($application->present()->references as $reference)
                    @if(isset($reference->full_name))
                        <tr>
                            <td>{{ !isset($reference->full_name) ?'': $reference->full_name }}</td>
                            <td>{{ !isset($reference->work_place) ?'': $reference->work_place }}</td>
                            <td>{{ !isset($reference->position) ?'': $reference->position }}</td>
                            <td>{{ !isset($reference->proximity) ?'': $reference->proximity }}</td>
                            <td>{{ !isset($reference->phone) ?'': $reference->phone }}</td>
                        </tr>
                    @endif
                @endforeach
            @endif
        </table>
    </fieldset>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.request') }}</legend>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.requests.price') }}</th>
                <th class="col-md-3">{{ trans('hr::applications.form.requests.work_time') }}</th>
                <th class="col-md-3">{{ trans('hr::applications.form.requests.department') }}</th>
                <th class="col-md-2">{{ trans('hr::applications.form.requests.travel') }}</th>
                <th class="col-md-2">{{ trans('hr::applications.form.requests.job_rotation') }}</th>
            </tr>
            <tr>
                <td>{{ $application->present()->request('price') }}</td>
                <td>{{ $application->present()->request('work_time') }}</td>
                <td>{{ $application->present()->request('department') }}</td>
                <td>{{ $application->present()->request('travel') }}</td>
                <td>{{ $application->present()->request('job_rotation') }}</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.emergency') }}</legend>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.emergencies.full_name') }}</th>
                <th class="col-md-8">{{ trans('hr::applications.form.emergencies.phone') }}</th>
            </tr>
            @if(@$application->present()->emergency)
                @foreach($application->present()->emergency as $emergency)
                    @if(isset($emergency->full_name))
                        <tr>
                            <td>{{ $emergency->full_name }}</td>
                            <td>{{ $emergency->phone }}</td>
                        </tr>
                    @endif
                @endforeach
            @endif
        </table>
    </fieldset>
</div>
</body>
</html>