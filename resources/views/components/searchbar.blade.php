<form action="{{route('announcement.search')}}" method="GET" class="d-flex flex-column">
    <label for="search">{{__('ui.filterName')}}</label>
    <div class="w-75 mt-1 position-relative">
        <input id="search" type="search" name="searched" class="input-default w-100" placeholder="Search" aria-label="Search">
        <button class="position-absolute end-0 h-100 btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
</form>