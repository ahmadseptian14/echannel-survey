@extends('layouts.admin')

@section('content')
<style>
    .circle-border {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border: 2px solid purple; /* Warna hijau untuk border */
        border-radius: 50%; /* Membuat elemen menjadi bulat */
        font-size: 1.2rem; /* Ukuran font angka */
        color: black; /* Warna teks */
        margin-bottom: 10px;
    }
</style>
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Detail Kunjungan</h3>
                <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                    <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Kunjungan</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">{{$kunjungan->nama_cabang}}</a>
                </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Checklist Form</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-gallery-tab" data-bs-toggle="pill" href="#pills-gallery" role="tab" aria-controls="pills-gallery" aria-selected="true">Gallery E-Channel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-gallery" role="tabpanel" aria-labelledby="pills-gallery-tab">
                              <div class="card">
                                <div class="card-body">
                                    <span class="circle-border">1.</span>
                                    <p>Handle pintu tidak rusak dan tersedia stiker tarik / dorong</p>
                                    <div class="d-flex">
                                        <div class="form-check">
                                            <input name="ya" class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                              Ya
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input name="tidak" class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
                                            <label class="form-check-label" for="flexCheckChecked">
                                              Tidak
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input name="rusak" class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
                                            <label class="form-check-label" for="flexCheckChecked">
                                              Rusak
                                            </label>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keterangan</label>
                                        <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <input type="file" class="form-control" name="foto" accept="image/*" capture="environment">
                                        {{-- <input type="file" class="form-control" name="foto"> --}}
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <p>Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country.</p>

                                <p> But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('add-scripts')
@endpush
