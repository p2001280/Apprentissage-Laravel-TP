@extends('base')

@section('content')
<div class="bg-light p-5 mb-5 text-center">
    <div class="container">
        <h1>Agence Lorem ipsum</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aut cumque dolore error expedita itaque iure iusto magni, molestiae numquam omnis provident quae repellat sint soluta tempora unde voluptate voluptatibus.</p>
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
