@extends('welcome')

@section('title', 'قائمة المستخدمين')

@section('content')

<table class="table table-success table-striped">
  ... <div class="container">
        <h1>User list</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>role</th>
                    <th>image</th>

            </thead>
            <tbody>
                @foreach($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>${{ $item->role }}</td>
                        <td>
                        <img src="{{ asset('images/users/' .  $item->image)  }}" alt=" "
                                    style="width: 45px; height: auto;">
                        {{ $item->created_at->format('Y-m-d') }}</td>
                         <td><div class="d-flex justify-content-center">
                                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning btn-sm mx-2">تعديل</a></td>
                              <td>  <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mx-2" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                </form>
                                </td>
                            </div>
                     </tr>
                @endforeach
            </tbody>
        </table>

        @if($users->isEmpty())
            <p>No items found.</p>
        @endif
    </div>
