<x-layout>

    @section('title', $titleView)
    <header class="vh-100">
        <h1>Breeze</h1>
         <a href="{{route('add-announcement')}}" class="btn btn-primary">Inserisci annuncio</a>
    </header>
    <section class="container">
        <div class="row">
            @foreach ($announcements as $announcement)
            <div class="col-md-3 my-3">
                <div class="card shadow" style="width: 18rem;">
                    <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$announcement->title}}</h5>
                      <p class="card-text">{{$announcement->body}}</p>
                      <p class="card-text">{{$announcement->price}}</p>
                      <a href="{{route('announcements_show', compact('announcement'))}}" class="btn btn-primary shadow">Visualizza</a>
                      <a href="#" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria: {{$announcement->category->name}}</a>
                      <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                    </div>
                  </div>
            </div>
            @endforeach   
        </div>
    </section>
</x-layout>