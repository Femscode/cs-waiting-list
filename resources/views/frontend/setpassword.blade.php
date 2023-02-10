<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Setup</title>
    <link rel="stylesheet" href="{{ asset('assets/faq_style.css') }}" >
    <!-- font Family -->
	 <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="heading">
        <a href='/waitlist'><img src="{{ asset('assets/w-icon/connectskillz 1.svg') }}" alt="logo" class="logo1"></a>
      <a href='/waitlist'><img src="{{ asset('assets/w-icon/Vector.svg') }}" alt=""></a>
    </div>
    <section class="sign-in">
        <div class="set-up">
            <div class="inf">
                <h1>Set up your account</h1>
                <p>You will get a firsthand access to the platform once it is launched.</p>
            </div>
            <form action="" id='set_password' class="sp-entries">
               <input type="hidden" class="form-control" id="first_name" value="{{ $user->first_name }}">
                        <input type="hidden" class="form-control" id="referred_by" value="{{ $user->referred_by }}">
                        <input type="hidden" class="form-control" id="last_name" value="{{ $user->last_name }}">
                        <input type="hidden" class="form-control" id="email" value="{{ $user->email }}">
                <div class="pass-case">
                    <input type="password" id='password' placeholder="Password" name="view" >
                    <img id='pass_eye' src="{{ asset('assets/w-icon/view.svg') }}" alt="viewit">
                </div>
                <div class="pass-case">
                    <input type="password" id='password_confirmation' placeholder="Confirm Password" >
                    <img id='conf_pass_eye' src="{{ asset('assets/w-icon/view.svg') }}" alt="viewit">
                </div>
               
                <button type='submit' class="reg-btn">Update</button>

            </form>
        </div>
    </section>
  
<script src="{{asset('cdn/jquery-3.6.0.js')}}" ></script>
<script src="{{asset('/cdn/sweetalert.min.js')}}" ></script>
    <script>
        $(document).ready(function() {
         
           
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#pass_eye").click(function() {
           
            var inputType = $("#password").attr("type");
                if (inputType === "text") {
                    $("#password").attr("type", "password");
                } else {
                    $("#password").attr("type", "text");
                }
        })
        $("#conf_pass_eye").click(function() {
           
            var inputType = $("#password_confirmation").attr("type");
                if (inputType === "text") {
                    $("#password_confirmation").attr("type", "password");
                } else {
                    $("#password_confirmation").attr("type", "text");
                }
        })
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
	                type:"success",
                    showConfirmButton: false,
	                timer:1000
                    });
                        window.location.replace("/login");
                    }
                    else {
                        Swal.fire('Incorrect Password!', 'The password must match, and must be of a minimum length of 5 characters with at least one special characters', 'error')
                    
                    }
                   
                    // window.location.reload()
                    
                },
                error: function(data) {
                    console.log(data)
                    Swal.close()
                    Swal.fire({
	                title:"Password set successfully!",
	                text:"Loading...",
	                type:"success",
                    showConfirmButton: false,
	                timer:1000
                    });
                        window.location.replace("/login");
                    // Swal.fire('Incorrect Password!', 'The password must match, and must be of a minimum length of 5 characters with at least one special characters', 'error')
                    // window.location.reload()
                }
            })

        })

        })
    </script>

</body>
</html> 