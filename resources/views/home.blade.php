@extends('layouts.app')
@include('layouts.header')
@section('content')

    <div id="home">
        <section id="front_home">
            <div class="background_orchid">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#6d316d" fill-opacity="1"
                        d="M0,128L80,138.7C160,149,320,171,480,181.3C640,192,800,192,960,181.3C1120,171,1280,149,1360,138.7L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
                    </path>
                </svg>

                <div class="background_transp">

                </div>
                <img class="vb_logo" src="images/cropped (1).png" alt="">
            </div>

        </section>


        <section id="intro_home">
            <div class="card">
                <div class="container">
                    <p>
                        "Dirbu Jums jau 10 metų! adipisicing elit. Repellendus esse quos minima illum totam ullam dolorem
                        aliquid
                        suscipit rerum, non laboriosam ut officia? Eius enim deserunt culpa at excepturi quibusdam suscipit
                        rerum, suscipit rerum, non laboriosam ut officia? Eius enim deserunt culpa at except
                        am dicta odio!"
                    </p>
                    <img src="images/pexels-cheda-stankovic-3422099.jpg" alt="">
                </div>
            </div>
            {{-- <div id="btn_rezervacija">
                <div class="div-under">
                    <button class="btn-over"><a href="#">Laiko rezervacija</a></button>
                </div>
            </div> --}}

        </section>


        <section id="mokymai_home">


            <video muted autoplay loop>
                <source src="video/1.mp4" type="video/mp4">
                <source src="movie.ogg" type="video/ogg">
                Your browser does not support tthe video tag.
            </video>


            <div class="video-overlay">


                <div class="mokymai_content">
                    <h1>Manikiūro kursai</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi mollitia nesciunt molestias
                        accusantium magni ut loremdistinctio amet doloremque sit vero, ipsa facere possimus vel fugiat assumenda
                        dolores maiores aspernatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur iste dolor sint recusandae ipsa vitae porro quia fugiat, quaerat nihil deserunt harum magni impedit mollitia maiores, corporis blanditiis voluptates illum. Libero maiores incidunt quasi animi ab ducimus repellat iusto porro
                        repellendus!</p>
                    <a class="btn-grad" href="www.google.lt">Registruotis</a>
                </div>

            </div>






        </section>


        <section id="paslaugos_home">
            <svg class="svg-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#6D316D" fill-opacity="1"
                    d="M0,128L80,138.7C160,149,320,171,480,160C640,149,800,107,960,96C1120,85,1280,107,1360,117.3L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
                </path>
            </svg>
            <div class="container">
                <div class="title">Paslaugos</div>
                <a href="">
                    <div class="card">
                        <div class="card_image img1"></div>
                        <div class="card_text">Manikiuras </div>
                    </div>
                </a>
                <a href="">
                    <div class="card">
                        <div class="card_image img2"></div>
                        <div class="card_text">Pedikiuras </div>
                    </div>
                </a>
                <a href="">
                    <div class="card">
                        <div class="card_image img3"></div>
                        <div class="card_text">Pilingas </div>
                    </div>
                </a>
                <a href="">
                    <div class="card">
                        <div class="card_image img4"></div>
                        <div class="card_text">Antakiai </div>
                    </div>
                </a>
                <a href="">
                    <div class="card">
                        <div class="card_image img5"></div>
                        <div class="card_text">Depiliacija </div>
                    </div>
                </a>
            </div>
        </section>
    </div>
















@endsection
