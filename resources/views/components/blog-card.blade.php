<div class="col-lg-4 col-sm-6">
    <a href="{{route('news.show', $blog)}}">
        <div class="card mb-3">
            <img class="card-img-top" src="{{ asset('storage/blog/' . $blog->media_path) }}"
                alt="Card image cap" />
            <div class="card-body">
                <h5 class="card-title">{{ $blog->title }}</h5>
                <p class="card-text">
                    {{ $blog->desc }}
                </p>
                <p class="card-text">
                    <small class="text-muted">{{ $blog->updated_at }}
                    </small>
                </p>
            </div>
        </div>
    </a>
</div>