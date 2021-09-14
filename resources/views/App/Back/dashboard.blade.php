@extends('layouts.app')

@section('content')
    <div class="dashboard-view">
        <div class="display_panel">
            <div class="layout-1">
                <div class="card-holder">
                    <p>Users</p>
                    <p>{{$users}}</p>
                </div>
                <div class="card-holder">
                    <p>Clients</p>
                    <p>{{$clients}}</p>
                </div>
                <div class="card-holder">
                    <p>Admin</p>
                    <p>{{$Admin}}</p>
                </div>
                <div class="card-holder">
                    <p>Technicians</p>
                    <p>{{$Technicians}}</p>
                </div>
                <div class="dashboard-description">
                    <div class="row-item-1">
                        <div class="card-holder-bottom">
                            <h3>Customer Ratings</h3>
                            <div class="column-grid">
                                <div class="holder">
                                    <p>Positive</p>
                                    <p style="color: #4fbf47">{{$positive_solutions}}%</p>
                                </div>
                            </div>
                            <div class="column-grid">
                                <div class="holder">
                                    <p>Negative</p>
                                    <p style="color:red">{{$negative_solutions}}%</p>
                                </div>
                            </div>
                            <div class="column-grid">
                                <div class="holder">
                                    <p>Average</p>
                                    <p style="color: orange">{{$average_voted}}%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-item-2">
                        <div class="card-holder-bottom">
                            <div class="display-cards">
                                <P>Received</P>
                                <p>{{$all_issues}}</p>
                            </div>
                            <div class="display-cards">
                                <P>Resolved</P>
                                <p>{{ $get_resolved }}</p>
                            </div>
                            <div class="display-cards">
                                <P>Unresolved</P>
                                <p>{{$get_Unresolved}}</p>
                            </div>
                            <div class="display-cards">
                                <P>Closed</P>
                                <p>{{$closed_issues}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layout-2">
                <h3>High Priority Issues</h3>
                <div class="list-horizontal-element">


                    @foreach($top_five_Issues as $issue)
                        <div class="list-elem">
                            <P>{{ $issue->subject }}</P>
                            <p></p>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection
