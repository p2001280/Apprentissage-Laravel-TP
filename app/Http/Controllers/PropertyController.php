<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\Models\Property;
use App\Models\User;
use App\Http\Requests\SearchPropertiesRequest;
use App\Http\Requests\PropertyContactRequest;
use App\Mail\PropertyContactMail;
use Illuminate\Support\Facades\Mail;
use App\Events\ContactRequestEvent;
use App\Notifications\ContactRequestNotification;
use Illuminate\Support\Facades\Notification; // Ajoutez cette ligne
use App\Jobs\DemoJob;

class PropertyController extends Controller
{

    public function index(SearchPropertiesRequest $request) {
        $query = Property::query()->orderBy('created_at', 'desc');
        if($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }

        if($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }

        if($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $rooms);
        }

        if($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        }

        return view('property.index', [
            'properties' => $query->withTrashed()->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property) 
    {
        DemoJob::dispatch($property)->delay(now()->addSeconds(10));
        $expectedSlug = $property->getSlug();
        if($slug !== $expectedSlug) {
            redirect()->route('property', ['slug' => $expectedSlug, 'property' => $property]);
        }

        return view('property.show', [
            'property' => $property
        ]);
    }

    public function contact(Property $property, PropertyContactRequest $request)
    {
        ContactRequestEvent::dispatch($property, $request->validated());
        Notification::route('mail', 'john@admin.fr')->notify(new ContactRequestNotification($property, $request->validated()));
        // $user = User::first();
        // $user->notify(new ContactRequestNotification($property, $request->validated()));
  
        return redirect()->back()->with('success', ' Votre demande de contact a bien été envoyée');
    }

}
