@extends('adminlte::page')

@section('title', "Perfil da Permissão {$permission->name}")

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a></li>
    </ol>

    <h1>Perfil da Permissão <strong>{{ $permission->name }}</strong></h1>

@stop


@section('content')
    <div class="card">

        @include('admin.includes.alerts')
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td style="width=10px">
                                <a href="{{ route('profiles.permission.detach',[ $profile->id, $permission->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop
