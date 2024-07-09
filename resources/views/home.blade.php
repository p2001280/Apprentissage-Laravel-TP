@extends('base')

@section('content')
<div class="bg-light p-5 mb-5 text-center">
    <div class="container">
        <h1>Agence Maion</h1>
        <p>
            Chez Maion, nous transformons votre rêve de propriété en réalité. Forts de notre expertise et de notre passion pour l'immobilier, nous vous offrons une sélection inégalée de biens immobiliers de qualité, allant des appartements modernes en centre-ville aux maisons de charme à la campagne.
        </p>
    </div>
</div>

<div class="container">
    <h2>Nos derniers biens</h2>
    <div class="row">
        @foreach($properties as $property)
        <div class="col-md-4 mb-4">
            @include('property.card', ['property' => $property])
        </div>
        @endforeach
    </div>
</div> 
@endsection
