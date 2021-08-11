<h5>{{ $title }}</h5>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" id="name" class="form-control" value="{{ isset($data) ? $data->name : '' }}">
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description">{{ isset($data) ? $data->description : '' }}</textarea>
</div>
<div class="button-group">

    @isset($data)
        <button onclick="updateItem({{ $data->id }},'{{ $title }}')">Update</button>
        <button onclick="deleteItem({{ $data->id }},'{{ $title }}')">Delete</button>
    @else
        <button onclick="addNewItem('{{$title}}')">Add</button>
    @endisset

</div>
