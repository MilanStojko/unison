@extends('layouts.menu')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div><h3>Admin / La tua dashboard</h3></div>
                        <div class="card-head_content d-flex justify-content-between align-items-center">
                            <img src="">
                            <h3>
                                {{$user->name}} B
                            </h3>
                        </div>
                    </div>
                    <div class="card-content p-4">

                        <div class="profile-image">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
