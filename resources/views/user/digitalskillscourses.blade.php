@extends('user.userlayout')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="font-size-3">12 Digital Skills &amp; Courses That You Purchase with your <span style="background-color: #ffff99; color: #ff0000;">Video Earning Points</span> That Can Make You Instantly Employable in 2022 with ViewPoint</h1>
<p>&nbsp;</p>
<p><span style="color: #0000ff;"><strong>1. Digital Marketing:</strong></span><br />Online marketing is a component of marketing that deals with using a platform to promote or advertise brands, products, and services Using online platforms or any electronic media.</p>
<p><em><span style="text-decoration: underline; background-color: #ffff99;">You'll be able to purchase this COURSE with your Video Earning Points in the coming days.</span></em></p>
<p><br /><span style="color: #0000ff;"><strong>2. Web development:</strong></span><br />It is a digital skill that involves creating, designing, and maintaining websites and web applications. Web developers monitor the performance and capacity of a site.</p>
<p><em><span style="text-decoration: underline; background-color: #ffff99;">You'll be able to purchase this COURSE with your Video Earning Points in the coming days.</span></em></p>
<p><br /><span style="color: #0000ff;"><strong>3. Project Management:</strong></span><br />Amongst the trending, this is also one of the top digital skills. It involves getting a task done effectively and efficiently.</p>
<p><em><span style="text-decoration: underline; background-color: #ffff99;">You'll be able to purchase this COURSE with your Video Earning Points in the coming days.</span></em></p>
<p><br /><span style="color: #0000ff;"><strong>4. Search engine optimization (SEO):</strong></span><br />It&rsquo;s the process of increasing the website traffic or web page from organic search results in search engines like Google and Bing. And also improving the quality of content or website.</p>
<p><em><span style="text-decoration: underline; background-color: #ffff99;">You'll be able to purchase this COURSE with your Video Earning Points in the coming days.</span></em></p>
<p><br /><span style="color: #0000ff;"><strong>5. Graphic design:</strong></span><br />It is the creation of visual content with computer software to communicate or inform and attract customers.</p>
<p><em><span style="text-decoration: underline; background-color: #ffff99;">You'll be able to purchase this COURSE with your Video Earning Points in the coming days.</span></em></p>
<p><br /><span style="color: #0000ff;"><strong>6. Social media management:</strong></span><br />It is the process of analyzing, creating, and constructing social media content. Social media managers monitor the audience. They develop a strategy, monitor account profiles, and increase the social engagement of an organization or client.</p>
<p><em><span style="text-decoration: underline; background-color: #ffff99;">You'll be able to purchase this COURSE with your Video Earning Points in the coming days.</span></em></p>
<p><br /><span style="color: #0000ff;"><strong>7. Content Marketing:</strong></span><br />Content comes in many forms &ndash; blog posts, videos, podcasts, infographics, even social media status updates.<br />Marketers may spend their time optimizing keywords and advertising campaigns, but content is still king.</p>
<p><em><span style="text-decoration: underline; background-color: #ffff99;">You'll be able to purchase this COURSE with your Video Earning Points in the coming days.</span></em></p>
<p><br /><span style="color: #0000ff;"><strong>8. Pay-Per-Click Marketing (PPC):</strong></span><br />PPC or pay-per-click is a type of internet marketing that involves advertisers paying a fee each time one of their ads is clicked. Simply, you only pay for advertising if your ad is actually clicked on. You would be able to learn this course on how to effectively manage your PCC for your business and for others.</p>
<p><em><span style="text-decoration: underline; background-color: #ffff99;">You'll be able to purchase this COURSE with your Video Earning Points in the coming days.</span></em></p>
<p><br /><span style="color: #0000ff;"><strong>9. Content Creation:</strong></span><br />Content creation is a very fast-growing topic today. It includes blogging, graphics design, video editing and production, audio editing and production, infographics design, data visualization, and a lot of other things.</p>
<p><em><span style="text-decoration: underline; background-color: #ffff99;">You'll be able to purchase this COURSE with your Video Earning Points in the coming days.</span></em></p>
<p><br /><span style="color: #0000ff;"><strong>10. WordPress Web Design:</strong></span><br />There is a high demand for every business to have an online presence, and it has made web development job to be a hot skill. WordPress is the most popular Content Management System (CMS) and over 60% of the entire world&rsquo;s website runs on WordPress.</p>
<p><em><span style="text-decoration: underline; background-color: #ffff99;">You'll be able to purchase this COURSE with your Video Earning Points in the coming days.</span></em></p>
<p><br /><span style="color: #0000ff;"><strong>11. Cryptocurrency &amp; Blockchain Technology:</strong></span><br />Blockchain technology is the backbone behind cryptocurrency and digital currency. It is a system of recording and keeping the information in a manner that makes it almost impossible to change or cheat the system.</p>
<p><em><span style="text-decoration: underline; background-color: #ffff99;">You'll be able to purchase this COURSE with your Video Earning Points in the coming days.</span></em></p>
<p>&nbsp;</p>
<p><br /><span style="color: #0000ff;"><strong>12. UI/UX Design:</strong></span><br />UI/UX simply means User Interface and User Experience, both of them are related but not the same. This is another digital skill that is in top demand. Businesses want to make their software, website, or mobile apps appealing to their users.</p>
<p><em><span style="text-decoration: underline; background-color: #ffff99;">You'll be able to purchase this COURSE with your Video Earning Points in the coming days.</span></em></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <!-- Basic layout-->
                    @if ($post)
                        <div class="card blog-horizontal">
                            <div class="card-header">
                              
                            </div>

                          

                                
                            </div>

                            
                        </div>
                    @endif
                    <!-- /basic layout -->
                </div>
            </div>
        </div>
    @stop

    @section('script')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                if ("{{ $user_proof }}" == 1) {
                    swal({
                            title: null,
                            text: "✨CONGRATULATIONS ON YOUR LATEST CASHOUT. ✨ Upload Your Payment PROOF!",
                            icon: "success",
                            buttons: ["Close", "Upload Payment Proof Now!"],
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location.href = "{{ route('upload.proof') }}"
                            }
                        });
                }
            })
        </script>
    @endsection
