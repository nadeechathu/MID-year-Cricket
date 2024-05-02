<div class="container-fluid client-logo-section py-lg-5 py-3">
    <div class="row px-4">
        <div class="col-12 owl-carousel owlCarousel">

            @foreach ($sponsoraLogos as $sponsorLogo)
            <div class="rounded">
                <img src="{{asset($sponsorLogo->src)}}" class="d-block "  alt="Mid Year Cricket Association">
             </div>
            @endforeach

        </div>
    </div>
</div>
