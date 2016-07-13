@extends('layouts.layout')

@section('title','Q&A')

@section('css')
@stop

@section('js')
@stop

@section('content')
 <div class="container">
          
          <div class="row">
            <div class="col-md-4">
                         <div class="jumbotron">
                    
                    <img src="{{ asset('image/department.jpg') }}" class="img-circle" alt="Cinque Terre" width="304" height="236">
                    <h1>{{ Auth::user()->name }}</h1>
                    <h2>XX系</h2>
                    <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.This is a simple hero unit, a simple jumblling extra attention to featured content or information.This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>

                    <p><a class="btn btn-primary btn-lg">Learn more</a></p>
                  </div>
            </div>
          </div>
         
</div>
@endsection


