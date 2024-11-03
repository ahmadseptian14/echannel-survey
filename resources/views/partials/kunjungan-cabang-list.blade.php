@forelse ($kunjungans as $item)
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body text-center">
                <h4>{{ $item->nama_cabang }}</h4>
                <p class="card-text">{{ $item->waktu_kunjungan }}</p>
                <div class="d-flex align-items-center">
                    @foreach ($item->pic as $pic)
                        <div class="tag-button">{{ $pic }}</div>
                    @endforeach
                    <a href="{{route('kunjungancabang.detail', ['id' => $item->id])}}" class="btn btn-sm btn-success ms-auto">Detail</a>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="text-center">
        <h4>Belum ada Data</h4>
    </div>
@endforelse
