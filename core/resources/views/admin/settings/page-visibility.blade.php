@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Visibilidade da Página') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Visibilidade da Página') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh1') }}">
                    <div class="card">
                        <div class="card-body text-center" style="color: #555">
                            <h5 class="py-5">
                                <b>Alterar Visibilidade - stmgo 1</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh2') }}">
                    <div class="card">
                        <div class="card-body text-center" style="color: #555">
                            <h5 class="py-5">
                                <b>Alterar Visibilidade - stmgo 2</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh3') }}">
                    <div class="card">
                        <div class="card-body text-center" style="color: #555">
                            <h5 class="py-5">
                                <b>Alterar Visibilidade - stmgo 3</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh4') }}">
                    <div class="card">
                        <div class="card-body text-center" style="color: #555">
                            <h5 class="py-5">
                                <b>Alterar Visibilidade - stmgo 4</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh5') }}">
                    <div class="card">
                        <div class="card-body text-center" style="color: #555">
                            <h5 class="py-5">
                                <b>Alterar Visibilidade - stmgo 5</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
   
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh6') }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="py-5 text-center" style="color: #555">
                                <b>Alterar Visibilidade - stmgo 6</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh7') }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="py-5 text-center" style="color: #555">
                                <b>Alterar Visibilidade - stmgo 7</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh8') }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="py-5 text-center" style="color: #555">
                                <b>Alterar Visibilidade - stmgo 8</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh9') }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="py-5 text-center" style="color: #555">
                                <b>Alterar Visibilidade - stmgo 9</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.innerpage_visibility') }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="py-5 text-center" style="color: #555">
                                <b>Visibilidade da Página Interna</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.others_visibility') }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="py-5 text-center" style="color: #555">
                                <b>
                                    Outra Visibilidade
                                </b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
        </div> <!-- /.col -->
    </div>
</section>

@endsection
