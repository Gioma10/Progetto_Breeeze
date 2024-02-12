<x-layout>
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