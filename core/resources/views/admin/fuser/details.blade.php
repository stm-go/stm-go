@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('User Details') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('User Details') }}</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
   
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('User Details') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.front_user.index') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                            </a>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-striped table-bordered">
                        
                          <tbody>
                            <tr>
                                <th>Imagem :</th>
                                <td><img class="w-80" src="{{asset('assets/front/img/'.$user->image)}}" alt="" ></td>
                            </tr>
                            <tr>
                                <th>Nome :</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Nome do Usuário :</th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Email :</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Telefone : </th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Endereço : </th>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <th>País :</th>
                                <td>{{ $user->country }}</td>
                            </tr>
                            <tr>
                                <th>Estado :</th>
                                <td>{{ $user->state }}</td>
                            </tr>
                            <tr>
                                <th>CEP :</th>
                                <td>{{ $user->zipcode }}</td>
                            </tr>
                            <tr>
                                <th>Email Verificado :</th>
                                <td>
                                    @if ($user->email_verified == '0')
                                        <span class="badge badge-warning">Nâo</span>
                                    @elseif ($user->email_verified == 'Yes')
                                        <span class="badge badge-success">Sim</span>
                                    @endif
                                </td>
                            </tr>
                          </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
@endsection
