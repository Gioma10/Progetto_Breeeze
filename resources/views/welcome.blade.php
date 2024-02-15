<x-layout>
 
    @section('title', $titleView)

    <header class="vh-100 text-center padding-header position-relative">
        <h1 class="my-color-blue">{{__('ui.welcomeTitle')}}</h1>
        <h2 class="mt-4 pb-4 my-color-blue">Ciò che cercavi per i tuoi acquisti consapevoli!</h2>
        <div>
            <button class="my-btn mt-5"><a href="{{route('add-announcement')}}" class="a-none">Pubblica Annuncio</a></button>
        </div>
        <div class="position-absolute bottom-0 start-50 translate-middle">
            <h3 class="my-color-blue m-0">Torva l'articolo che desideri</h3>
            <i class="fa-solid fa-sort-down fs-2 my-color-blue"></i>
        </div>
    </header>

    <section class="welcome-search container-fluid bg-my-cyan">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 d-flex justify-content-center">
                <form action="" class="d-flex w-75 myborder py-4 justify-content-center">
                    <div class="me-5">
                        <label for="category">Le nostre categorie</label>
                        <select class="py-0 form-control" wire:model.defer="category" id="category">
                            <option value="">Tutte le categorie</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex flex-column ms-5">
                        <label for="search">Cosa cerchi?</label>
                        <div class="d-flex">
                            <input id="search" type="text">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">
            @foreach ($announcements as $announcement)
            <div class="col-md-3 my-3">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path): 'https://picsum.photos/200'}}" class="card-img-top p-3 rounded" alt="...">
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