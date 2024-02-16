<x-layout>
    {{-- form filtri  --}}
    <section class="container mt100 vh20 px-5">
        <div class="row h-100 align-items-center justify-content-center container-form-search">
            {{-- div ricerca --}}
            <div class="col-5 d-flex justify-content-end">
                <form action="{{route('announcements_index')}}" method="GET" class="d-flex flex-column w-50 justify-content-center">
                    <label for="category">Filtra per categoria</label>
                    <div class="mt-1 position-relative w-75">
                        <select class="w-100 input-default" name='category_id' class="py-0 form-control" wire:model.defer="category" id="category">
                            <option value="">Tutte le categorie</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{(request('category_id') == $category->id) ? 'selected' : ''}}>
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="position-absolute end-0 h-100 btn-category"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>        
            </div>
            <div class="col-5">
                <x-searchbar/>
            </div>
            {{-- fine div ricerca --}}
        </div>
    </section>

    {{-- visualizzazione annunci  --}}
    <div class="container">
        <div class="row ">
            @forelse ($announcements as $announcement)
                <div class="col-6 col-md-3 my-5  ">
                    <div class="card shadow">
                        <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path):'https://picsum.photos/200'}}" class="card-img-top p-3 rounded" alt="..."/>
                        <div class="card-body">
                            <h5 class="card-title">{{$announcement->title}}</h5>
                            <p class="card-text">{{$announcement->body}}</p>
                            <p class="card-text">{{$announcement->price}}</p>
                            <a href="{{route('announcements_show',$announcement) }}" class="btn btn-primary shadow">Visualizza</a>
                            <a href="#" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria: {{$announcement->category->name}}</a>
                            <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning">
                        <p>Non sono stati trovati announci per questa ricerca. Riprova.</p>
                    </div>
                </div>
            @endforelse 
            {{$announcements->links()}}
        </div>
    </div>

</x-layout>