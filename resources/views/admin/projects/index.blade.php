@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h5>Nome utente: {{ Auth::user()->name }}</h5>
        <h6 class="text-secondary">{{ Auth::user()->email }}</h6>
        <h3 class="text-center mt-4">La lista dei progetti</h3>
        <h5> Numero di progetti presenti: {{ $projects->count() }}</h5>
        <div class="row justify-content-center">
            <div class="col-8">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Titolo</th>
                            <th scope="col">Data di creazione</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->title }}</th>
                                <td>{{ $project->created_at }}</td>
                                <td>
                                    <a class="btn btn-light" href="{{ route('admin.projects.show', $project->slug) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-light" href="{{ route('admin.projects.edit', $project->slug) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-light" type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
