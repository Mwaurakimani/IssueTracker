@extends('layouts.app')

@section('content')
    <div class="settings-view">
        <div class="field-elemental">
            @php
                $tags = [
                    'Levels',
                    'Status',
                    'Priority'
                ];
            @endphp
            @foreach($tags as $tag)
                <x-Elements.settings-anchor :tag="$tag">

                </x-Elements.settings-anchor>
            @endforeach
        </div>
        <div class="body-elemental">

        </div>

        <script>
            //add skill to user
            //set up ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //Levels

            function getItem(id,linker) {

                $.ajax({
                    type: 'POST',
                    url: '/getItem',
                    dataType: 'json',
                    data: {
                        'id': id,
                        'linker':linker
                    },
                    success: function (data) {
                        $('.form-view').html(data.resp);
                    },
                    error: function (xhr) {
                        console.log(xhr.responseJSON);
                    }
                });
            }

            function updateItem(id,title) {
                event.preventDefault();

                let name = $('#name').val();
                let description = $('#description').val();

                if (id == undefined) {
                    alert('No Level was selected');
                }

                $.ajax({
                    type: 'POST',
                    url: '/updateItem',
                    dataType: 'json',
                    data: {
                        id: id,
                        title: title,
                        name: name,
                        description: description,
                    },
                    success: function (data) {
                        if (data.resp) {
                            alert("Updated Successfully");

                            switch (title){
                                case 'Levels':
                                    $('#Levels_form_button').click();
                                    break;
                                case 'Status':
                                    $('#Status_form_button').click();
                                    break;
                                case 'Priority':
                                    $('#Priority_form_button').click();
                                    break;
                            }
                        } else {
                            alert("Error updating level");
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseJSON);
                    }
                });
            }

            function addNewItem(title) {
                event.preventDefault();

                let name = $('#name').val();
                let description = $('#description').val();

                $.ajax({
                    type: 'POST',
                    url: '/createItem',
                    dataType: 'json',
                    data: {
                        title : title,
                        name: name,
                        description: description,
                    },
                    success: function (data) {

                        if (data.resp) {
                            alert("Created Successfully");

                            switch (title){
                                case 'Levels':
                                    $('#Levels_form_button').click();
                                    break;
                                case 'Status':
                                    $('#Status_form_button').click();
                                    break;
                                case 'Priority':
                                    $('#Priority_form_button').click();
                                    break;
                            }
                        } else {
                            alert("Error updating level");
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseJSON);
                    }
                });
            }

            function deleteItem(id,title) {
                event.preventDefault()

                if (id == 'undefined') {
                    alert("No Level selected");
                }

                $.ajax({
                    type: 'DELETE',
                    url: '/deleteItem',
                    dataType: 'json',
                    data: {
                        id: id,
                        title: title,
                    },
                    success: function (data) {
                        if (data.resp) {
                            alert("Deleted successfully");

                            switch (title){
                                case 'Levels':
                                    $('#Levels_form_button').click();
                                    break;
                                case 'Status':
                                    $('#Status_form_button').click();
                                    break;
                                case 'Priority':
                                    $('#Priority_form_button').click();
                                    break;
                            }
                        } else {
                            alert("Error updating level");
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseJSON);
                    }
                });

            }

        </script>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function loadView(view) {
                event.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '/settings/View',
                    dataType: 'json',
                    data: {
                        view: view,
                    },
                    success: function (data) {
                        console.log(data);

                        let elem = $('.body-elemental');

                        if (data.resp) {
                            elem.html(data.resp);
                        } else {
                            alert("Error updating level");
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseJSON);
                    }
                });
                return false;
            }
        </script>
    </div>
@endsection
