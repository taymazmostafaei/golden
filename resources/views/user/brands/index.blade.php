@extends('layouts.layoutMaster')

@section('title', 'بنکداری برند')

@section('vendor-style')

@endsection

@section('vendor-script')

@endsection

@section('page-script')

@endsection

@section('content')
    <div data-bs-spy="scroll" class="scrollspy-example">
        <!-- Useful features: Start -->
        <section id="landingFeatures" class="section-py landing-features mt-5">
            <div class="container mt-5">
                <h3 class="text-center mb-3 mb-md-5 p-3 ">
                    <span class="section-title">برند</span>
                </h3>
                <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">

                    @foreach ($blogs as $blog)
                        <x-blog-card :blog="$blog" :isbrand="1"/>
                            
                    @endforeach
                </div>
                {{ $blogs->links('pagination::bootstrap-4') }}
            </div>
        </section>
        <!-- Useful features: End -->
    </div>
@endsection
