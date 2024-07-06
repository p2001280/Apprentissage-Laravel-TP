@php
$class ??= null;
$name ??=  '';   
$value ??= '';
$options ??= [];
$label = ucfirst($name);
@endphp

<div @class(['form-group', $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" multiple>
        @foreach($options as $k => $v)
            {{ $v }}
            <option value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
