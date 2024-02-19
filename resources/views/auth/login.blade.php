<x-layout>

    @section('title', 'Accedi')

    <div class="container mt100">
        <div class="row justify-content-center">
            <div class="col-10">

                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input name='email' type="email" class="form-control" id="inputEmail" value="{{old('email')}}" aria-describedby="emailHelp">
                        
                    @error('email')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
            
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="inputPassword">
            
                        @error('password')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
            
                    </div>
                        
                    
                        <button type="submit" class="btn btn-primary">Accedi</button>
                </form>
                
            </div>
        </div>
    </div>

</x-layout>