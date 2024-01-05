<section class="breadcrumb-area breadcrumb-bg" data-background="assets/website/img/bg/breadcrumb_bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <h2 class="title">{{ $pageTitle }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @if (isset($breadcrumbs))
                                @foreach ($breadcrumbs as $key => $value)
                                    @if ($loop->last)
                                        <li class="breadcrumb-item active" aria-current="page">
                                            {{ $key }}
                                        </li>
                                    @else
                                        <li class="breadcrumb-item">
                                            <a href="{!! empty($value) ? 'javascript:void(0);' : $value !!}">{{ $key }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb-shape-wrap">
        <img src="{{ asset('assets/website/img/images/breadcrumb_shape01.png') }}" alt="">
        <img src="{{ asset('assets/website/img/images/breadcrumb_shape02.png') }}" alt="">
    </div>
</section>
