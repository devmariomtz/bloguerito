{{-- grid for news --}}
<div class="row">
    @foreach ($news as $new)
        <div class="col-md-4 p-2">
            <div class="card" style="height: 100%">
                <img class="card-img-top" src={{ $new['urlToImage'] }} alt={{ $new['title'] }} style="height: 30vh">
                <div class="card-body d-flex flex-column  align-items-center" style="width: 100%; height: 100%;">
                    <h5 class="card-title">{{ $new['title'] }}</h5>
                    <p class="card-text">{{ $new['description'] }}</p>
                </div>
                <a class="p-4 gap-2 text-decoration-none"
                    href="{{ route('showuser', ['author' => json_encode($new['author'])]) }}">
                    <img src={{ $new['author']['picture']['thumbnail'] }} class="rounded-circle" width="auto"
                        height="auto" alt="Avatar" loading="lazy" />
                    <span
                        class="m-1">{{ $new['author']['name']['first'] . ' ' . $new['author']['name']['last'] }}</span>
                </a>
                <div class="d-flex justify-content-between p-4 gap-2">
                    <a href={{ $new['url'] }} class="btn btn-primary" style="width: 70%">Leer 👀</a>
                    <a href="mailto: mariomtzdev@gmail.com ?cc=cc@example.com &bcc=bcc@example.com &subject=It is an HTML email link &body=This mail is generated using HTML email link."
                        class="btn btn-secondary" style="width: 35%">
                        <i class="fa-solid fa-share-from-square"></i>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
    {{-- agregar paginación --}}
    {!! $news->links() !!}
</div>
{{-- end grid for news --}}
