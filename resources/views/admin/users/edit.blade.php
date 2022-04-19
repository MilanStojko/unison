@extends('layouts.menu')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit User</div>
                    <div class="card-content">
                        <form action="{{route('admin.users.update'), $user->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            {{-- NOME --}}
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="nome" value="{{old('name'), $user->name}}" required>
                            </div>
                            {{-- COGNOME --}}
                            <div class="form-group">
                                <label for="">Cognome</label>
                                <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" placeholder="cognome" value="{{old('surname'), $user->surname}}" required>
                            </div>
                             {{-- DESC --}}
                             <div class="form-group">
                                <label>Bio</label>
                                <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" cols="30" rows="10" required>{{old('bio', $post->bio)}}</textarea>
                            </div>
                            {{-- NICK --}}
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="username" value="{{old('username'), $user->username}}" required>
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
                                <input type="tel" name="cellphone" class="form-control @error('cellphone') is-invalid @enderror" required>
                            </div>
                            {{-- INDIRIZZO --}}
                            <div class="form-group">
                                <label for="">Indirizzo</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="address" value="{{old('address'), $user->address}}" required>
                            </div>
                            {{--CAT--}}
                            <div class="form-group">
                                <label for="">Categorie</label>
                                <select name="category_id" class="form-control">
                                    <option value="">-- select a category --</option>
                                </select>
                            </div>
                            {{--SPEC--}}
                            <div class="form-group">
                                <label for="">Prestazioni</label>
                                <select name="availability_id" class="form-control">
                                    <option value="">-- select a category --</option>
                                </select>
                            </div>
                            {{-- EMAIL --}}
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="{{old('email'), $user->email}}" required>
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
