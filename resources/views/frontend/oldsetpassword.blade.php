<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Password</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css')}}" media="screen">
    <!-- font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
   
    <div class="mainspace">
        
        <div class="poss">
            <img src="{{ asset('assets/w-icon/connectskillz 1.svg')}}" alt="" class="logo-lg"/>
            <div class="login-1">
            
                <div class="log_case">
    <!-- the header for the form -->
                    <div class="log-ctnt">
                        <h1>SETUP YOUR PASSWORD</h1>
                        <p>Stay updated and learn continuously</p>
                    </div>
     <!-- the login form -->
                    <form action="" id='set_password' class="lg-form">
                        
                        <input type="hidden" class="form-control" id="first_name" value="{{ $user->first_name }}">
                        <input type="hidden" class="form-control" id="referred_by" value="{{ $user->referred_by }}">
                        <input type="hidden" class="form-control" id="last_name" value="{{ $user->last_name }}">
                        <input type="hidden" class="form-control" id="email" value="{{ $user->email }}">
                        <div class="pass-log">
                            <input type="password" id='password' placeholder="New Password"/>
                        </div>
                        <div class="pass-log">
                            <input type="password" id='password_confirmation' placeholder="Confirm Password" name="view" />
                            <img src="{{ asset('assets/w-icon/view.svg')}}" alt="viewit"/>
                        </div>
                        <button class="login-btn">SET PASSWORD</button>
                    </form>
                </div>
            </div>
    
        </div>
    
        <div class="banner1">
            <a href="assets/Dashboard.html"></a>
            
        </div>
    </div>
</body>

<script src="{{asset('cdn/jquery-3.6.0.js')}}" ></script>
<script src="{{asset('/cdn/sweetalert.min.js')}}" ></script>
    <script>
        $(document).ready(function() {
         
           
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $("#set_password").on("submit", async function(e) {
            
            e.preventDefault();
            var fd = new FormData;
            fd.append('first_name', $("#first_name").val());
            fd.append('last_name', $("#last_name").val());
            fd.append('email', $("#email").val());
            fd.append('referred_by', $("#referred_by").val());
            fd.append('password', $("#password").val());
            fd.append('password_confirmation', $("#password_confirmation").val());
           
          
            console.log(fd,'the alaye')
            $.ajax({
                type: 'POST',
                url: "{{route('register')}}",
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    // window.location.reload()
                    console.log(data)
                    if(data == true) {
                        Swal.fire({
	                title:"Password set successfully!",
	                text:"Loading...",
	                type: "success",
                    showConfirmButton: false,
	                timer:1000
                    });
                        window.location.replace("/dev/login");
                    }
                    else {
                        Swal.fire('Incorrect Password!', 'The password must match, and must be of a minimum length of 5 characters with at least one special characters', 'error')
                    
                    }
                   
                    // window.location.reload()
                    
                },
                error: function(data) {
                    console.log(data)
                    Swal.close()
                    Swal.fire('Incorrect Password!', 'The password must match, and must be of a minimum length of 5 characters with at least one special characters', 'error')
                    // window.location.reload()
                }
            })

        })

        })
    </script>


</html>