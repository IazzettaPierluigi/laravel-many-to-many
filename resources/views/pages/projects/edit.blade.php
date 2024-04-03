@extends('layouts.app')

@section('content')
    <main class="container">
<h1>Modifica il progetto</h1>
        <form action="{{ route('dashboardprojects.update', $project->slug) }}" method="POST"   enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $project->title)}}">
                @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                @if ($project->img)
                    <img class="w-25" src="{{ asset('/storage/' . $project->img) }}" alt="">

                    <input type="file"
                    name="img"
                    id="img"
                    class="form-control"
                    @error('img')
                        is-invalid
                    @enderror
                    >
                @endif
            </div>

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
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $project->description) }}
                </textarea>
            </div>

            <div class="mb-3">
                <label for="software" class="form-label">Software</label>
                <select class="form-select" name="software" id="software">
                    <option value="HTML" {{ old('software', $project->software) === 'HTML' ? 'selected' : '' }}>HTML</option>
                    <option value="CSS" {{ old('software', $project->software) === 'CSS' ? 'selected' : '' }}>CSS</option>
                    <option value="Laravel" {{ old('software', $project->software) === 'Laravel' ? 'selected' : '' }}>Laravel</option>
                    <option value="PHP" {{ old('software', $project->software) === 'PHP' ? 'selected' : '' }}>PHP</option>
                    <option value="JavaScript" {{ old('software', $project->software) === 'JavaScript' ? 'selected' : '' }}>JavaScript</option>
                    <option value="Vue" {{ old('software', $project->software) === 'Vue' ? 'selected' : '' }}>Vue</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Modifica</button>
        
        </form>
    </main>
@endsection 
