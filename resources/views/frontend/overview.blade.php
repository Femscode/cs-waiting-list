<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="icon" type="image/x-icon" href="{{asset('forgotpass/images/connectskillz 1.svg')}}">
    <link rel="stylesheet" href="{{asset('forgotpass/overview_style.css')}}">
        <!-- font Family -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
                    <li class="dg-a"> <a href="/waitlist/dashboard">Overview</a> </li>
                    <li class="dg-b"> <a href="/waitlist/refer_friend">Refer a Friend</a></li>
                    <li class="dg-c"><a href="/waitlist/logout">Logout</a></li>
                </ul>
            </div>
            
        </nav>
    </header>
        <section class="veiw-box">
            <div class="o-l-c">
                <div class="o-h">
                    People on the waitlist
                </div>
                <div class="o-w-l">
                    <div class="o-l-h">
                        <div>Position</div>
                        <div>First Name</div>
                        <div>Last Name</div>
                    </div>
                    @foreach($allusers as $key => $user)
                    <div class="o-l-h" style='background-color:#004bad1d;color:black'>
                        <div>{{ ++$key }}</div>
                        <div>{{ substr($user->first_name, 0, 1) }}{{ str_replace($user->first_name, "*******", $user->first_name)}}</div>
                        <div> {{ substr($user->last_name, 0, 1) }}{{ str_replace($user->last_name, "*******", $user->last_name)}}</div>
                    </div>
                    @endforeach
                
    
                    <div class="pagination">
                        {{ $allusers->links('pagination::bootstrap-4') }}
                    </div>
                   
                 
                    </div>
                </div>
               
        </section>
        <script src="{{asset('forgotpass/overview.js')}}"></script>

</body>
</html>