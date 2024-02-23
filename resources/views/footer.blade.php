<!-- Footer: Start -->
<footer class="landing-footer bg-body footer-text">
  <div class="footer-top">
    <div class="container">
      <div class="row gx-0 gy-4 g-md-5">
        <div class="col-lg-5">
          <a href="{{url('front-pages/landing')}}" class="app-brand-link mb-4">
            <span class="app-brand-logo demo">@include('_partials.macros',['height'=>20,'withbg' => "fill: #fff;"])</span>
            <span class="app-brand-text demo footer-link fw-bold ms-2 ps-1">{{ config('variables.templateName') }}</span>
          </a>
          <p class="footer-text footer-logo-description mb-4">
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.

          </p>
          <form class="footer-form">
            <label for="footer-email" class="small">Subscribe to newsletter</label>
            <div class="d-flex mt-1">
              <input type="email" class="form-control rounded-0 rounded-start-bottom rounded-start-top" id="footer-email" placeholder="Your email" />
              <button type="submit" class="btn btn-primary shadow-none rounded-0 rounded-end-bottom rounded-end-top">
                Subscribe
              </button>
            </div>
          </form>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12">
          <h6 class="footer-title mb-4">بخش ها</h6>
          <ul class="list-unstyled d-flex justify-content-between">
            <li class="mb-3">
              <a href="/demo-1" target="_blank" class="footer-link">خانه</a>
            </li>
            <li class="mb-3">
              <a href="/demo-5" target="_blank" class="footer-link">اسلایدر</a>
            </li>
            <li class="mb-3">
              <a href="/demo-2" target="_blank" class="footer-link">آبشده</a>
            </li>
            <li class="mb-3">
              <a href="/demo-3" target="_blank" class="footer-link">بنکداری</a>
            </li>
            <li class="mb-3">
              <a href="/demo-4" target="_blank" class="footer-link">تماس با ما</a>
            </li>
          </ul>
          <h6 class="footer-title mb-4">شبکه های اجتماعی</h6>
          <ul class="list-unstyled d-flex justify-content-around">
            <li class="mb-3">
              <a href="/demo-1" target="_blank" class="footer-link"><button type="button" class="btn btn-icon rounded-pill btn-outline-instagram waves-effect">
                <i class="tf-icons ti ti-brand-instagram"></i>
              </button></a>
            </li>
            <li class="mb-3">
              <a href="/demo-5" target="_blank" class="footer-link"><button type="button" class="btn btn-icon rounded-pill btn-outline-vimeo waves-effect"><i class="tf-icons ti ti-brand-twitter"></i></button></a>
            </li>
            <li class="mb-3">
              <a href="/demo-2" target="_blank" class="footer-link"><button type="button" class="btn btn-icon rounded-pill btn-outline-vimeo waves-effect"><i class="tf-icons ti ti-brand-telegram"></i></button></a>
            </li>
          </ul>
        </div>
        {{-- <div class="col-lg-2 col-md-4 col-sm-6">
          <h6 class="footer-title mb-4">Pages</h6>
          <ul class="list-unstyled">
            <li class="mb-3">
              <a href="{{url('/front-pages/pricing')}}" class="footer-link">Pricing</a>
            </li>
            <li class="mb-3">
              <a href="{{url('/front-pages/payment')}}" class="footer-link">Payment<span class="badge rounded bg-primary ms-2">New</span></a>
            </li>
            <li class="mb-3">
              <a href="{{url('/front-pages/checkout')}}" class="footer-link">Checkout</a>
            </li>
            <li class="mb-3">
              <a href="{{url('/front-pages/help-center')}}" class="footer-link">Help Center</a>
            </li>
            <li class="mb-3">
              <a href="{{url('/auth/login-cover')}}" target="_blank" class="footer-link">Login/Register</a>
            </li>
          </ul>
        </div> --}}
        {{-- <div class="col-lg-3 col-md-4">
          <h6 class="footer-title mb-4">Download our app</h6>
          <a href="javascript:void(0);" class="d-block footer-link mb-3 pb-2"><img src="{{asset('assets/img/front-pages/landing-page/apple-icon.png')}}" alt="apple icon" /></a>
          <a href="javascript:void(0);" class="d-block footer-link"><img src="{{asset('assets/img/front-pages/landing-page/google-play-icon.png')}}" alt="google play icon" /></a>
        </div> --}}
      </div>
    </div>
  </div>
  <div class="footer-bottom py-3">
    <div class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
      <div class="mb-2 mb-md-0">
        <span class="footer-text">©
          <script>
          document.write(new Date().getFullYear());

          </script>
        </span>
        <span class="footer-text">تمام حقوق محفوظ برای طلای قالیچی محفوظ است .</span>
      </div>
      {{-- <div>
        <a href="{{config('variables.githubFreeUrl')}}" class="footer-link me-3" target="_blank">
          <img src="{{asset('assets/img/front-pages/icons/github-'.$configData['style'].'.png') }}" alt="github icon" data-app-light-img="front-pages/icons/github-light.png" data-app-dark-img="front-pages/icons/github-dark.png" />
        </a>
        <a href="{{config('variables.facebookUrl')}}" class="footer-link me-3" target="_blank">
          <img src="{{asset('assets/img/front-pages/icons/facebook-'.$configData['style'].'.png') }}" alt="facebook icon" data-app-light-img="front-pages/icons/facebook-light.png" data-app-dark-img="front-pages/icons/facebook-dark.png" />
        </a>
        <a href="{{config('variables.twitterUrl')}}" class="footer-link me-3" target="_blank">
          <img src="{{asset('assets/img/front-pages/icons/twitter-'.$configData['style'].'.png') }}" alt="twitter icon" data-app-light-img="front-pages/icons/twitter-light.png" data-app-dark-img="front-pages/icons/twitter-dark.png" />
        </a>
        <a href="{{config('variables.instagramUrl')}}" class="footer-link" target="_blank">
          <img src="{{asset('assets/img/front-pages/icons/instagram-'.$configData['style'].'.png') }}" alt="google icon" data-app-light-img="front-pages/icons/instagram-light.png" data-app-dark-img="front-pages/icons/instagram-dark.png" />
        </a>
      </div> --}}
    </div>
  </div>
</footer>
<!-- Footer: End -->
