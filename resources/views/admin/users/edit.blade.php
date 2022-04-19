@extends('layouts.menu')

@section('content')  
    <div class="card-header py-4 d-flex justify-content-between align-items-center">
        <h2><i class="bi bi-pencil-square"></i> Modifica profilo</h2>
    </div>
    <div class="u_edit-form">
        <div class="u_edit-form_header">
            <h3>Modifica il mio profilo</h3>
        </div>
        <form action="{{ route('admin.users.update', auth()->user()) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            {{-- NOME --}}
            <div class="form-group">
                <label for="formGroupExampleInput">Nome</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="nome" value="{{ old('name', $user->name) }}" required>
            </div>
            {{-- COGNOME --}}
            <div class="form-group">
                <label for="formGroupExampleInput">Cognome</label>
                <input type="text" name="surname"
                    class="form-control @error('surname') is-invalid @enderror" placeholder="cognome"
                    value="{{ old('surname', $user->surname) }}" required>
            </div>
            {{-- DESC --}}
            <div class="form-group">
                <label>Bio</label>
                <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" cols="30" rows="10" required>
                {{ old('bio', $user->bio) }}
            </textarea>
            </div>
            {{-- NICK --}}
            <div class="form-group">
                <label for="formGroupExampleInput">Username</label>
                <input type="text" name="username"
                    class="form-control @error('username') is-invalid @enderror"
                    value="{{ old('username', $user->username) }}" required>
            </div>
            {{-- AVATAR --}}
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            {{-- CV --}}
            <div class="form-group">
                <label for="formGroupExampleInput">CV</label>
                <input type="file" name="cv" class="form-control">
            </div>
            {{-- CELL --}}
            <div class="form-group">
                <label for="cellphone">Num. Cellulare</label>
                <input type="tel" name="cellphone"
                    class="form-control @error('cellphone') is-invalid @enderror" placeholder="">
            </div>
            {{-- INDIRIZZO --}}
            <div class="form-group">
                <label for="">Indirizzo</label>
                <input type="text" name="address"
                    class="form-control @error('address') is-invalid @enderror" placeholder="address"
                    value="{{ old('address', $user->address) }}" required>
            </div>

            <div class="category_spec">

                {{-- CAT --}}
                <div class="form-group">
                    <label for="formGroupExampleInput " class="category_spec-label">Categorie:</label>
                    @foreach ($categories as $category)
                        <div class="">
                            <input type="checkbox" name="categories[]"
                                value="{{ $category->id }}" id="{{ $category->slug }}"
                                @if ($errors->any()) {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}
                    @else
                        {{ $user->categories->contains($category) ? 'checked' : '' }}> @endif
                                <label for="{{ $category->slug }}">{{ $category->name }}</label>
                        </div>
                    @endforeach
                    @error('categories[]')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


               {{-- SPEC --}}
                <div class="form-group">
                    <label for="formGroupExampleInput" class="category_spec-label">Prestazioni:</label>
                    @foreach ($availabilities as $availability)
                        <div>
                            <input type="checkbox" name="availabilities[]"
                                value="{{ $availability->id }}" id="{{ $availability->slug }}"
                                @if ($errors->any()) {{ in_array($availability->id, old('availabilities', [])) ? 'checked' : '' }}
                                @else
                                {{ $user->availabilities->contains($availability) ? 'checked' : '' }}> @endif
                                        <label
                                        for="{{ $availability->slug }}">{{ $availability->name }}</label>
                        </div>
                    @endforeach
                    @error('availabilities[]')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> 

            </div>
                {{-- EMAIL --}}
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="email" value="{{ old('email', $user->email) }}" required>
            </div>
            {{-- SUBMIT --}}
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    Save updates
                </button>
            </div>
        </form>
    </div>

@endsection
