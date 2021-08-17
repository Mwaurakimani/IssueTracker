@extends('layouts.app')

@section('content')
    <div class="Issues-view">
        <div class="back-end-action-bar">
            <div class="sort-component">
                <form action="">
                    <label for="sort_elements">Sort By :</label>
                    <select class="form-control" name="sort_elements" id="sort_elements">
                        <option>Date Created</option>
                    </select>
                </form>
            </div>
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
        </div>
        <div class="Item-view-content ">
            <div class="dashboard-list-view-horizontal">

                <div class="issues-content-holder">

                    @if(!empty($issues))
                        @forelse($issues as $issue)
                            <a href="/Issues/{{ $issue->id }}" class="ticket-list-item">
                                <div class="letter-logo">
                                    <p>{{ $issue->User->name[0] }}</p>
                                </div>
                                <div class="display-details">
                                    <p class="new-badge-display">New</p>
                                    <p class="title">{{ $issue->subject }}</p>
                                    <div class="summary-details">
                                        <span>{{ $issue->User->name }}</span>
                                        <span>.</span>
                                        <span>{{ $issue->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="sub-details">
                                    <div class="content-group">
                                        <p>Priority</p>
                                        <p style="color: orange">: {{ $issue['Priority']->name }}</p>
                                    </div>
                                    <div class="content-group">
                                        <p>Level</p>
                                        <p style="color: green">: {{ $issue['Level']->name }}</p>
                                    </div>
                                    <div class="content-group">
                                        <p>Status</p>
                                        <p style="color: grey">: {{ $issue['Status']->name }}</p>
                                    </div>
                                </div>
                            </a>
                            @empty

                            @endforelse
                            @else
                                <p>No Issues Found</p>
                    @endif

                </div>

            </div>
            <div class="dashboard-filter-view">
                <form action="">
                    <div class="heading-section">
                        <h3>FILTERS</h3>
                        <button>APPLY</button>
                    </div>
                    <div class="form-fields-filter">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Team Member</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Group</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Team Member</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Group</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Team Member</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Group</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
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
@endsection
