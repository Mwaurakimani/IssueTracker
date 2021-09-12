@extends('layouts.app')

@section('content')
    <div class="over-lay">
        <span onclick="toggle_overlay_visibility(0)">X</span>
        <div class="content-section">
        </div>
    </div>

    <div class="filter_bar">
        <div class="report-title">
            <h4>Report Title</h4>
        </div>
        <button>Filter</button>
    </div>

    <script>
        function toggle_overlay_visibility(data = 1){
            if(data == 0){
                $(".over-lay").fadeOut();
            }else {
                //open
            }
        }
    </script>

@endsection
