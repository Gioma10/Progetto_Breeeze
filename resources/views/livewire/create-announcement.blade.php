<div>
    <div class="container">
        <div class="row">
            <div class="col-10">
                @if (session()->has('message'))
                    <div class="flex flex-row justify-center my-2 alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                
                <form wire:submit="store">
                    <div class="mb-3">
                        <label for="InputTitle" class="form-label">Titolo</label>
                        <input wire:model.lazy='title' type="text" class="form-control @error('title') is-invalid @enderror">
                    </div>

                    <div class="mb-3">
                        <label for="InputDescription" class="form-label">Descrizione</label>
                        <textarea wire:model.lazy='description' id="InputDescription" cols="30" rows="10" class="@error('title') is-invalid @enderror"></textarea>
                    @error('description')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="InputPrice" class="form-label">Prezzo</label>
                        <input wire:model.lazy='price' type="text" class="form-control @error('title') is-invalid @enderror" id="InputPrice">
                    @error('price')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <select class="form-control" wire:model.defer="category" id="category">
                       <option value="">Scegli la tua categoria</option>
                       @foreach ($categories as $category)
                       <option value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                    @endforeach
                </select>
                @error('category')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror

                    <button type="submit" class="mt-3 btn btn-primary">Inserisci Annuncio</button>
                </form>
            </div>
        </div>
    </div>
</div>
