<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-10">
    <form action="{{route('login')}}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="InputEmail" class="form-label">Email</label>
             <input name="email" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="InputPassword" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="InputPassword">
        </div>

            <button type="submit" class="btn btn-primary">Accedi</button>

    </form>

            </div>
        </div>
    </div>

</x-layout>