@extends('layouts.app')

@section('content')
    <div class="report-view">
        <div class="date-picker">
            <a class="Active" href="">Day</a>
            <a href="">Week</a>
            <a href="">Month</a>
        </div>
        <div class="button-selector">
            <div class="grouper group1">
                <div class="top-layer">
                    <button><p>Issues</p><span>200</span></button>

                </div>
                <div class="bottom-layer">
                    <button><p>Resolved</p><span>200</span></button>
                    <button><p>Unresolved</p><span>200</span></button>
                </div>
            </div><div class="grouper group1">
                <div class="top-layer">
                    <button><p>Solutions</p><span>200</span></button>

                </div>
                <div class="bottom-layer">
                    <button><p>Up-votes</p><span>200</span></button>
                    <button><p>Down-votes</p><span>200</span></button>
                </div>
            </div>
        </div>
        <div class="table-content">
            @php
            $issues = \App\Models\Issue::all();
            @endphp


            <x-Elements.issues-table :table="__('solutions-report-table')" :issues="$issues">

            </x-Elements.issues-table>
        </div>
    </div>
@endsection
