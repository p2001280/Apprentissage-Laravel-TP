@extends('base')

@section('title', $property->title)

@section('content')

<div class="container">

    <h1>{{ $property->title }}</h1>
    <h2>{{ $property->rooms }} pièces - {{ $property->surface }}m²</h2>

    <div class="text-primary fw-bold" style="font-size: 4rem;">
        {{ number_format($property->price, 0, ',', ' ') }} €
    </div>

    <hr>

    <div class="mt-4">
        <h4>Intéressé par ce bien ?</h4>
        @include('shared.flash')
        @if($property->image)
        <img style="width: 100%; height: 150px; object-fit:cover;" src ="{{ $property->imageUrl() }}" alt=""/>
        @endif
        <form action="{{ route('property.contact', $property) }}" method="post" class="vstack gap-3">
            @csrf
            <div class="row">
                @include('shared.input', ['class' => 'col', 'name' => 'lastname', 'label' => 'Nom'])
                @include('shared.input', ['class' => 'col', 'name' => 'firstname', 'label' => 'Prénom'])
            </div>
            <div class="row">
                @include('shared.input', ['class' => 'col', 'name' => 'phone', 'label' => 'Téléphone'])
                @include('shared.input', [
                    'type' => 'email',
                    'class' => 'col',
                    'name' => 'email',
                    'label' => 'Courriel',
                ])
            </div>
            <div class="row">
                @include('shared.input', [
                    'type' => 'textarea',
                    'class' => 'col',
                    'name' => 'message',
                    'label' => 'Votre message',
                ])
            </div>
            <button class="btn btn-primary">Nous contacter</button>
        </form>
    </div>
    <div @class($property->sold == 1 ? "alert alert-danger mt-4" : "alert alert-success mt-4" )>{{ $property->sold == 1 ? 'Le bien a été vendu' : 'Toujours disponible'}}</div>
    <div class="mt-4">
        <p>{!! nl2br(e($property->description)) !!}</p>
        <div class="row">
            <div class="col-8">
                <h2>Caractéristiques</h2>
                <table class="table table-striped">
                    <tr>
                        <td>Surface habitable</td>
                        <td>{{ $property->surface }}</td>
                    </tr>
                    <tr>
                        <td>Pièces</td>
                        <td>{{ $property->rooms }}</td>
                    </tr>
                    <tr>
                        <td>Chambres</td>
                        <td>{{ $property->bedrooms }}</td>
                    </tr>
                    <tr>
                        <td>Etage</td>
                        <td>{{ $property->floor ?: 'Rez-de-chaussée' }}</td>
                    </tr>
                    <tr>
                        <td>Localisation</td>
                        <td>
                            {{ $property->address }}<br/>
                            {{ $property->city }} ({{ $property->postal_code }})
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-4">
                <h2>Spécificités</h2>
                <ul class="list-group">
                    @foreach($property->options as $option)
                        <li class="list-group-item">{{ $option->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
