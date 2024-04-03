@extends('layouts.app')

@section('content')
<main class="container text-center ">
<h1>Ecco il tuo progetto</h1>


<div class="row justify-content-center  ">
    @if ($project->img)
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('/storage/' . $project->img) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $project->title }}</h5>
          <p class="text-danger">
            {{ $project->type ? $project->type->name : 'Questo progetto non ha un type' }}
          </p>
          <p class="card-text">{{$project->description}}</p>
        </div>
      </div>
        
    @endif

 
</div>
</main>
@endsection

