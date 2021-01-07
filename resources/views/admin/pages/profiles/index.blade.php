@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
    </ol>

    <h1>Perfis <a href="{{ route('profiles.create') }}" class="btn btn-dark">Adicionar Perfil</a></h1>

@stop


@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline" value="{{ $filters['filter'] ?? '' }}">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control">
                <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i></button>
            </form>
        </div>
        @include('admin.includes.alerts')
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td style="width=120px">
                                {{-- <ahref="{{  route('details.profile.index',$profile->url) }}" class="btn btn-primary">Detalhes</a> --}}
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning">VER</a>
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
