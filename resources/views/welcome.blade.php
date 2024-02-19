<x-layout>
    @section('title', $titleView)

    {{-- header  --}}
    <header class="vh-100 text-center padding-header position-relative">
        <h1 class="my-color-blue">{{__('ui.welcomeTitle')}}</h1>
        <h2 class="mt-4 pb-4 my-color-blue">Ciò che cercavi per i tuoi acquisti consapevoli!</h2>
        <div>
            <button class="my-btn mt-5"><a href="{{route('add-announcement')}}" class="a-none">Pubblica Annuncio</a></button>
        </div>
        <div class="position-absolute bottom-0 start-50 translate-middle">
            <h3 class="my-color-blue m-0">Trova l'articolo che desideri</h3>
            <a href="#main"><i class="fa-solid fa-sort-down fs-2 my-color-blue" ></i></a>
        </div>
    </header>
    
    {{-- welcome search  --}}
    <section class="s1" id="main">
        {{-- form filtri  --}}
        <section class="container vh20 px-5 py-3">
            <div class="row h-100 align-items-center justify-content-center form-search">
                {{-- div ricerca --}}
                <div class="col-5 d-flex justify-content-center">
                    <form action="{{route('announcements_index')}}" method="GET" class="d-flex flex-column w-100 justify-content-center">
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
       
        
        {{-- carosello annunci infinito --}}
        <section class="container-fluid">
            <div class="row justify-content-center myborder py-4">
                <div class="infinite-carousel myborder w-100">
                    <div>
                        @foreach ($announcements as $announcement)
                            <div class="col-md-2 d-flex justify-content-center">
                                <div class="card shadow">
                                    <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400, 300) : 'https://picsum.photos/200'}}" class="card-img-top p-3 rounded" alt="...">
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
                </div>
            </div>
        </section>
    </section>

    {{-- Sezione Breeze Master --}}
    <section class="container-fluid vh-100 s2">
        <div class="row h-100">
            <div class="col-12 myborder">
                <h3>Diventa un Breeze Master!</h3>
            </div>

            <div class="col-6 myborder">
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Email</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                  </div>

                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Parlaci di te</label>
                    <input type="textarea" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                  </div>

                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Allega CV</label>
                    <input type="file" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                  </div>
            </div>

            <div class="col-6 myborder">

            </div>
        </div>

    </section>

    {{-- card esempio per le misure e tutto il resto...  --}}
    <section class="vh-20">
        <div class="row justify-content-center">
            <div class="col-3  myborder d-flex justify-content-center">

                <div class="make-3D-space">
                    <div class="product-card">
                        <div class="product-front">
                          <div class="shadow"></div>
                            <img src="https://picsum.photos/200/300"  class="img-custom" alt=""/>
                            <div class="image_overlay"></div>
                            <div class="view_details">View Details</a></div>
                            <div class="stats">
                                <div class="stats-container">
                                    <span class="product_price">$39</span>
                                    <span class="product_name">Adidas Originals</span>
                                    <p>Lorem ipsum dolor sit amet</p>

                                    <div class="product-options">
                                    <strong>Data pubblicazione: 14/04/2000</strong> 
                                    <span></span>
                                    <strong>Pubblicato da : Konrad Nowak</strong>

                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
             
            </div>
        </div>
    </section>
    
   
  

    



</x-layout>