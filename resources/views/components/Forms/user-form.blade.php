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
            @if(Auth::user()->title == 'Admin')
            <div class="button-display">
                <button>Save Changes</button>
            </div>
            @endif
        </form>
    </div>
    <div class="sub-panel">
        <h4>Change Password</h4>
        <form class="acc-details" action="/Account/ChangePassword/{{ $user->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input name="current_password" id="current_password" type="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input  name="new_password" id="new_password" type="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input name="confirm_password"  id="confirm_password" type="password" class="form-control">
            </div>
            <button type="submit">Change Password</button>
        </form>
    </div>
</div>
