<x-layout>
    <section class="container my-5 vh20">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 d-flex justify-content-center">
                <form action="{{route('announcements_index')}}" method="GET" class="d-flex w-75 myborder py-4 justify-content-center">
                    <div class="me-5">
                        <label for="category">Le nostre categorie</label>
                        <select name='category_id' class="py-0 form-control" wire:model.defer="category" id="category">
                
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
  <div class="container">
    <div class="row ">
        <div class="col-12 ">
            <div class="row ">
                @foreach ($announcements as $announcement)
                <div class="col-6 col-md-3 my-5  ">
                     <div class="card shadow">
                        <img src="" alt="">
                        <div class="card-body">
                            <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="...">
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
            </div>
            @endforeach 
        </div>
    </div>
  </div>

</x-layout>