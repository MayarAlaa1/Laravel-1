
@extends('layouts.app')

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">ITI Blog</a>

  <!-- <div class="collapse navbar-collapse" id="navbarText"> -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">All Posts<span class="sr-only">(current)</span></a>
      </li>
    </ul>
   
  <!-- </div> -->
</nav>

@section('content')
      <div class="container m-5" style="text-align:center">
      <a href="{{route('posts.create')}}"  class="btn btn-success mb-5" >Create Post</a>
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                  <th scope="col">User Name</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                <tr>
                <th scope="row">{{ $post->id }}</th>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->description }}</td>

                  <td>{{ $post->user ? $post->user->name : 'not exist'}}</td>
                  <td>{{ $post->created_at->format('d-m-y')}}</td>
                

                <td><a href="{{route('posts.show',['post' => $post->id])}}" class="btn btn-primary btn-sm">View</a></td>
                <td><a href="{{route('posts.show',['post' => $post->id])}}" class="btn btn-warning btn-sm">Edit</a></td>
                <td> 
                    <form method="POST" action="{{route('posts.destroy',['post' => $post->id])}}" >
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>
                </td>
                </tr>
              @endforeach
              </tbody>
            </table>
      </div>

@endsection
