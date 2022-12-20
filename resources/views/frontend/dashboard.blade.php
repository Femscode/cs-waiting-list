<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
   <!-- <link rel="stylesheet" href="assets/style.css">-->
    <link rel="stylesheet" href="{{asset('forgotpass/style.css')}}" >
    <!-- font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
            <link rel="icon" type="image/x-icon" href="{{asset('forgotpass/images/connectskillz 1.svg')}}">

</head>

<body>
    <!-- Header section for all the Dashboard pages -->
    <header class="dsh">
        <nav>
            <div class="cs-logo">
               <a href='/waitlist'> <img src="assets/w-icon/connectskillz 1.svg" alt="logo" class="logo1"></a>

                <div class="menu" onclick="">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>

            <div class="nvbox">
                <ul class="hd-nav">
                    <li class="dg-a"> <a href="/dashboard">Overview</a> </li>
                    <li class="dg-a"> <a href="/refer_friend">Refer a Friend</a></li>
                    <li class="dg-c"><a href="/logout"
                            onclick="return confirm('Are you sure you want to log out?')">Logout</a></li>
                </ul>
            </div>

        </nav>
    </header>

    <Section class="disp01">
        <div class="user_name">
            <h1>Welcome {{ Auth::user()->first_name }},</h1>
        </div>

        <div class="stats">

            <div class=" same">
                <div class="inden"></div>
                <div class="sd-txt">
                    <h1 id='position'>#93</h1>
                    <p>Position on the Waitlist</p>
                </div>
            </div>
            <input type='hidden' id='allusers' value='{{ count($allusers) }}'/>

            <div class=" same ">
                <div class="inden"></div>
                <div class="sd-txt">
                    <h1>#{{ count($allusers) }}</h1>
                    <p>Total people on the Wailist</p>
                </div>
            </div>

            <div class="same">
                <div class="inden"></div>
                <div class="sd-txt">
                    <h1>#{{ count($user_referred) }}</h1>
                    <p>People you referred</p>
                </div>
            </div>
        </div>
    </Section>

    <Section class="mjr01">
        <div class="table-disp">

            <div class="tb-head">
                <h4>Position</h4>
                <h4> First Name </h4>
                <h4>Last Name</h4>
            </div>
            @foreach($allusers as $key => $user)
            @if($user->email == Auth::user()->email)
            <div class="tb-body" style='background:#EAEEFD'>
                <p id='currentpos'>{{ ++$key }}</p>
                <p> {{ substr($user->first_name, 0, 1) }}{{ str_replace($user->first_name, "*******", $user->first_name)}} </p>
                <p> {{ substr($user->last_name, 0, 1) }}{{ str_replace($user->last_name, "*******", $user->last_name)}} </p>
                <!--<p> {{ ucfirst($user->last_name) }}</p>-->
            </div>
            @elseif($key == 5)
            <div class="tb-body">
                <p>...</p>
                <p>... </p>
                <p>...</p>
            </div>
            @elseif($key >= 5)
          
            @else 
            <div class="tb-body">
                <p >{{ ++$key }}</p>
                <p> {{ substr($user->first_name, 0, 1) }}{{ str_replace($user->first_name, "*******", $user->first_name)}} </p>
                <p> {{ substr($user->last_name, 0, 1) }}{{ str_replace($user->last_name, "*******", $user->last_name)}} </p>
               
            </div>
            @endif
            @endforeach
        	<p style='width:100%;text-align:right'>
            <a style='text-align:center;justify-content:right' class='btn btn-primary'href='/overview'>See More→</a>
         
          </p>



        </div>

        <div class="r-lnk">
            <div class="lnk">
                <div class="cp-in">
                    <h5>Refer your friends to get early access to LXP</h5>
                    <p>Use your link to invite many of your friends</p>
                </div>

                 <div class="reff">
                <input type="text" value="https://connectinskillz.com/waitlist/{{ Auth::user()->referral_id }}" id="cptxt">
                <button onclick={copies()}>
                  <img src="{{asset('forgotpass/w-icon/cpy.svg')}}" class="cpy">
                   </button>
                <p id="dipp" class="dipp"></p>
            	</div>

                <div class="cp-in">
                    <h5>Share your unique link</h5>
                    <p>The more friends who sign up using the link, the faster you get access.</p>
                </div>

            </div>


            <div class="in-lnk">
                <!-- infographs -->
                <div class="d-graphs">
                    <div class="in-sec01">
                        <img src="assets/w-img/ref.svg" alt="" class="illus">
                        <p>Refer a friend and move up the list by 5</p>
                    </div>
                    <!-- infographs -->
                    <div class="in-sec01">
                        <img src="assets/w-img/undraw_file_analysis_8k9b 1.svg" alt="" class="illus">
                        <p>Refer a friend and move up the list by 5</p>
                    </div>
                </div>


                <div class="gains">
                    <p><img src="assets/w-img/emojione_wrapped-gift.svg" alt=""> 1st on the list will get in for free.
                    </p>
                    <p><img src="assets/w-img/emojione_wrapped-gift.svg" alt="">2nd on the list will pay 50.</p>
                    <p><img src="assets/w-img/emojione_wrapped-gift.svg" alt="">3rd on the list will pay £70.</p>
                    <p><img src="assets/w-img/emojione_wrapped-gift.svg" alt="">The 100 after (4-100), will get it for
                        £80</p>
                </div>
            </div>


        </div>
    </Section>

  <!--  <script src="assets/func.js"></script>-->
   <script src="{{asset('forgotpass/func.js')}}"></script>

    <script src="{{asset('cdn/jquery-3.6.0.js')}}"></script>
    <script src="{{asset('/cdn/sweetalert.min.js')}}"></script>
    <script>
        $(document).ready(function() {
        
       
    var allusers = $("#allusers").val()
    var currentpos = $("#currentpos").text()

    console.log(allusers,currentpos,'all')
    for(var i = 0;i <= allusers;i++) {
        if(i == currentpos) {
            $("#position").text("#"+i)
        }
    }
    function copyLink(element) {
    var $temp = $("<input>");
     $("body").append($temp);
     $temp.val($(element).html()).select();
     document.execCommand("copy");
     $temp.remove();
     Swal.fire({
	// title:"P!",
	text:"Link Copied",
	type:"info",
    showConfirmButton: false,
	timer:500
    });
}
})
    </script>

</body>

</html>