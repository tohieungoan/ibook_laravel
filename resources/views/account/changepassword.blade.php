@extends('layouts.app')
@section('content')
<style>
    body {
        margin-top: 20px;
        background-color: #f2f6fc;
        color: #69707a;
    }

</style>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="index.html">Quản lý tài khoản</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Bảo mật</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link " href="{{ route('accountmanager') }}">Profile</a>
            <a class="nav-link" href="{{ route('billing') }}">Billing</a>
            <a class="nav-link active ms-0" href="{{ route('changepasss') }}">Security</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-lg-8">
                @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <!-- Form Group (current password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="currentPassword">Current Password</label>
                                <input class="form-control" name="currentPassword" id="currentPassword" type="password"
                                    placeholder="Enter current password">
                            </div>
                            <!-- Form Group (new password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="newPassword">New Password</label>
                                <input class="form-control" id="newPassword" name="newPassword" type="password"
                                    placeholder="Enter new password">
                            </div>
                            <!-- Form Group (confirm password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                <input class="form-control" id="confirmPassword" name="confirmPassword" type="password"
                                    placeholder="Confirm new password">
                            </div>
                            <button class="btn btn-primary" >Save</button>
                        </form>
                    </div>
                </div>
                <!-- Security preferences card-->

            </div>
            <div class="col-lg-4">
                <!-- Two factor authentication card-->

                <!-- Delete account card-->
                <div class="card mb-4">
                    <div class="card-header">Delete Account</div>
                    <div class="card-body">
                        <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to
                            delete your account, select the button below.</p>
                            <a class="btn btn-danger-soft text-danger" href="{{ route('deleteAccount') }}">I understand, delete my
                                account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
