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
                    <input wire:model='title' type="text" class="form-control" id="InputTitle" aria-describedby="titleHelp">
                    </div>

                    <div class="mb-3">
                    <label for="InputDescription" class="form-label">Descrizione</label>
                    <textarea wire:model='description' id="InputDescription" cols="30" rows="10"></textarea>
                    </div>

                    <div class="mb-3">
                    <label for="InputPrice" class="form-label">Prezzo</label>
                    <input wire:model='price' type="text" class="form-control" id="InputPrice">
                    </div>

                    <select class="form-control" for="category" wire:model.defer="category" id="category">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary">Inserisci Annuncio</button>
                </form>
            </div>
        </div>
    </div>
</div>
