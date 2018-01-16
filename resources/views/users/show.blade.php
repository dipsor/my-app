@extends('layout')
@section('content')
    <!--start container-->
    <div class="container">
        <div class="section">
            <div class="row">
                <!-- Form with validation -->
                <div class="col s12 m12 l12">
                    <div class="card-panel custom-card-panel">
                        <users-profile :user-id="{{Auth::user()->id}}"></users-profile>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
