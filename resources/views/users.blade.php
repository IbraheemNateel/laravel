@extends('layout.app');

@section('users')   
  <div class="container mt-4">
        <div class="offset-md-2 col-md-8">
            <div class="card">
              @if (isset ($user))
                <div class="card-header">
                    Update User
                </div>
                <div class="card-body">
                    <!-- Update User Form -->
                    <form action="{{url('update/'.$user->id)}}" method="POST">
                      @csrf
                        <!-- User Name -->
                        <div class="mb-3">
                            <label for="user-name" class="form-label">User Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <!-- User Email -->
                        <div class="mb-3">
                            <label for="user-email" class="form-label">User Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <!-- User Password -->
                        <div class="mb-3">
                            <label for="user-password" class="form-label">User Password</label>
                            <input type="password" name="password" id="password" class="form-control" value="{{ $user->password }}">
                        </div>

                        <!-- Update User Button -->
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
              @else
                <div class="card-header">
                    New User
                </div>
                <div class="card-body">
                    <!-- New User Form -->
                    <form action="create" method="POST">
                      @csrf
                        <!-- User Name -->
                        <div class="mb-3">
                            <label for="user-name" class="form-label">User Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="">
                        </div>
                        <!-- User Email -->
                        <div class="mb-3">
                            <label for="user-email" class="form-label">User Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="">    
                        </div>
                        <!-- User Password -->    
                        <div class="mb-3">
                            <label for="user-password" class="form-label">User Password</label>
                            <input type="password" name="password" id="password" class="form-control" value="">
                        </div>
                        <!-- Add User Button -->
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Add User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
              @endif
            <!-- Current Users -->
            <div class="card mt-4">
                <div class="card-header">
                    Current Users
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Password</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)
                            
                          
                            
                          
                            <tr>
                                <td>{{ $user -> name }}</td>
                                <td>{{ $user -> email }}</td> 
                                <td>{{ $user -> password }}</td>
                                <td>
                                    <form action="/delete/{{$user -> id }}" method="POST" class="d-inline">
                                      @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash me-2"></i>Delete
                                        </button>
                                    </form>
                                    <form action="/edit/{{$user -> id }}" method="POST" class="d-inline">
                                      @csrf
                                        <button type="submit" class="btn btn-warning">
                                            <i class="fa fa-edit me-2"></i>Edit
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                            
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
