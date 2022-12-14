@include('auth.default')
<div class="login-page vh-100">
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="col-md-6">
            <div class="col-10 mx-auto card p-3">
                <h3 class="text-dark my-0 mb-3">{{trans('lang.login')}}</h3>
                <p class="text-50">{{trans('lang.sign_in_to_continue')}}</p>
                <form class="mt-3 mb-4" action="#" onsubmit="return loginClick()">
                    <div class="form-group">
                        <label for="email" class="text-dark">{{trans('lang.email')}}</label>
                        <input type="email" placeholder="Enter Email" class="form-control" id="email"
                               aria-describedby="emailHelp" name="email">
                        <div id="emil_required"></div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-dark">{{trans('lang.password')}}</label>
                        <input type="password" placeholder="Enter Password" class="form-control" id="password"
                               name="password">
                        <div class="error" id="password_required"></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block"
                            id="login_btn">{{trans('lang.sign_in')}}</button>
                    <a href="{{route('signup')}}" class="btn btn-primary btn-lg btn-block">{{trans('lang.sign_up')}}</a>
                    <!-- <div class="py-2">
                      <button class="btn btn-lg btn-facebook btn-block"><i class="feather-facebook"></i> Connect with Facebook</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-firestore.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-storage.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
<!-- <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-messaging.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>


<script type="text/javascript">@include('vendor.init_firebase')</script>


<script type="text/javascript">

    var database = firebase.firestore();
    /*var messaging=firebase.messaging();*/

    var currentToken = '';
    /*messaging.requestPermission()
           .then(function(){
               console.log("GRANTED");
               console.log(messaging.getToken());
               return messaging.getToken();
           })
           .then(function(token){

               currentToken=token;
               console.log(currentToken);
               console.log("currentToken");
           })
           .catch(function(err){
               console.log('Error Occurred.' + err)
           });*/


    /*messaging.requestPermission().then(function(){
         console.log("GRANTED");
         currentToken=messaging.getToken();
   }).then(function(token){
       console.log(token);
   }).catch(function(err){
       console.log('Error Occurred.' + err)
   });*/



    //$(".login_btn").click(async function(){

    function loginClick() {

        var email = $("#email").val();

        var password = $("#password").val();


        firebase.auth().signInWithEmailAndPassword(email, password).then(function (result) {

            var userEmail = result.user.email;

            database.collection("users").where("email", "==", userEmail).get().then(async function (snapshots) {
                var userData = snapshots.docs[0].data();
                if (userData.role == "customer") {

                    if (userData.active == false) {

                        $("#password_required").html("<?php echo trans('lang.login_error_deactivate'); ?>");
                        return false;
                    }
                    var userToken = result.user.getIdToken();
                    var uid = result.user.uid;
                    var user = userData.id;
                    var firstName = userData.firstName;
                    var lastName = userData.lastName;
                    var imageURL = userData.profilePictureURL;
                    var url = "{{route('setToken')}}";
                    /*database.collection('users').doc(uid).update({'fcmToken':currentToken}).then(function(result) {*/
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {
                            id: uid,
                            userId: user,
                            email: email,
                            password: password,
                            firstName: firstName,
                            lastName: lastName,
                            profilePicture: imageURL
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            if (data.access) {
                                window.location = "{{url('/')}}";
                            }
                        }

                        /* }) */

                    });

                    /*})
                    .then(function(token){
                        console.log(token);
                    })
                    .catch(function(err){
                        console.log('Error Occurred.' + err);
                    });*/


                } else {

                    $("#password_required").html("<?php echo trans('lang.login_error_notfound'); ?>");
                    return false;

                }

            })


        })

            .catch(function (error) {

                $("#password_required").html(error.message);

            });

        return false;

    }


</script>