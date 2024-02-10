<x-layout>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
             <input name='email' type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="inputPassword">
        </div>
            
        
            <button type="submit" class="btn btn-primary">Accedi</button>
    </form>
</x-layout>