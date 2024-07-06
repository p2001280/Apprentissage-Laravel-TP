@extends('admin.admin')

@section('title', 'Toutes les options')

@section('content')

<div class="d-flex justify-content-between align-items">
    <div>
        <h1>@yield('title')</h1>
    </div>
    <div>
        <a href="{{ route('admin.option.create')}}" class="btn btn-primary">Ajouter une option</a>
    </div>
</div>
<table class="table table-stripped">
    <thead>
        <tr>
            <th>Nom</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($options as $option)
        <tr>
            <td>{{ $option->name }}</td>
            <td>
                <div class="d-flex gap-2 w-100 justify-content-end">
                    <a href="{{ route('admin.option.edit', $option) }}" class="btn btn-primary">Editer</a>
                    <form action='{{ route('admin.option.destroy', $option) }}' method='post'>
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $options->links() }}
@endsection