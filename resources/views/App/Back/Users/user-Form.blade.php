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
{{--            <div class="paginator-1-component">--}}
{{--                <p>1-11 of 200</p>--}}
{{--                <div class="pagination-page-controller">--}}
{{--                    <button class="Prev"> &#60;</button>--}}
{{--                    <button class="Next"> &#62;</button>--}}
{{--                </div>--}}
{{--                <select class="formm-control" name="sort_elements" id="sort_elements">--}}
{{--                    <option>Page</option>--}}
{{--                </select>--}}
{{--            </div>--}}
        </div>
        <div class="Item-view-content ">
            <div class="user-content-holder">
                <div class="main-panel">
                    <div class="acc-img">
                        <div class="icon-holder">
                            <p>{{ $user->name[0] }}</p>
                        </div>
                    </div>
                    <form class="acc-details" action="">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input id="email" type="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" type="text" class="form-control" value="{{ $user->title }}">
                        </div>
                        <div class="form-group">
                            <label for="dateCreated">Date Created</label>
                            <input id="title" type="text" class="form-control" value="{{ $user->created_at }}">
                        </div>
                        <div class="button-display">
                            <button>Save Changes</button>
                        </div>
                    </form>
                </div>
                <div class="sub-panel">
                    <h4>Change Password</h4>
                    <form class="acc-details" action="">
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input id="current_password" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input id="new_password" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input id="confirm_password" type="password" class="form-control">
                        </div>
                        <button>Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .back-content-body {
            overflow: hidden;
        }
    </style>
@endsection
