@extends('frontend.layouts.app')
@include('frontend.common.seo_fields')
@section('content')
    <div class="container-fluid banner-section">
        <div class="row">
            <div class="col-lg-12 px-0">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('/images/inner-banner.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption text-start mb-lg-5">
                                <h5 class="text-white font-36 family-open-sans fw-bolder pb-2 text-cover mb-lg-5"> Contact
                                    Us
                                </h5>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- banner end --}}

    <div class="container-fluid contact-section py-5 dark-blue">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @include('frontend.common.alerts')
                    <form class="pt-1" method="post" action="{{route('web.contactsubmit')}}"
                        onsubmit="document.getElementById('contact-submit-btn').setAttribute('disabled','disabled');">

                        {{ csrf_field() }}


                        <div class="row mb-4">
                            <div class="col-lg-6 ">
                                <label for="" class="font-14  family-open-sans  fw-500 text-white pb-2">First
                                    Name <span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control  font-15 font-Asap fw-normal py-2 border-dark rounded-5 border-bottom border-top-0 border-end-0 border-start-0 "
                                    placeholder="First name" name="first_name" value="{{ old('first_name') }}" required>

                            </div>
                            <div class="col-lg-6">
                                <label for="" class="font-14  family-open-sans  fw-500 text-white pb-2">Last
                                    Name <span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control  font-15 font-Asap fw-normal py-2 border-dark rounded-5 border-bottom border-top-0 border-end-0 border-start-0 "
                                    placeholder="Last name" name="last_name" value="{{ old('last_name') }}" required>

                            </div>
                        </div>
                        <!-- Email input -->

                        <div class="col-lg-12 mb-4">
                            <label for="" class="font-14  family-open-sans  fw-500 text-white pb-2">Email <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control  font-15 font-Asap fw-normal py-2 border-dark rounded-5 border-bottom border-top-0 border-end-0 border-start-0 "
                                placeholder="Email" name="email" value="{{ old('email') }}" required>


                        </div>
                        <div class="col-lg-12 mb-4">

                            <label for="" class="font-14  family-open-sans  fw-500 text-white pb-2">Phone
                                Number <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('phone') }}"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                class="form-control  font-15 font-Asap fw-normal py-2 border-dark rounded-5 border-bottom border-top-0 border-end-0 border-start-0 "
                                name="phone" placeholder="Phone Number">

                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12 ">
                                <label for="" class="font-14  family-open-sans  fw-500 text-white pb-2">Message
                                    Subject <span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control  font-15 font-Asap fw-normal py-2 border-dark rounded-5 border-bottom border-top-0 border-end-0 border-start-0 "
                                    placeholder="Subject" name="subject" value="{{ old('subject') }}" required>

                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <label for="" class="font-14  family-open-sans  fw-500 text-white pb-2">Message <span class="text-danger">*</span></label>
                            <textarea
                                class="form-control font-15 font-Asap fw-normal py-2 border-dark rounded-5 border-bottom border-top-0 border-end-0 border-start-0"
                                placeholder="Message" name="message" rows="5" required>{{ old('message') }}</textarea>

                        </div>
                        <div class="mb-3 mt-1">
                            <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_SITEKEY')}}"></div>
                   </div>
                        <div class="col-lg-6 text-center">
                            <button type="submit"
                                class="btn font-16 w-100 text-white family-open-sans  bg-orange border-rounded-left hvr-forward"
                                id="contact-submit-btn">Submit </button>
                        </div>

                </div>
                <div class="col-lg-6 pt-lg-0 pt-4">

                    

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3157.495994389886!2d145.01741797523573!3d-37.68454907200818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad64f6cf62025b5%3A0x3b071fada034c02a!2s51%20Latitude%20Blvd%2C%20Thomastown%20VIC%203074%2C%20Australia!5e0!3m2!1sen!2slk!4v1710411902048!5m2!1sen!2slk" width="100%" class="map" style="border:0;" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <div class="row pt-4">
                        <div class="col-lg-12">
                            <div class="row pb-2">
                                <div class="col-1">
                                    <i class="fa fa-map-marker  text-white rounded-btn  fa-xs pe-2"></i>
                                </div>

                                <div class="col-10">

                                    <p class="font-14 fw-500 text-white">51 Latitude Blvd Thomastown 3074.
                                    </p>

                                </div>
                            </div>
                        </div>


                        {{-- <div class="col-lg-12">
                            <div class="row pb-2">
                                <div class="col-1">
                                    <i class="fa fa-phone  fa-xs pe-2   text-white rounded-btn"></i>
                                </div>

                                <div class="col-10">
                                    <p class="font-14 fw-500 text-white"><a class="text-white hover-orange"
                                        href="tel:61412345678">+61 412 345 678</a></p>
                                </div>
                            </div>
                        </div> --}}


                        <div class="col-lg-12">
                            <div class="row pb-2">
                                <div class="col-1">
                                    <i class="fa fa-envelope   text-white fa-xs pe-2 rounded-btn  "></i>
                                </div>

                                <div class="col-10">
                                    <p class="font-14 fw-500 text-white"><a class="text-white hover-orange"
                                        href="mailto:info@myca.org.au ">info@myca.org.au</a> </p>
                                </div>
                            </div>
                        </div>






                    </div>
                </div>
            </div>

