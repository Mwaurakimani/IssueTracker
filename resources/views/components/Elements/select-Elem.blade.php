
<select name="{{$name}}" id="">
    @foreach($options as $option)
        <option value="{{ $option[0] }}" {{ $option[0] == $selected ? "selected" :" " }} >{{ $option[1] }}</option>
    @endforeach
</select>
