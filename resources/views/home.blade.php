@extends('adminlte::page')

@section('title', 'Soporte TAQ')


@section('content_header')
    <h1>Bienvenido</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">PANEL INFORMATIVO</div><br>
                <div class="card-body">
                    <h6>TICKET'S</h6>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $concentrado->sole('status','=','1')->score }}</h3>
                                    <p>En Espera</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-hourglass"></i>
                                </div>
                                    <a href="{{route('ticket.index')}}" class="small-box-footer">
                                    Click para ver <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $concentrado->sole('status','=','2')->score }}</h3>
                                    <p>En Proceso</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-wrench"></i>
                                </div>
                                    <a href="{{route('ticket.index')}}" class="small-box-footer">
                                    Click para ver <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $concentrado->sole('status','=','3')->score }}</h3>
                                    <p>Terminados</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <a href="{{route('ticket.index')}}" class="small-box-footer">
                                    Click para ver <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $concentrado->sole('status','=','4')->score }}</h3>
                                    <p>Cancelados</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-times-circle"></i>
                                </div>
                                    <a href="{{route('ticket.index')}}" class="small-box-footer">
                                    Click para ver <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                            </div>
                        </div>
                        
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/body.css') }}">

    <style>
        .sidebar-dark-primary{
            background: #5f2167 !important;
            }
        .brand-link{
            background: #5f2167 !important;
            }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
