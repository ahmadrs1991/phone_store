@extends('welcome')

@section('title', 'تعديل المستخدم')

@section('content')
    <div class="container">
        <h1>تعديل المستخدم</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">اسم المستخدم</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
             <div class="form-group">
                <label for="email"> الايميل</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="role"> الدور </label>
                <textarea class="form-control @error('role') is-invalid @enderror" id="role" name="role">{{ old('role', $user->role) }}</textarea>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">الصورة</label>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                @if($user->image)
                    <div class="mt-2">
                        <img src="{{ asset('images/users/' . $user->image) }}" alt="{{ $user->name }}" width="100">
                    </div>
                @endif
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">تحديث</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
@endsection