<div class="row">
    <div class="col-12">
        <h1 class="text-white font-30 family-open-sans fw-bolder pt-5 pb-2 text-cover mb-4">
            Office Bearers: {{date('Y')}}
        </h1>


        <div class="table-responsive ">
            <table class="table">
                <thead>
                  <tr  class="bg-orange py-2">
                    <th class="font-16 fw-500 family-open-sans  text-white" scope="col">Position</th>
                    <th  class="font-16 fw-500 family-open-sans  text-white " scope="col">Held by	</th>
                    <th  class="font-16 fw-500 family-open-sans  text-white " scope="col">Email</th>
                    <th  class="font-16 fw-500 family-open-sans  text-white" scope="col">Phone</th>

                  </tr>
                </thead>
                <tbody class="bg-white">

                    <tr>
                        <td class="font-14 fw-500 family-open-sans ">President</td>
                        <td class="font-14 fw-500 family-open-sans ">Raj Bhatia </td>
                        <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="mailto:president@myca.org.au">president@myca.org.au</a> </td>
                        <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="tel:0401939123">0401939123</a></td>
                     </tr>
                     <tr>
                        <td class="font-14 fw-500 family-open-sans ">Vice President	</td>
                        <td class="font-14 fw-500 family-open-sans ">Sandip Gadakh</td>
                        <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="mailto:vicepresident@myca.org.au">vicepresident@myca.org.au</a> </td>
                        <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="tel:0414562780">0414562780</a></td>
                     </tr>

                     <tr>
                        <td class="font-14 fw-500 family-open-sans ">Secretary</td>
                        <td class="font-14 fw-500 family-open-sans ">Ranil Fernandopulle</td>
                        <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="mailto:treasurer@myca.org.au">treasurer@myca.org.au</a> </td>
                        <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="tel:0434554020">0434554020</a></td>
                     </tr>
                     <tr>
                        <td class="font-14 fw-500 family-open-sans ">Treasurer</td>
                        <td class="font-14 fw-500 family-open-sans ">Siddharth Mamgain</td>
                        <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="mailto:secretary@myca.org.au">secretary@myca.org.au </a> </td>
                        <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="tel:0412214567">0412214567</a></td>
                     </tr>

                     <tr>
                        <td class="font-14 fw-500 family-open-sans ">Game Administrator</td>
                        <td class="font-14 fw-500 family-open-sans ">Mansoor Kazi</td>
                        <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="mailto:matchadmin@myca.org.au">matchadmin@myca.org.au
                        </a> </td>
                        <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="tel:0431068938">0431068938</a></td>
                     </tr>


                  {{-- <tr>

                    <td class="font-14 fw-500 family-open-sans ">General Committee</td>
                    <td class="font-14 fw-500 family-open-sans ">Luke Boreham  	</td>
                    <td class="font-14 fw-500 family-open-sans ">-</td>
                    <td class="font-14 fw-500 family-open-sans ">-</td>
                  </tr> --}}
                  <tr>
                    <td class="font-14 fw-500 family-open-sans ">Grade Secretary East and South and Junior</td>
                    <td class="font-14 fw-500 family-open-sans ">Vikramjit Multani</td>
                    <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="mailto:matchsecretary@myca.org.au   ">matchsecretary@myca.org.au
                    </a> </td>
                    <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="tel:0423930260">0423930260</a></td>
                 </tr>


                 <tr>
                    <td class="font-14 fw-500 family-open-sans ">Grade Secretary North and West</td>
                    <td class="font-14 fw-500 family-open-sans ">Nakul Pisolkar</td>
                    <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="mailto:matchsecretary@myca.org.au">matchsecretary@myca.org.au</a> </td>
                    <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="tel:0452526069">0452526069</a></td>
                 </tr>

                 <tr>
                    <td class="font-14 fw-500 family-open-sans ">General Committee	</td>
                    <td class="font-14 fw-500 family-open-sans ">Ashwin Vagdoda</td>
                    <td class="font-14 fw-500 family-open-sans "> _ </td>
                    <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="tel:0402672144">0402672144</a></td>
                 </tr>



                  <tr>

                    <td class="font-14 fw-500 family-open-sans ">Representative Co-Ordinator </td>
                    <td class="font-14 fw-500 family-open-sans ">Indika Masalage</td>
                    <td class="font-14 fw-500 family-open-sans "> _ </td>
                    <td class="font-14 fw-500 family-open-sans "> _ </td>
                  </tr>

                  <tr>

                    <td class="font-14 fw-500 family-open-sans ">Umps Appt Manager	</td>
                    <td class="font-14 fw-500 family-open-sans ">Neil Daly
                    </td>
                    <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="mailto:matchsecretary@myca.org.au">matchsecretary@myca.org.au

                    </a> </td>
                    <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="tel:0428794002">0428794002</a></td>
                  </tr>

                  <tr>

                    <td class="font-14 fw-500 family-open-sans ">PlayHQ Manager</td>
                    <td class="font-14 fw-500 family-open-sans ">Madan Deshmukh  		</td>
                    <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="mailto:matchsecretary@myca.org.au">matchsecretary@myca.org.au
                    </a> </td>
                    <td class="font-14 fw-500 family-open-sans "><a class="text-black hover-orange"  href="tel:0412520651">0412520651 </a></td>
                  </tr>

                </tbody>
              </table>
          </div>
    </div>
</div>

        </div>
    </div>
@endsection
