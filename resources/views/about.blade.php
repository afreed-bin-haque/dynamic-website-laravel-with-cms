@extends('layouts.inner_landing')

@section('inner_landing_content')
<section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ route('/') }}">Home</a></li>
          <li>About</li>
        </ol>
        <h2>Know more about Us</h2>
      </div>
    </section>
    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Our Values</h2>
          <p>Odit est perspiciatis laborum et dicta</p>
        </header>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="fade-up" data-aos-delay="200">
              <img src="{{ asset('frontend/assets/img/values-1.png') }}" class="img-fluid" alt="">
              <h3>Ad cupiditate sed est odio</h3>
              <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="400">
              <img src="{{ asset('frontend/assets/img/values-2.png') }}" class="img-fluid" alt="">
              <h3>Voluptatem voluptatum alias</h3>
              <p>Repudiandae amet nihil natus in distinctio suscipit id. Doloremque ducimus ea sit non.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="600">
              <img src="{{ asset('frontend/assets/img/values-3.png') }}" class="img-fluid" alt="">
              <h3>Fugit cupiditate alias nobis.</h3>
              <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p>
            </div>
          </div>


        </div>

      </div>

    </section><!-- End Values Section -->
    <!-- ======= Video Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="ease-in">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h2>Hello</h2>
              <p class="text-mutted">Wanna Know more?</p>
              <p class="text-success">
              Download our Brochure :<span><a href="{{ asset('frontend/assets/img/values-2.png') }}" target="_blank" rel="noopener noreferrer"> Brochure.pdf</a></span>
            </p>
            </div>
          </div>


          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/kgJ3F9R_yDA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

    <section id="faq" class="faq" data-aos="fade-in">

      <div class="container aos-init aos-animate" >

        <header class="section-header">
          <h1 style="color:#012970">nxnxn</h1>
        </header>

        <div class="row">
          <div class="col-lg-6">
              <p>nfxxnxfn</p>
            </div>
          </div>

      </div>

    </section>
@endsection
