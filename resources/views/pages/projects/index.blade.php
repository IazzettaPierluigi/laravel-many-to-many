@extends('layouts.app')

@section('content')
<main class="container">

    <h1>lista dei projects</h1>

<a class="btn btn-primary " href="{{ route('dashboardprojects.create') }}">create</a>

    <div
        class="table-responsive"
    >
        <table
            class="table"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">SOFTWARE</th>
                    <th scope="col">SLUG</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $item)
                
                <tr class="">
                    <td>{{ $item->id }}</td>
                    
                    {{-- link per utilizzare la show --}}
                   
                    <td>

                        <a href="{{ route('dashboardprojects.show', $item->slug)}}"> {{ $item->title }} </a>

                    </td>


                    <td>{{ $item->img }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->software }}</td>
                    <td>
                    
                        <a class="btn btn-primary " href="{{ route('dashboardprojects.edit', $item->slug) }}">Modifica</a>
                        
                        <form method="POST" action="{{ route('dashboardprojects.destroy', $item->slug)}}">
                        
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger ">
                             Elimina
                            </button>

                        
                        </form>
                    
                    </td>


                </tr>
            @endforeach
               
            </tbody>
        </table>
    </div>
    
</main>
@endsection