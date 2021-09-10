@extends('layouts.app')

@section('content')
    <div class="Issues-view">
        <div class="back-end-action-bar">
            <div class="sort-component Issues-section">
                <form action="">
                    <label for="sort_elements">Sort:</label>
                    <select class="form-control" name="sort_elements" id="sort_elements" onchange="data_action()">
                        <option value="0" >None</option>
                        <option value="1" >Latest First</option>
                        <option value="2" >Latest Last</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="Item-view-content ">
            <div class="dashboard-list-view-horizontal">
                <x-Layouts.Lists.Issues-list :issues="$issues">

                </x-Layouts.Lists.Issues-list>
            </div>
            <div class="dashboard-filter-view">
                <form action="">
                    <div class="heading-section">
                        <h3>FILTERS</h3>
                        <button onclick="data_action()">APPLY</button>
                    </div>
                    <div class="form-fields-filter">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" id="Status">
                                <option value="0">All</option>
                                @php
                                    $statuses = \App\Models\Status::all();

                                @endphp

                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Level</label>
                            <select class="form-control" id="Level">
                                <option value="0">All</option>
                                @php
                                    $Levels = \App\Models\Level::all();

                                @endphp

                                @foreach($Levels as $Level)
                                    <option value="{{ $Level->id }}">{{ $Level->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Priority</label>
                            <select class="form-control" id="Priority">
                                <option value="0">All</option>
                                @php
                                    $Prioritys = \App\Models\Priority::all();

                                @endphp

                                @foreach($Prioritys as $Priority)
                                    <option value="{{ $Priority->id }}">{{ $Priority->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .back-content-body {
            overflow: hidden;
        }
    </style>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function collect_filters() {
            let sort_data = $('#sort_elements').val();
            let status_data = $('#Status').val()
            let Priority_data = $('#Priority').val()
            let Level_data = $('#Level').val()

            let data = {
                'Sort': sort_data,
                'Status': status_data,
                'Priority': Priority_data,
                'Level': Level_data,
            };

            return data;
        }

        function fetch_data(data,callback){
            $.ajax({
                type: 'POST',
                url: '/sortIssues',
                data: data,
                dataType: 'json',
                success: function (data) {
                    callback(data);
                },
                error: function (data) {
                    let elem = $('.dashboard-list-view-horizontal').html(data.responseText);
                }
            });
        }

        function data_action() {
            event.preventDefault();
            let data = collect_filters();
            fetch_data(data,callback)

            function callback(msg){

                console.log(msg);
            }
        }


    </script>
@endsection

{{--            <div class="paginator-1-component">--}}
{{--                <p>1-11 of 200</p>--}}
{{--                <div class="pagination-page-controller">--}}
{{--                    <button class="Prev"> &#60;</button>--}}
{{--                    <button class="Next"> &#62;</button>--}}
{{--                </div>--}}
{{--                <select class="form-control" name="sort_elements" id="sort_elements">--}}
{{--                    <option>Page</option>--}}
{{--                </select>--}}
{{--            </div>--}}
