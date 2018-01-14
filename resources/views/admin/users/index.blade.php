@extends('layout')
@section('content')
     <!--start container-->
        <div class="container">
            <div class="section">
                <users-form></users-form>
                <users-list :user-id="{{Auth::user()->id}}"></users-list>
            </div>
        </div>
@endsection()
