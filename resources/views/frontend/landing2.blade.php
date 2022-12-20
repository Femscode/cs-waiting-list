<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My WaitList Landing Page</title>
    <link rel="stylesheet" href="assets/style.css">
    <!-- font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
        <script src="cdn/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
</head>

<body>
    <!-- Body/nav section -->
    <!-- <div class="container"> -->
   
    <!-- Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog"
        aria-labelledby="registerModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                       Register Now
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p>You will get a firsthand access to the platform once it is launched.</p>
                    <form action="" id='register' class="entries">
                        <input type="hidden" class="form-control" value='{{ $user->referral_id }}' id="referred_by">
                        <input type="text" id='first_name' placeholder="First name">
                        <input type="text" id='last_name' placeholder="Last name" >
                        <input type="email" id='email' placeholder="Email Address">
                        <button type='submit' class="reg-btn">Join</button>
        
                    </form>
                </div>
               
            </div>
        </div>
    </div>

    <div class="container-class">
        <div class="navbar-cont">

            <div class="logi">
                <img src="assets/images/connectskillz 1.svg" alt="">

                <!-- <div class="menu">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                </div> -->

                <nav>
                    <ul class="nav-sp">
                        <li><a href="/waitlist/faq">FAQS</a></li>
                        <li><a href="/waitlist/login" class="spr-btn">Login</a></li>
                    </ul>


                </nav>

            </div>

            <!-- First section -->

            <div class="container-vision">
                <div class="cont-vision">
                    <div class="cont-success">
                        <div class="box">
                            <h3>You have been referred to join the waiting list by {{ $user->first_name }}-{{ $user->last_name }},</h3>
                          
                            <p>With our LMS we make your success attainable through a well structured learning pathway
                                and
                                training from the best SME's in your desired field</p>
                        </div>

                        <div class="waiting">
                            <a  data-toggle="modal" style='color:#fff' data-target="#registerModal" >Join the waiting list</a>
                        </div>
                       
                    </div>

                    <!-- Button trigger modal -->


                    <div class="img-group">
                        <img src="assets/images/Group 297.png" alt="">
                    </div>



                </div>
            </div>
        </div>


        <div class="dashboard-sect">
            <div class="ecl">
                <img src="assets/images/vector010.svg" alt="">
            </div>

            <div class="Eclipse1">
                <img src="assets/images/dashboard 1.svg" alt="">
            </div>

            <div class="ecl">
                <img src="assets/images/vector020.svg" alt="">
            </div>
        </div>

        <!-- THE DIGITAL GROUTH SECTION-->
        <Section class="digital">
            <div class="hd-txt">
                <h1>Your Digital Growth</h1>
            </div>

            <!-- THE DESCRIPTION SECTION -->
            <div class="desc">
                <div class="d-img">
                    <div class="imgI">
                        <img src="assets/images/Ellipse 204 (2).svg" alt="">
                    </div>
                    <div class="imgII">
                        <img src="assets/images/devteam.png" alt="">
                    </div>
                </div>

                <div class="d-ctnt">
                    <div class="hg-h">
                        <a>LEARN</a>
                    </div>

                    <div class="ctxt">
                        <h1>Designed to make learning easier for you</h1>
                        <p>With our e-learning platform, we prioritise deeper learning through intentional peer
                            interactions and knowledge sharing. The best part is that you can create your own learning
                            path or follow our proven process.</p>
                    </div>

                    <div class="waiting">
                        <a data-toggle="modal" style='color:#fff' data-target="#registerModal" >Join the waiting list</a>
                    </div>
                </div>
            </div>


            <!-- the second one -->
            <div class="rev">


                <div class="d-ctnt">
                    <div class="hg-h">
                        <a>E-WORK EXPERIENCE</a>
                    </div>

                    <div class="ctxt">
                        <h1>A completely immersive environment for you.</h1>
                        <p>You want the job but need to gain experience, but you don't have enough to be hired. Use our
                            e-work feature to gain all of the experience you need to land that job.</p>
                    </div>

                    <div class="waiting">
                        <a data-toggle="modal" style='color:#fff !important' data-target="#registerModal">Join the waiting list</a>
                    </div>
                </div>

                <div class="d-img">
                    <div class="img-sep ">
                        <img src="assets/images/Ladies.png" alt="">
                    </div>
                </div>
            </div>


            <!-- the third one -->
            <div class="desc">
                <div class="d-img">
                    <div class="img-sep ">
                        <img src="assets/images/meet.png" alt="">
                    </div>
                </div>

                <div class="d-ctnt">
                    <div class="hg-h">
                        <a>RECOGNITION</a>
                    </div>

                    <div class="ctxt">
                        <h1>A badge and certification system designed with you in mind.</h1>
                        <p>We seamlessly award badges and certifications to track your progress and achievements</p>
                    </div>

                    <div class="waiting">
                        <a data-toggle="modal" style='color:#fff !important' data-target="#registerModal">Join the waiting list</a>
                    </div>
                </div>


            </div>

        </Section>

        <!-- the Success Story Section -->
        <section class="suc-s">
            <div class="d-story">
                <img src="assets/images/success.png" alt="" class="own">
                <p class="quo">"</p>

                <div class="story">
                    <h4>I am overjoyed to be able to share this wonderful news with you. I finally got a job as a lead
                        PMO analyst with a major cosmetics company.</h4>
                    <p> "When I joined ConnectinSkillz, I made sure to complete all of my training, joined multiple
                        projects and discussion groups, volunteered in a variety of ways, and when I felt I was ready to
                        send out my applications, I was able to create an industry-acceptable CV with interview
                        practical sessions with the help of my mentor, and here I am."</p>
                </div>

                <h1>-Stephen Elvis</h1>
            </div>
        </section>


        <!-- section of Special offers -->
        <div class="cased">
            <section class="spec">

                <div class="spec-hd">
                    <h1>Our special features for you</h1>
                    <p>We provide various special features for you</p>
                </div>

                <div class="sp-sec">
                    <div class="specs">
                        <div class="specicon">
                            <img src="assets/Indicon/Vector.svg" alt="">
                        </div>
                        <div class="spc-txt">
                            <h3>Best Trainers</h3>
                            <p>We provide various special features for you</p>
                        </div>
                    </div>

                    <!-- 02 -->
                    <div class="specs">
                        <div class="specicon">
                            <img src="assets/Indicon//flexi.svg" alt="">
                        </div>
                        <div class="spc-txt">
                            <h3>Flexible</h3>
                            <p>We provide various special features for you</p>
                        </div>
                    </div>

                    <!-- 03 -->
                    <div class="specs">
                        <div class="specicon">
                            <img src="assets/Indicon/Ease.svg" alt="">
                        </div>
                        <div class="spc-txt">
                            <h3>Easy Access</h3>
                            <p>We provide various special features for you</p>
                        </div>
                    </div>

                    <!-- 04 -->
                    <div class="specs">
                        <div class="specicon">
                            <img src="assets/Indicon/Vector.svg" alt="">
                        </div>
                        <div class="spc-txt">
                            <h3>Live Projects</h3>
                            <p>We provide various special features for you</p>
                        </div>
                    </div>

                    <!-- 05 -->
                    <div class="specs">
                        <div class="specicon">
                            <img src="assets/Indicon/Vector.svg" alt="">
                        </div>
                        <div class="spc-txt">
                            <h3>Personal Mentors</h3>
                            <p>We provide various special features for you</p>
                        </div>
                    </div>
                </div>

                <div class="waiting">
                    <a data-toggle="modal" style='color:#fff !important' data-target="#registerModal">Join the waiting list</a>
                </div>

            </section>
            <div class="imds">
                <img src="assets/images/vector010.svg" alt="">

            </div>
        </div>

        <footer>
            <div class="foot1">
                <div class="ft010">
                    <div class="logos">
                        <img src="assets/images/connectskillz 1.svg" alt="" class="lgsvg">
                        <!-- <p>ConnectinSkillz</p> -->
                        <img src="assets/Indicon/ConnectinSkillz.svg" alt="" class="ftsvg">
                    </div>
                    <div class="abt">
                        <p>An E-learning platform and work experience designed for you</p>
                    </div>


                </div>
                <div class="ft020">
                    <div class="ct-info">
                        <img src="assets/Indicon/mailing.svg" alt="">
                        <a href="mailto:info@connectinskillz.org">info@connectinskillz.org</a>
                    </div>

                    <div class="ct-info">
                        <img src="assets/Indicon/callme.svg" alt="">
                        <a href="tel:+44 (0) 3301332756">+44 (0) 3301332756</a>
                    </div>
                </div>

                <div class="eco">
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">FAQS</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>


                </div>

            </div>

        </footer>


        <script src="assets/Sandbox.js">


        </script>

<script src='cdn/sweetalert.min.js'></script>
<script src='cdn/jquery-3.6.0.min.js'></script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $("#register").on("submit", async function(e) {
        
        e.preventDefault();
        var fd = new FormData;
        fd.append('first_name', $("#first_name").val());
        fd.append('last_name', $("#last_name").val());
        fd.append('email', $("#email").val());
        fd.append('referred_by', $("#referred_by").val());
      
        console.log(fd)
        $.ajax({
            type: 'POST',
            url: "{{route('subscribe')}}",
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success: function($data) {
                console.log('the data', $data)
                Swal.close()
                Swal.fire('Congratulations', 'You have successfully registered, please check your email to proceed!', 'success')
                // window.location.reload()
                
            },
            error: function(data) {
                console.log(data)
                Swal.close()
                Swal.fire('Opps!', "Email address already in existence", 'error')
            }
        })

    })

    
        
    })
</script>

</body>

</html>