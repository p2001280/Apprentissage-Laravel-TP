<div class="card mb-4">
    <div class="card-body">
        <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}" class="card-title h5 d-block">{{ $property->title }}</a>
        <p class="card-text mb-2">{{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }})</p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem">
            {{ number_format($property->price, 0, ',', ' ') }} €
        </div>
    </div>
</div>
