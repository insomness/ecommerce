    @extends('layouts.front')
    @section('title', config('app.name'))
    @section('content')
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6 mt-n5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>Semua orang dapat belajar</h5>
                            <h1>Belajar Tanpa Batas</h1>
                            <p>{{config('app.name')}} memberikan pelajaran yang terstruktur sehingga memudahkan anda untuk mempelajari bidang yang anda tekuni</p>
                            <a href="{{route('kelas.index')}}" class="btn_1">Lihat Kelas </a>
                            @guest
                            <a href="{{route('register')}}" class="btn_2">Daftar sekarang</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-3 align-self-center">
                    <div class="single_feature_text ">
                        <h2>Jenis <br> Kelas</h2>
                        <p>Berikut beberapa jenis kelas yang dapat anda ikuti</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-layers"></i></span>
                            <h4>Gratis</h4>
                            <p>Kelas ini dapat diikuti oleh siapa saja yang melihat website ini</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-new-window"></i></span>
                            <h4>Regular</h4>
                            <p>Kelas ini hanya dapat diikuti oleh member yang telah mendaftar pada {{config('app.name')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part single_feature_part_2">
                            <span class="single_service_icon style_icon"><i class="ti-light-bulb"></i></span>
                            <h4>Premium</h4>
                            <p>Kelas premium yang hanya dapat diikuti oleh para member yang telah mengupgrade akun mereka</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- learning part start-->
    <section class="learning_part">
        <div class="container">
            <div class="row align-items-sm-center align-items-lg-stretch">
                <div class="col-md-7 col-lg-7">
                    <div class="learning_img">
                        <img src="{{asset('frontTemplate')}}/img/learning_img.png" alt="">
                    </div>
                </div>
                <div class="col-md-5 col-lg-5">
                    <div class="learning_member_text">
                        <h5>Tentang Kami</h5>
                        <h2>Belajar dengan Cinta dan Canda Tawa</h2>
                        <p>{{config('app.name')}} merupakan platform e-learning para guru yang memiliki bakat dalam mendidik dan mengajar. Dengan tujuan menciptakan lingkungan belajar yang menyenangkan dan tanpa tekanan.<br>Apa saja kelebihan {{config('app.name')}}?</p>
                        <ul>
                            <li><span class="ti-pencil-alt"></span>Guru yang kompeten dan memiliki bakat dalam bercanda tawa</li>
                            <li><span class="ti-ruler-pencil"></span>Materi pembelajaran yang lengkap dan terstruktur baik dan Gaya penyampaian yang mudah dipahami oleh Pemula sampai Tingkat Lanjut.</li>
                        </ul>
                        <a href="{{route('about')}}" class="btn_1">Baca Lebih lanjut</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- learning part end-->

    <!--::review_part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <h2>Kelas Populer</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($kelas as $k)
                <div class="col-sm-6 col-lg-4 mb-2 ">
                    <div class="single_special_cource">
                        <img src="{{asset('storage/' . $k->thumbnail)}}" class="special_img" height="225">
                        <div class="special_cource_text">
                            <div class="btn_4 px-5">{{$k->jenis_kelas}}</div>
                            <a href="{{route('kelas.show',  Crypt::encryptString($k->id))}}" class="btn_4 px-4" style="background-color: #f44a40;">Lihat</a>
                            <a href="{{route('kelas.show', Crypt::encryptString($k->id))}}">
                                <h3 class="text-capitalize">{{$k->nama_kelas}}</h3>
                            </a>
                            <div class="text-justify text-truncate" style="height: 50px">
                                {!!$k->deskripsi!!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--::blog_part end::-->

    <!-- learning part start-->
    <section class="advance_feature learning_part">
        <div class="container">
            <div class="row align-items-sm-center align-items-xl-stretch">
                <div class="col-md-6 col-lg-6">
                    <div class="learning_member_text">
                        <h5>Fitur Lanjutan</h5>
                        <h2>Apa saja Fitur Lainnya Yang Kami Tawarkan</h2>
                        <p>Mungkin anda belum merasa puas dengan apa yang kami tawarkan sebelumnya, Berikut ini Fitur lanjutan jika anda mengupgrade akun ke Premium</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="learning_img">
                        <img src="{{asset('frontTemplate')}}/img/advance_feature_img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- learning part end-->

    <!--::blog_part start::-->
    <section class="blog_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <h2>Blog Kita</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="{{asset('storage/'.$blog->thumbnail)}}" class="card-img-top" alt="blog" style="height: 202.5px">
                            <div class="card-body">
                                <a href="{{route('blog.show', $blog->id)}}" class="btn_4">Lihat</a>
                                <a href="{{route('blog.show', $blog->id)}}}">
                                    <h5 class="card-title">{{$blog->judul}}</h5>
                                </a>
                                <div class="text-truncate" style="height: 25px">{!!$blog->konten!!}</div>
                                <ul>
                                    <li> <span class="ti-info-alt"></span>{{$blog->created_at->toDateString()}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--::blog_part end::-->
    @endsection
