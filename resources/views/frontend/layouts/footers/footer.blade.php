 <!-- Footer-->
 <div class="container-fluid subscribe-section py-5">
     <div class="container">
         <div class="row ">
             <div class="col-lg-10 justify-content-center dark-blue rounded-pill  mx-auto">
                 <div class="row p-lg-4">
                     <div class="col-lg-6">
                         <h3 class="font-27 text-white fw-500 family-open-sans">Subscribe Our Newsletter</h3>

                     </div>
                     <div class="col-lg-6 pt-lg-0 pt-sm-0 pt-3">
                         <div class="input-group ">
                             <input type="email"
                                 class="form-control font-15 family-open-sans  py-1 border-rounded-left"
                                 id="subscription-email" placeholder="Enter Your Email">
                             <button class="btn font-16 text-white family-open-sans  bg-orange border-rounded-left"
                                 type="submit" onClick="addSubscription();">Subscribe</button>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
        </div>
         <div class="row pt-4 px-3">
             <div class="col-lg-4 ">
                 <a class="font-14  family-open-sans  fw-500 text-black hover-orange" href="./">
                     <img class="hvr-grow" src="{{ asset('/images/myca.png') }}" alt="Mid Year Cricket Association">
                 </a>
                 <p class="pt-2 font-14  fw-500 family-open-sans">
                    Found in 2010, After missing out in 2020 due to pandemic MYCA has seen exponential growth to 106 clubs with 180 senior, 6 women's and 8 junior teams competing in its 12th season in 2021. Teams are divided into 16 zones, determined by location, with each Zone vying for its own Premiership. MYCA plays one day games from April to August using yellow balls and professional umpires.
                 </p>

                 <p class="pt-2 font-16 fw-500"><a class="text-black hover-orange undeline-a"
                         href="{{ route('web.about_us') }}">Read More</a></p>
             </div>
             <div class="col-lg-2 col-sm-6">
                 <h4 class="font-20 pt-5 pb-3 fw-bolder">
                     Useful Links
                 </h4>
                 <ul>
                     <li class="pb-2"><i class="fa fa-angle-right left-ico"></i>
                         <a class="font-14  family-open-sans  fw-500 text-black hover-orange" href="{{ route('web.about_us') }}">About
                             Us</a>
                     </li>
                     <li class="pb-2"><i class="fa fa-angle-right left-ico"></i> <a
                             class="font-14  family-open-sans  fw-500 text-black hover-orange" href="{{ route('web.news') }}">News</a>
                     </li>
                     <li class="pb-2"><i class="fa fa-angle-right left-ico"></i> <a
                             class="font-14  family-open-sans  fw-500 text-black hover-orange" href="{{ route('web.events.archive') }}">Events</a>
                     </li>
                     <li class="pb-2"><i class="fa fa-angle-right left-ico"></i> <a
                             class="font-14  family-open-sans  fw-500 text-black hover-orange" href="{{ route('web.rules.regulations') }}">Rules</a>
                     </li>
                     <li class="pb-2"><i class="fa fa-angle-right left-ico"></i> <a
                             class="font-14  family-open-sans  fw-500 text-black hover-orange" href="{{ route('web.resources') }}">Resources</a></li>
                     <li class="pb-2"><i class="fa fa-angle-right left-ico"></i> <a
                             class="font-14  family-open-sans  fw-500 text-black hover-orange" href="{{ route('web.contact_us') }}">Contact
                             Us</a></li>
                 </ul>






             </div>
             <div class="col-lg-3 col-sm-6">
                 <h4 class="font-20 pt-5 pb-3 fw-bolder">
                     Popular Links
                 </h4>
                 <ul>

                        <li class="pb-2"><i class="fa fa-angle-right left-ico"></i>
                             <a class="font-14  family-open-sans  fw-500 text-black hover-orange"
                                 href="https://www.cricketvictoria.com.au" target="_blank">
                               Cricket Victoria

                             </a>
                         </li>
                         <li class="pb-2"><i class="fa fa-angle-right left-ico"></i>
                             <a class="font-14  family-open-sans  fw-500 text-black hover-orange"
                                 href="https://www.cricket.com.au" target="_blank">
                               Cricket Australia

                             </a>
                         </li>
                 </ul>





             </div>
             <div class="col-lg-3">
                 <h4 class="font-20 pt-5 pb-3 fw-bolder">
                     Contact Info
                 </h4>

                 <div class="row pb-2">
                     <div class="col-1">
                         <i class="fa fa-map-marker fa-xs pe-2"></i>
                     </div>
                     {{-- <i class="fa-sharp fa-regular fa-location-dot"></i> --}}
                     <div class="col-10">

                         <p class="font-14 fw-500 text-black">51 Latitude Blvd Thomastown 3074.
                         </p>

                     </div>
                 </div>

                 {{--<div class="row pb-2">
                     <div class="col-1">
                         <i class="fa fa-phone  fa-xs pe-2"></i>
                     </div>
                     <div class="col-10">
                         <p class="font-14 fw-500 text-black"><a class="text-black hover-orange"
                                 href="tel:61412345678">+61 412 345 678</a></p>
                     </div>
                 </div>--}}
                 <div class="row pb-1">
                     <div class="col-1">
                         <i class="fa fa-envelope  fa-xs pe-2  "></i>
                     </div>
                     <div class="col-10">
                         <div class="row">
                             <div class="col-12">
                                 <p class="font-14 fw-500 text-black"><a class="text-black hover-orange"
                                         href="mailto:info@myca.org.au">info@myca.org.au</a> </p>
                             </div>
                         </div>
                     </div>
                 </div>





                 <div class=" pt-3">
                     <a class="social-button  color-orange facebook hvr-wobble-bottom"
                         href="{{ $commonContent['facebookLink']['description'] }}" target="_blank"><i
                             class="fa fa-facebook-f"></i></a>
                     <a class="social-button color-orange instagram hvr-wobble-bottom"
                         href="{{ $commonContent['instagramLink']['description'] }}" target="_blank">
                         <img class="" src="{{ asset('/images/hq.png') }}" alt="Mid Year Cricket Association">

                        </a>
                     <a class="social-button color-orange twitter hvr-wobble-bottom"
                         href="{{ $commonContent['twitterLink']['description'] }}" target="_blank"><i
                             class="fa fa-twitter"></i></a>
                     {{-- <a class="social-button color-orange yoyoutube hvr-wobble-bottom" href="{{$commonContent['youtubeLink']['description']}}" target="_blank"><i class="fa fa-youtube-play"></i></a> --}}
                 </div>

             </div>

     </div>
 </div>



 <div id="jsScroll" class="scroll" onclick="scrollToTop();">
     <i class="fa fa-angle-up icon-bottom"></i>
 </div>

 <div class="container-fluid footer-section pt-3 pb-2 dark-blue">

        <div class="row px-3">
             <div class="col-lg-6">
                 <p class="font-13 fw-bolder family-open-sans text-white">© <?php echo date('Y'); ?> MYCA All Rights
                     Reserved.</p>
             </div>
             <div class="col-lg-6 text-end">
                 <p class="font-13 fw-bolder family-open-sans text-white">Powered by &nbsp;&nbsp; <a
                         href="https://bizgrip.com.au/" class="text-white hover-orange" target="_blank">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAeCAYAAABuUU38AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjBEQkVEQTlFMzc1NjExRUVCNDIzQjlEMjgxMjhCREQwIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjBEQkVEQTlGMzc1NjExRUVCNDIzQjlEMjgxMjhCREQwIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MERCRURBOUMzNzU2MTFFRUI0MjNCOUQyODEyOEJERDAiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MERCRURBOUQzNzU2MTFFRUI0MjNCOUQyODEyOEJERDAiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz68MLOFAAANPElEQVR42sRY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" />
                         </a></p>


             </div>
         </div>

 </div>

 @section('scripts')

 @endsection
