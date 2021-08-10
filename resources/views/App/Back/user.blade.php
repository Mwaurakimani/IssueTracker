@extends('layouts.app')

@section('content')
    <div class="Users-view">
        <div class="back-end-action-bar">
            <div class="sort-component">
                <form action="">
                    <label for="sort_elements">Sort By :</label>
                    <select class="form-control" name="sort_elements" id="sort_elements">
                        <option>Date Created</option>
                    </select>
                </form>
            </div>
            <div class="paginator-1-component">
                <p>1-11 of 200</p>
                <div class="pagination-page-controller">
                    <button class="Prev"> &#60;</button>
                    <button class="Next"> &#62;</button>
                </div>
                <select class="formm-control" name="sort_elements" id="sort_elements">
                    <option>Page</option>
                </select>
            </div>
        </div>
        <div class="Item-view-content ">
            <div class="dashboard-list-view-horizontal">
                <div class="issues-content-holder">

                    @for($i = 0; $i < 10;$i++)
                        <a href="/Issues" class="ticket-list-item">
                            <div class="letter-logo">
                                <p>P</p>
                            </div>
                            <div class="info-content">
                                <div class="elem-holder" style="grid-column: 1/2">
                                    <h6>Name</h6>
                                    <p>UserName</p>
                                </div>
                                <div class="elem-holder" style="grid-column: 2/3">
                                    <h6>Title</h6>
                                    <p>UserName</p>
                                </div>
                                <div class="elem-holder" style="grid-column: 3/4">
                                    <h6>Email</h6>
                                    <p>anclknaskcnlaknsclnasknclansk</p>
                                </div>
                                <div class="elem-holder"style="grid-column: 4/5">
                                    <h6>Phone</h6>
                                    <p>UserName</p>
                                </div>
                                <div class="elem-holder" style="grid-column: 5/6">
                                    <h6>Department</h6>
                                    <p>UserName</p>
                                </div>
                            </div>
                            <div class="action-element">
                                <div class="btn-action-holder">
                                    <img src="{{ asset("storage/Images/open.png") }}" alt="">
                                </div>
                                <div class="btn-action-holder">
                                    <img src="{{ asset("storage/Images/trash.png") }}" alt="">
                                </div>
                            </div>
                        </a>
                    @endfor
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
