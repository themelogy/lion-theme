@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'page'])
        <h1 class="title">{{ $page->title }}</h1>
    @endcomponent

    <div class="page-content mb20">
        <div class="container txt-lg">

            @component('page::partials.menu', ['page'=>$page])
                <div class="timeline timeline-line-dotted">
                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-success">
                            1970
                        </div>
                        <div class="timeline-event">
                            <div class="timeline-heading">
                                <h4>Kırşehir Kaman Kömür Satış Faaliyetleri</h4>
                            </div>
                        </div>
                    </div>
                    <span class="timeline-label">
                        <span class="label label-primary">1978</span>
                    </span>
                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-success">
                            1978
                        </div>
                        <div class="timeline-event">
                            <div class="timeline-heading">
                                <h4>Ankara'da Oto Yedek Parça Satışı</h4>
                            </div>
                        </div>
                    </div>
                    <span class="timeline-label">
                        <span class="label label-primary">09.02.2016</span>
                    </span>
                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-success">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="timeline-event">
                            <div class="timeline-heading">
                                <h4>MoneyService Transfer</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Money transfer. By John, Wallet ID: 1234567890, Amount: 261$</p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right">09.02.2016 08:00</p>
                            </div>
                        </div>
                    </div>
                    <span class="timeline-label">
                        <span class="label label-primary">08.02.2016</span>
                    </span>
                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-success">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="timeline-event">
                            <div class="timeline-heading">
                                <h4>MoneyService Transfer</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Money transfer. By John, Wallet ID: 1234567890, Amount: 100$</p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right">08.02.2016 14:00</p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-success">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="timeline-event">
                            <div class="timeline-heading">
                                <h4>MoneyService Transfer</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Money transfer. By Alex, Wallet ID: 1234567890, Amount: 250$</p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right">08.02.2016 12:00</p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-danger">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="timeline-event">
                            <div class="timeline-heading">
                                <h4>MoneyService Transfer</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Money transfer. By Tom, Wallet ID: 1234567890, Amount: 10$</p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right">08.02.2016 11:30</p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-danger">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="timeline-event">
                            <div class="timeline-heading">
                                <h4>MoneyService Transfer</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Money transfer. By Alex, Wallet ID: 1234567890, Amount: 3$</p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right">08.02.2016 11:00</p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-danger">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="timeline-event">
                            <div class="timeline-heading">
                                <h4>MoneyService Transfer</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Money transfer. By Alex, Wallet ID: 1234567890, Amount: 25$</p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right">08.02.2016 10:00</p>
                            </div>
                        </div>
                    </div>
                    <span class="timeline-label">
                        <span class="label label-primary">13.01.2016</span>
                    </span>
                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-success">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="timeline-event">
                            <div class="timeline-heading">
                                <h4>MoneyService Transfer</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Money transfer. By John, Wallet ID: 1234567890, Amount: 240$</p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right">13.01.2016 15:00</p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-point timeline-point-success">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="timeline-event">
                            <div class="timeline-heading">
                                <h4>MoneyService Transfer</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Money transfer. By Steve, Wallet ID: 1234567890, Amount: 100'000'000$</p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right">13.01.2016 10:00</p>
                            </div>
                        </div>
                    </div>
                    <span class="timeline-label">
                        <a href="#" class="btn btn-default" title="More...">
                            <i class="fa fa-fw fa-history"></i>
                        </a>
                    </span>
                </div>
            @endcomponent
        </div>
    </div>
@stop
