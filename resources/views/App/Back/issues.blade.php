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
                    @forelse($Issues as $issue)
                        <a href="/Issues" class="ticket-list-item">
                            <div class="letter-logo">
                                <p>{{ $issue->User }}</p>
                            </div>
                            <div class="display-details">
                                <p class="new-badge-display">New</p>
                                <p class="title">How do I replace my password</p>
                                <div class="summary-details">
                                    <span>Username</span>
                                    <span>.</span>
                                    <span>12 hours Ago</span>
                                </div>
                            </div>
                            <div class="sub-details">
                                <div class="content-group">
                                    <p>Priority</p>
                                    <p style="color: orange">: Low</p>
                                </div>
                                <div class="content-group">
                                    <p>Level</p>
                                    <p style="color: green">: Standard</p>
                                </div>
                                <div class="content-group">
                                    <p>Status</p>
                                    <p style="color: grey">: Pending</p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p>No Issues Found</p>
                    @endforelse

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
