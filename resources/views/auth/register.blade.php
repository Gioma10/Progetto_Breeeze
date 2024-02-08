<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <form action="{{route('register')}}" method="POST">
            
                    @csrf
            
                    <div class="mb-3">
                        <label for="InputName" class="form-label">Nome</label>
                        <input name="name" type="text" class="form-control" id="InputName" aria-describedby="NameHelp">
                    </div>
            
                    <div class="mb-3">
                        <label for="InputEmail" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
                    </div>
            
                    <div class="mb-3">
                        <label for="InputPassword" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="InputPassword">
                    </div>
            
                    <div class="mb-3">
                        <label for="InputPasswordConfirmation" class="form-label">Conferma Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="InputPasswordConfirmation">
                    </div>
            
                        <button type="submit" class="btn btn-primary">Registrati</button>
            
                </form>

                <p>Sei già registrato? <a href="{{route('login')}}">Accedi ora.</a></p>

            </div>
        </div>
    </div>


</x-layout>