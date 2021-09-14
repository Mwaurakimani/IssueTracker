@extends('layouts.app')

@section('content')
    <div class="over-lay">
        <span onclick="toggle_overlay_visibility(0)">X</span>
        <div class="content-section">
            <div class="filter_disp">
                <div class="input-elem">
                    <label for="Resource">Resource</label>
                    <select name="Resource" id="Resource" onchange="switch_attribute()">
                        <option value="0">Issues</option>
                        <option value="1">Solutions</option>
                    </select>
                </div>
                <div id="Attribute" class="input-elem" data-display="0">
                    <label for="">Attribute</label>
                    <select name="issueSelector" id="issueSelector">
                        <option value="0">All</option>
                        <option value="1">Solved</option>
                        <option value="2">Unsolved</option>
                    </select>
                    <select name="solutionsSelector" id="solutionsSelector">
                        <option value="0">All</option>
                        <option value="1">Upvoted</option>
                        <option value="2">Downvoted</option>
                    </select>
                    <select name="accountSelector" id="accountSelector">
                        <option value="0">All</option>
                        <option value="1">Admin</option>
                    </select>

                    <script>
                        function switch_attribute() {
                            let Resource_val = $('#Resource').val();


                            if (Resource_val == 0) {
                                $('#issueSelector').css('display', 'inline-block');
                                $('#solutionsSelector').css('display', 'none');
                                $('#accountSelector').css('display', 'none');
                            } else if (Resource_val == 1) {
                                $('#issueSelector').css('display', 'none');
                                $('#solutionsSelector').css('display', 'inline-block');
                                $('#accountSelector').css('display', 'none');
                            } else {
                                $('#issueSelector').css('display', 'none');
                                $('#solutionsSelector').css('display', 'none');
                                $('#accountSelector').css('display', 'inline-block');
                            }
                        }
                    </script>
                </div>
                {{--                <div class="input-elem">--}}
                {{--                    <label for="">Sub Attribute</label>--}}
                {{--                    <select name="" id="">--}}
                {{--                        <option value="">None</option>--}}
                {{--                        <option value="">All</option>--}}
                {{--                    </select>--}}
                {{--                </div>--}}

                <div class="button-elem">
                    <button onclick="apply_filter()">Apply</button>
                    <button onclick="toggle_overlay_visibility(0)">Cancel</button>

                    <script>
                        function apply_filter() {
                            let Resource_val = $('#Resource').val();
                            let Title = $('#Resource').children('option');

                            Title.each((index, element) => {
                                if ($(element).val() == Resource_val) {
                                    let heading = ($(element).text());

                                    heading = heading+" Report";

                                    $('#Heading').text(heading);
                                }
                            });

                            let attribute_array = [
                                [$('#issueSelector'), $('#issueSelector').css('display')],
                                [$('#solutionsSelector'), $('#solutionsSelector').css('display')],
                                [$('#accountSelector'), $('#accountSelector').css('display')]
                            ];

                            let attribute = null;

                            attribute_array.forEach(elements => {
                                if (elements[1] == 'inline-block') {
                                    attribute = elements[0];
                                }
                            });

                            let attribute_val = attribute.val();

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                type: 'POST',
                                url: '/filterReports',
                                data: {
                                    resource: Resource_val,
                                    attribute: attribute_val
                                },
                                dataType: 'json',
                                success: function (data) {
                                    console.log(data);
                                    $('.table-content').html(data);
                                    toggle_overlay_visibility(0);
                                },
                                error: function (data) {
                                    console.log(data);
                                    if((data != "") || data != "undefined"){
                                        $('.table-content').html(data.responseText);
                                    }
                                }
                            });

                        }
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="filter_bar">
        <div class="report-title">
            <h4 id="Heading">Issues Report</h4>
        </div>
        <button onclick="toggle_overlay_visibility()">Filter</button>
    </div>
    <div class="table-content">
        @php
            $issues = \App\Models\Issue::all();
        @endphp


        <x-Elements.Tables.issues-table :table="__('solutions-report-table')" :issues="$issues">

        </x-Elements.Tables.issues-table>
    </div>
    <script>
        function toggle_overlay_visibility(data = 1) {
            event.preventDefault();
            if (data == 0) {
                console.log("here");
                $(".over-lay").fadeOut();
            } else {
                console.log("there");
                $(".over-lay").fadeIn();
            }
        }
    </script>

@endsection
