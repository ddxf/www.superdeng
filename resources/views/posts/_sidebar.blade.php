<div class="card mb-3 border-info">
    <div class="card-header bg-transparent border-info">
        <h5 class="text-muted text-center">友情&链接</h5>
    </div>
    <div class="card-body">
        <article class="text-muted">
           
            <a class="text-info" href="https://broqiang.com" target="_blank" style="margin:25px;">Bro Qiang</a> 
            <a class="text-info" href="http://www.blockchant.cn" target="_blank" style="margin:25px;">祥哥博客</a> 
        </article>
    </div>
</div>

<div class="card border-info mb-3">
    <div class="card-header bg-transparent border-info">
        <h5 class="text-muted text-center">归档</h5>
    </div>
    @if(count($archives))
        <ul class="list-group list-group-flush">
            @foreach($archives as $archive)
                <li class="list-group-item @if(request()->has('year') && request()->year == $archive->year) bg-light @endif">
                    <a href="{{ route('posts.index') }}?year={{ $archive->year }}@if(request()->has('order'))&order={{ request()->order }}@endif" 
                        class="text-center text-info font-weight-bold">
                        <center>{{ $archive->year }} ( {{ $archive->total }} )</center>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
