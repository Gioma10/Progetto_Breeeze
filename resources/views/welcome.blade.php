<x-layout>
    @section('title', $titleView)

    {{-- header  --}}
    <header class="vh-100 text-center padding-header position-relative">
        <h1 class="my-color-blue">{{__('ui.welcomeTitle')}}</h1>
        <h2 class="mt-4 pb-4 my-color-blue">{{__('ui.welcomeSubtitle')}}</h2>
        <div>
            <button class="my-btn mt-5"><a href="{{route('add-announcement')}}" class="a-none">{{__('ui.welcomeButton')}}</a></button>
        </div>
        <div class="position-absolute bottom-0 start-50 translate-middle">
            <h3 class="my-color-blue m-0">{{__('ui.findArticles')}}</h3>
            <a href="#main"><i class="fa-solid fa-sort-down fs-2 my-color-blue" ></i></a>
        </div>
    </header>
    
    {{-- welcome search  --}}
    <section class="s1" id="main">
        {{-- form filtri  --}}
        <section class="container vh20 px-5 py-3 ">
            <div class="row h-100 align-items-center justify-content-center form-search mt-5">
                {{-- div ricerca --}}
                <div class="col-5 d-flex justify-content-center">
                    <form action="{{route('announcements_index')}}" method="GET" class="d-flex flex-column w-100 justify-content-center">
                        <label for="category">{{__('ui.categoryFilter')}}</label>
                        <div class="mt-1 position-relative w-75">
                            <select class="w-100 input-default" name='category_id' class="py-0 form-control" wire:model.defer="category" id="category">
                                <option value="">{{__('ui.allCategory')}}</option>
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
        <section class="container-fluid vh80 mt-5">
            <div class="row justify-content-center py-4">
                <div class="infinite-carousel w-100">
                    <div>
                        @foreach ($announcements as $announcement)
                            <div class="col-md-1 d-flex justify-content-center">
                                <div class="make-3D-space custom-shadow ">
                                    <div class="product-card rounded">
                                        <div class="product-front">
                                        <div class="shadow"></div>
                                            <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400, 300):'https://picsum.photos/200'}}"  class="img-custom" alt=""/>
                                            <div class="image_overlay"></div>
                                            <div ><a href="{{route('announcements_show',$announcement) }}" class="view_details">{{__('viewDetails')}}</a></div>
                                            <div class="stats">
                                                <div class="stats-container">
                                                    <span class="product_price">$ {{$announcement->price}}</span>
                                                    <span class="product_name">{{$announcement->title}}</span>
                                                    <p>{{$announcement->category->name}}</p>
                
                                                    <div class="product-options">
                                                        <strong>{{__('ui.publishedDate')}}: {{$announcement->created_at->format('d/m/Y')}}</strong> 
                                                        <span></span>
                                                        <strong>{{__('ui.publishFrom')}}: {{$announcement->user->name}}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach   
                    </div>
                </div>
            </div>
        </section>
    </section>
</x-layout>