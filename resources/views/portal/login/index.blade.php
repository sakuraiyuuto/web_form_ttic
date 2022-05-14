<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link href="{{ url('/template/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- icheck bootstrap -->
    <link href="{{ url('/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet">
    <!-- Theme style -->
    <link href="{{ url('/template/dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ url('/images/logo_untan.ico') }}" rel="shortcut icon" type="image/vnd.microsoft.icon" />
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-warning">
            <div class="card-header text-center">
                <div class="h1"><b>Web Formulir</b> TTIC</div>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login menggunakan akun google anda sebelum mengisi formulir.</p>

                <div class="social-auth-links text-center mt-2 mb-3">
                    <button class="btn btn-block btn-primary w-lg waves-effect waves-light" type="button"
                        onclick="logingoogle()" id="google" name="google"><i class="fab fa-google mr-2"></i> Login
                        menggunakan Google</button>
                </div>
                <!-- /.social-auth-links -->

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-auth.js"></script>

    <script>
        // Your web app's Firebase configuration

        var firebaseConfig = {
            apiKey: "AIzaSyAW1bgJaX_7CTO9he3ejMyHSpEoI6E8D9s",
            authDomain: "bujang-kurir.firebaseapp.com",
            databaseURL: "https://bujang-kurir.firebaseio.com",
            projectId: "bujang-kurir",
            storageBucket: "bujang-kurir.appspot.com",
            messagingSenderId: "611051476507",
            appId: "1:611051476507:web:70bbb981fac3781e6dcabe"
        };

        // Initialize Firebase

        firebase.initializeApp(firebaseConfig);
        var provider = new firebase.auth.GoogleAuthProvider();
        //provider.addScope('https://www.googleapis.com/auth/contacts.readonly');

        firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
                // User is signed in.
                var displayName = user.displayName;
                var email = user.email;
                var emailVerified = user.emailVerified;
                var photoURL = user.photoURL;
                var isAnonymous = user.isAnonymous;
                var uid = user.uid;
                var providerData = user.providerData;
                $(".user-auth-img").attr("src", photoURL);
                //alert(displayName);
                auth(user);
                // ...
                $(".login").show();
                $(".nonlogin").hide();
            } else {
                // User is signed out.
                // ...
                $(".login").hide();
                $(".nonlogin").show();
            }
            firebase.auth().currentUser.getIdToken( /* forceRefresh */ true).then(function(idToken) {
                $('.tauth').val(idToken);
                //countkeranjang(idToken);
            }).catch(function(error) {
                // Handle error
            });
        });

        Notification.requestPermission().then((permission) => {

            if (permission === 'granted') {
                console.log('Notification permission granted.');
                // TODO(developer): Retrieve an Instance ID token for use with FCM.
                // ...
            } else {
                console.log('Unable to get permission to notify.');
            }
        });

        const messaging = firebase.messaging();
        messaging.getToken().then((currentToken) => {

            if (currentToken) {
                sendTokenToServer(currentToken);
                //updateUIForPushEnabled(currentToken);
            } else {
                // Show permission request.
                console.log('No Instance ID token available. Request permission to generate one.');
                // Show permission UI.
                //updateUIForPushPermissionRequired();
                //setTokenSentToServer(false);
            }
        }).catch((err) => {
            console.log('An error occurred while retrieving token. ', err);
            //setTokenSentToServer(false);

        });


        function sendTokenToServer(currentToken) {

            save_method = 'update';
            //Ajax Load data from ajax

            //alert(currentToken);
            $.ajax({
                url: "<?php url('login/authentication'); ?>",
                type: "POST",
                data: {
                    curr_token: currentToken
                },
                dataType: "JSON",
                success: function(data) {},

                error: function(jqXHR, textStatus, errorThrown) {}
            });
        }

        function logingoogle() {
            firebase.auth().signInWithPopup(provider).then(function(result) {
                // This gives you a Google Access Token. You can use it to access the Google API.
                var token = result.credential.accessToken;
                // The signed-in user info.
                var user = result.user;
                // ...

            }).catch(function(error) {
                // Handle Errors here.
                var errorCode = error.code;
                var errorMessage = error.message;
                alert(errorMessage);
                // The email of the user's account used.
                var email = error.email;
                // The firebase.auth.AuthCredential type that was used.
                var credential = error.credential;
                // ...
            });
        }

        function auth(user) {
            $('#google').html("Tunggu Sebentar ...");
            firebase.auth().currentUser.getIdToken( /* forceRefresh */ true).then(function(idToken) {
                $.post("{{ url('login/authentication') }}", {
                        "_token": "{{ csrf_token() }}",
                        'displayName': user.displayName,
                        'email': user.email,
                        'emailVerified': user.emailVerified,
                        'photoURL': user.photoURL,
                        'isAnonymous': user.isAnonymous,
                        'uid': user.uid,
                        'providerData': 'Google',
                        'tauth': idToken
                    },
                    function(data, status) {
                        $(location).attr('href', "{{ url('/pemesanan') }}");
                        $('#google').html("Masuk Dengan Google");
                    }, 'json'); //
            }).catch(function(error) {
                // Handle error
            });

        }
    </script>
</body>

</html>
