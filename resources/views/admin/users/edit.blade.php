@extends('layouts.menu')

@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Edit User</div>
                        <div class="card-content">

                            <form action="{{ route('admin.users.update', auth()->user()) }}" method="POST">
                                @method('PUT')
                                @csrf
                                {{-- NOME --}}
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="nome" value="{{ old('name', $user->name) }}" required>
                                </div>
                                {{-- COGNOME --}}
                                <div class="form-group">
                                    <label for="">Cognome</label>
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
                                    <label for="">Username</label>
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username', $user->username) }}" required>
                                </div>
                                {{-- AVATAR --}}
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                {{-- CV --}}
                                <div class="form-group">
                                    <label for="">CV</label>
                                    <input type="file" name="cv" class="form-control">
                                </div>
                                {{-- CELL --}}
                                <div class="form-group">
                                    <label for="">Num. Cellulare</label>
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
                                {{-- CAT --}}
                                <div class="form-group">
                                    <label for="" class="">Categorie:</label>
                                    @foreach ($categories as $category)
                                        <div class="form-check d-inline-block m-3">
                                            <input type="checkbox" class="form-check-input" name="categories[]"
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
                                    <label for="" class="">Prestazioni:</label>
                                    @foreach ($availabilities as $availability)
                                        <div class="form-check d-inline-block m-3">
                                            <input type="checkbox" class="form-check-input" name="availabilities[]"
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
                </div>
            </div>
        </div>
        </div>

@endsection
