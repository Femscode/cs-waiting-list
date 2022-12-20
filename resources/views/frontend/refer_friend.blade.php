<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="{{asset('forgotpass/style.css')}}">
        <!-- font Family -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('forgotpass/images/connectskillz 1.svg')}}">

</head>
<body>
    <!-- Header section for all the Dashboard pages -->
    <header class="dsh">
        <nav>
            <div class="cs-logo">
                <img src="{{asset('forgotpass/w-icon/connectskillz 1.svg')}}" alt="logo" class="logo1">
                
                <div class="menu" onclick="">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>
           
            <div class="nvbox" >
                <ul class="hd-nav">
                    <li class="dg-a"> <a href="/dashboard">Overview</a> </li>
                    <li class="dg-a"> <a href="/refer_friend">Refer a Friend</a></li>
                    <li class="dg-c"><a href="/logout"
                            onclick="return confirm('Are you sure you want to log out?')">Logout</a></li>
               
                </ul>
            </div>
            
        </nav>
    </header>
    <!-- the main section containing the ref link and the list of refs-->

    <div class="tit-le">
        <h1>List of Referrals</h1>
        <p>Use your link to invite many of your friends</p>
        <p></p>
    </div>
    <div class="mag-x">

        <!-- the list of refs  -->
        <section class="lst-ref">
        <div class="tabh">
            <h1>Firstname</h1>
            <h2>Lastname</h2>
        </div>

        <div class="nm-spcs">
          @if($users->isEmpty())
              <p style='margin:20px auto;text-align:center'>No users referred yet</p>
             @else
           @foreach($users as $key => $user)
            <div class="spcs">
                <p>{{ $user->first_name}} </p>
                    <p>{{ $user->last_name}}</p>
            </div>
          @endforeach
          @endif

        </div>
    </section>

    <section class="lr-lnk">
                <div class="rl-in">
                     <p>Use your link to invite many of your friends</p>
                </div>
    
                <div class="reff">
                <input type="text" value="https://connectinskillz.com/waitlist/{{ Auth::user()->referral_id }}" id="cptxt">
                <button onclick={copies()}>
                  <img src="{{asset('forgotpass/w-icon/cpy.svg')}}" class="cpy">
                   </button>
                <p id="dipp" class="dipp"></p>
            	</div>
                
    </section>
    </div>
    <script src="{{asset('forgotpass/func.js')}}"></script>
 
</body>
</html>