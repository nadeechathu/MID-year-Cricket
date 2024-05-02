@if (sizeof($news) > 0)
<div class="container-fluid py-4 event-section dark-blue">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="color-orange font-36 family-open-sans fw-500 pb-2 text-cover">News </h2>

        </div>


        <div class="col-lg-6 pt-4 news_section_left">

            <div class="row px-3 ">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    @foreach ($news as $newsItem)
                    <button class="nav-link  w-100 p-0 bg-transparent border-0 mb-4 {{ $newsItem->slug == $slug ? 'active' : '' }}"  id="{{ 'v-pills-home-tab' . $newsItem->id }}"  onClick="setSelectedCategory('{{ $newsItem->slug }}')" data-bs-toggle="pill" data-bs-target="{{ '#v-pills-home' . $newsItem->id }}" type="button" role="tab" aria-controls="pills-news" aria-selected="true">
                        <div class="col-lg-12 bg-orange rounded-100-left  news-sec-hover">
                            <div class="row">
                                <div class="col-10">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="{{ asset('/images/cove-ico.png') }}" class="d-block w-100"  alt="Mid Year Cricket Association">
                                            <h6 class="font-24 family-open-sans fw-500 news-date text-white">

                                                {{ date('d', strtotime($newsItem->event_date_time)) }} <br>

                                                {{ date('M', strtotime($newsItem->event_date_time)) }}

                                            </h6>
                                        </div>
                                        <div class="col-9 ps-1 pt-1">
                                            <p class="  pt-lg-4 pt-2 font-18 family-open-sans fw-500 text-start text-white news-item-title">
                                                {{ $newsItem->title }} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2  pt-lg-4 pt-2">
                                    <i class="fa fa-angle-double-right fs-3 text-white mt-1" aria-hidden="true"></i>

                                </div>
                            </div>
                        </div>
                    </button>
                    @endforeach



                </div>
            </div>
    </div>


        <div class="col-lg-6 pt-4">
            <div class="tab-content" id="v-pills-tabContent">
                @if (sizeof($news) > 0)
                @foreach ($news as $index => $newsItem)
                <div class="tab-pane fade show {{ $index == 0 ? 'active' : '' }}"  id="{{ 'v-pills-home' . $newsItem->id }}" role="tabpanel" aria-labelledby="{{ 'v-pills-home-tab' . $newsItem->id }}">

                    <div class="p-lg-5 p-3 rounded-15 light-blue">
                        <img
                        src="{{$newsItem->image != null ? asset($newsItem->image->src) : ''}}"
                        class="d-block rounded-15 w-100"  alt="Mid Year Cricket Association">
                        {{-- <h6 class="font-24 family-open-sans fw-500 img-news-date text-white">
                           {{  $newsItem->created_at->format('d') }} <br>
                            {{ substr($newsItem->created_at->format('F'), 0, 3) }}

                            </h6> --}}
                        <h3 class="pt-3 pb-1 color-orange font-24 family-open-sans fw-500"> {{ $newsItem->title }} </h3>


                        <div class="text-white font-13 fw-light family-open-sans">   {!! substr($newsItem->body, 0, 350) !!} </div>
                        <div class="row pt-3">
                            <div class="col-lg-8">
                                @if ($newsItem->location != null)
                                <div class="row pt-1">
                                    <div class="col-1">
                                        <i class="fa fa-map-marker fw-lighter color-orange fs-5 pt-1"
                                            aria-hidden="true"></i>
                                    </div>
                                    <div class="col-10">
                                        <h5 class="color-orange  pt-2 font-14 family-open-sans fw-500 ps-2">
                                            {{ $newsItem->location }} </h5>
                                    </div>
                                </div>
                                @else
                                @endif


                                @if ($newsItem->event_date_time != null)
                                <div class="row pt-1">
                                    <div class="col-1">
                                        <i class="fa fa-calendar fw-lighter color-orange fs-5 pt-1"
                                            aria-hidden="true"></i>
                                    </div>
                                    <div class="col-10">
                                        <h5 class="color-orange  pt-2 font-14 family-open-sans fw-500 ps-2">
                                        {{ date("Y-m-d h:i A", strtotime($newsItem->event_date_time)) }} </h5>
                                    </div>
                                </div>

                                @else

                                @endif

                            </div>
                            <div class="col-lg-4 pt-lg-3 pt-3">
                                <div class="row">
                                    {{-- <div class="col-2">
                                        <i class="fa fa-share-alt fw-lighter color-orange fs-5 pt-2"
                                            aria-hidden="true"></i>
                                    </div> --}}
                                    <div class="col-12 text-center">
                                        <a href="{{ route('web.single_news', ['slug'=> $newsItem->slug]) }}"
                                            class="bg-orange text-white py-2  w-100 font-16 family-open-sans hvr-shrink
                                            fw-500 rounded-pill">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>

            @endforeach
            @endif


        </div>

    </div>
    </div>
</div>
@endif

<script>
    function setSelectedCategory(slug) {

        document.getElementById('selected-category').value = slug;

    }
</script>


