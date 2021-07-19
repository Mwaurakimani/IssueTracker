@extends('layouts.app')

@section('content')
<div class="dashboard-view">
    <div class="display_panel">
        <div class="layout-1">
            <div class="card-holder">
                <p>Active Team Member</p>
                <p>55</p>
            </div>
            <div class="card-holder">
                <p>Active Team Member</p>
                <p>55</p>
            </div>
            <div class="card-holder">
                <p>Active Team Member</p>
                <p>55</p>
            </div>
            <div class="card-holder">
                <p>Active Team Member</p>
                <p>55</p>
            </div>
            <div class="dashboard-description">
                <div class="row-item-1">
                    <div class="card-holder-bottom">
                        <h3>Customer Ratings</h3>
                        <div class="column-grid">
                            <div class="holder">
                                <p>Positive</p>
                                <p style="color: #4fbf47" >80%</p>
                            </div>
                        </div>
                        <div class="column-grid">
                            <div class="holder">
                                <p>Neutral</p>
                                <p style="color: orange" >80%</p>
                            </div>
                        </div>
                        <div class="column-grid">
                            <div class="holder">
                                <p>Negative</p>
                                <p style="color:red" >80%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-item-2">
                    <div class="card-holder-bottom">
                        <div class="display-cards">
                            <P>Received</P>
                            <p>200</p>
                        </div>
                        <div class="display-cards">
                            <P>Received</P>
                            <p>200</p>
                        </div>
                        <div class="display-cards">
                            <P>Received</P>
                            <p>200</p>
                        </div>
                        <div class="display-cards">
                            <P>Received</P>
                            <p>200</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layout-2">
            <h3>Unresolved</h3>
            <div class="list-horizontal-element">
                <div class="list-elem">
                    <P>Element</P>
                    <p>4</p>
                </div>
                <div class="list-elem">
                    <P>Element</P>
                    <p>4</p>
                </div>
                <div class="list-elem">
                    <P>Element</P>
                    <p>4</p>
                </div>
                <div class="list-elem">
                    <P>Element</P>
                    <p>4</p>
                </div>
                <div class="list-elem">
                    <P>Element</P>
                    <p>4</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
