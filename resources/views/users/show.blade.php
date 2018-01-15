@extends('layout')
@section('content')
    <!--start container-->
    <div class="container">
        <div class="section">
            <div class="row">
                <!-- Form with validation -->
                <div class="col s12 m12 l12">
                    <div class="card-panel custom-card-panel">
                        <div class="custom-loader-wrapper">
                            <div class="preloader-wrapper big active custom-loader">
                                <div class="spinner-layer spinner-blue-only">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div><div class="gap-patch">
                                        <div class="circle"></div>
                                    </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <users-profile :user-id="{{Auth::user()->id}}"></users-profile>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
