<?php

namespace App\Http\Controllers\Admin;
use App\Models\Property;
use App\Models\Option;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PropertyFormRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.properties.form', [
            'property' => new Property(),
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        // $property = Property::create($request->validated());
        $property = Property::create($this->extractData(new Property(), $request));
        $property->options()->sync($request->validated('options'));
        return redirect()->route('admin.property.index')->with('success', 'Le bien a bien été créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    private function extractData(Property $property, PropertyFormRequest $request): array 
    {
        $data = $request->validated();
        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if($image === null || $image->getError()) {
            return $data;
        }
        if($property->image) {
            Storage::disk('public')->delete($property->image);
        }
        $data['image'] = $image->store('property', 'public');
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->options()->sync($request->validated('options'));
        $property->update($this->extractData(new Property(), $request));
        return redirect()->route('admin.property.index')->with('success', 'Le bien a été modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.property.index')->with('success', 'Le bien a été supprimé avec succès !');
    }
}
