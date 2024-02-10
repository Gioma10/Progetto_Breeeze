<x-layout>

    @section('title', 'Registrati')

    <div class="container">
        <div class="row">
            <div class="col-10">
                <form action="{{route('register')}}" method="POST">

                    @csrf

                    
                    <div class="mb-3">
                        <label for="InputName" class="form-label">Nome</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="InputName" value="{{old('name')}}" aria-describedby="NameHelp">

                            @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="InputEmail" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="InputEmail" value="{{old('email')}}" aria-describedby="emailHelp">

                        @error('email')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="InputPassword" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="InputPassword">

                        @error('password')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="InputPasswordConfirmation" class="form-label @error('password_confirmation') is-invalid @enderror">Conferma Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="InputPasswordConfirmation">

                        @error('password_confirmation')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
            
                        <button type="submit" class="btn btn-primary">Registrati</button>
            
                </form>

                <p>Sei già registrato? <a href="{{route('login')}}">Accedi ora.</a></p>

            </div>
        </div>
    </div>


</x-layout>