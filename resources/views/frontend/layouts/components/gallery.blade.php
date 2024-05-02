<div class="container-fluid gallery-section py-5">
    <div class="row">
        <div class="col-lg-12 pb-4">
            <h2 class="text-black font-36 family-open-sans fw-bolder pb-2 text-cover">Gallery </h2>
            {{-- <div class="border-undeline w-25 "></div> --}}
        </div>

        <div class="col-lg-3">
            <div class="row">
                <div class="col-12">
                    <a class="example-image-link " href="{{ asset('/images/gallery1.jpg') }}" data-lightbox="example-set"
                        data-title="Or press the right arrow on your keyboard.">
                        <img src="{{ asset('/images/gallery1-1.jpg') }}" class="d-block w-100 filter-black"
                            alt="Mid Year Cricket Association">
                    </a>

                </div>
                <div class="col-12 pt-3">
                    <a class="example-image-link " href="{{ asset('/images/gallery2.jpg') }}"
                        data-lightbox="example-set" data-title="Or press the right arrow on your keyboard.">
                        <img src="{{ asset('/images/gallery2-1.jpg') }}" class="d-block w-100 filter-black"
                            alt="Mid Year Cricket Association">
                    </a>

                </div>
            </div>
        </div>
        <div class="col-lg-3 pt-lg-0 pt-3">

            <a class="example-image-link " href="{{ asset('/images/gallery3-1.jpg') }}" data-lightbox="example-set"
                data-title="Or press the right arrow on your keyboard.">
                <img src="{{ asset('/images/gallery3.jpg') }}" class="d-block w-100 filter-black"
                    alt="Mid Year Cricket Association">
            </a>

        </div>

        <div class="col-lg-3 pt-lg-0 pt-3">
            <div class="row">
                <div class="col-12">
                    <a class="example-image-link " href="{{ asset('/images/gallery4.jpg') }}"
                        data-lightbox="example-set" data-title="Or press the right arrow on your keyboard.">
                        <img src="{{ asset('/images/gallery4.jpg') }}" class="d-block w-100 filter-black"
                            alt="Mid Year Cricket Association">
                    </a>
                </div>
                <div class="col-12 pt-3">

                    <div class="row">
                        <div class="col-6">
                            <a class="example-image-link " href="{{ asset('/images/gallery5.jpg') }}"
                                data-lightbox="example-set" data-title="Or press the right arrow on your keyboard.">
                                <img src="{{ asset('/images/gallery5-1.jpg') }}" class="d-block w-100 filter-black"
                                    alt="Mid Year Cricket Association">
                            </a>
                        </div>
                        <div class="col-6">
                            <a class="example-image-link " href="{{ asset('/images/gallery6.jpg') }}"
                                data-lightbox="example-set" data-title="Or press the right arrow on your keyboard.">
                                <img src="{{ asset('/images/gallery6-1.jpg') }}" class="d-block w-100 filter-black"
                                    alt="Mid Year Cricket Association">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 pt-lg-0 pt-3">

            <a class="example-image-link " href="{{ asset('/images/gallery7-1.jpg') }}" data-lightbox="example-set"
                data-title="Or press the right arrow on your keyboard.">
                <img src="{{ asset('/images/gallery7.jpg') }}" class="d-block w-100 filter-black"
                    alt="Mid Year Cricket Association">
            </a>

        </div>

        <div class="row  pt-5">
            <div class="col-lg-3 justify-content-center text-center   mx-auto">


                <a href="{{ route('web.gallery') }}"
                    class="dark-blue px-5 w-100 py-3 text-white font-20 family-open-sans hvr-grow fw-500 rounded-pill">
                    View More</a>



            </div>
        </div>
    </div>



</div>
</div>
