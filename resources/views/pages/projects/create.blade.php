@extends('layouts.app')

@section('content')
    <main class="container">
<h1>crea un nuovo progetto</h1>
        <form 
        action="{{ route('dashboardprojects.store') }}" 
        enctype="multipart/form-data"
        method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title">
                @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <input type="file"
                name="img"
                id="img"
                class="form-control"
                @error('img')
                    is-invalid
                @enderror
                >
            </div>

{{-- creiamo la select per selezionare il TYPE --}}
<div class="mb-3">
    <label for="type_id" class="form-label">Scegli il type</label>
    <select class="form-select" name="type_id" id="type_id">
        <option selected value="">Seleziona un type</option>
        
        @foreach ($types as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="software" class="form-label">Software</label>
                <select class="form-select" name="software" id="software">
                    <option value="HTML">HTML</option>
                    <option value="CSS">CSS</option>
                    <option value="Laravel">Laravel</option>
                    <option value="PHP">PHP</option>
                    <option value="JavaScript">JavaScript</option>
                    <option value="Vue">Vue</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Crea</button>
        
        </form>
    </main>
@endsection 
