<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS / LINK -->
    <?php include "../../assets/link/link.html"; ?>
    <link href="../../assets/css/main.css" rel="stylesheet">
    <link href="../../assets/css/forgotPassword.css" rel="stylesheet">
    <script src="../../assets/js/gsap.js"></script>

    <title>CAPITAL 2024 | FORGOT PASSWORD</title>

</head>

<body>
    <!-- Loader -->
    <div class="loader-container" style="display: none;">
        <div class="loader">
            <svg version="1.1" id="loading_svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="72px" height="40px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
                </rect>
                <rect x="8" y="10" width="4" height="10" fill="#333" opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                </rect>
                <rect x="16" y="10" width="4" height="10" fill="#333" opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                </rect>
            </svg>
        </div>
    </div>
    <div class="container">
        <div class="content">
            <div class="text">
                Change Password
            </div>
            <form id="formChangePass" class="formChangePass p-3">
                <div class="field modal-body my-4">
                    <input type="text" required name="email" id="email" class="input" required>
                    <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path class="" data-original="#000000" fill="#595959" d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z"></path>
                            </g>
                        </svg></span>
                    <label class="label">E-mail</label>
                </div>
                <div class="modal-footer mt-4 pt-4" style="justify-content:space-between;">
                    <div class="back-wrapper">
                        <button type="button" onclick="window.location.href='login.php'" class="btn btn-secondary back">Back</button>
                    </div>

                    <div class="modal-footer1">
                        <div class="input-wrapper">
                            <div class="button">
                                <button type="submit" name="type" onclick="getOTP()" value="getOTP" class="btn"><span>Send OTP
                                    </span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function testJSON(text) {
            if (typeof text !== "string") {
                return false;
            }
            try {
                JSON.parse(text);
                return true;
            } catch (error) {
                return false;
            }
        }
        $(document).ready(function() {
            $('#changePassModal').modal('show');
            $('#formChangePass').on('submit', function(e) {
                e.preventDefault();

            })
        })
        var vemail;

        function getOTP() {
            $(".loader-container").css("display", "flex");
            vemail = $('input#email').val()
            $.ajax({
                type: "POST",
                url: "otp.php",
                data: {
                    type: 'getOTP',
                    email: vemail,
                },
                success: function(response) {
                    $(".loader-container").css("display", "none");
                    if (testJSON(response)) {
                        response = JSON.parse(response)
                        if (response[0] == 'gagal') {
                            Swal.fire(
                                'Gagal!',
                                response[1],
                                'error'
                            )
                            $('button[value="getOTP"]').prop('disabled', false);
                        }
                    } else {
                        if (response == 'success') {
                            Swal.fire(
                                'OTP Sent!',
                                'Check your inbox.',
                                'success'
                            )
                            $('.modal-footer1').html('<div class="resend" style="font-weight: bold;cursor:pointer;margin-left:10px;" onclick="resendOTP()"> Resend OTP</div><div>')
                            $('.modal-body').html(`
                                <input name="otp" id="otpveri" type="text" onkeyup="typeOTP()" required class="input">
                                <span class="span"><i class="fa-solid fa-key fa-lg" style="color: #4b336b;"></i></span>
                                <label class="label">6 Digit OTP</label>
                            `)

                            $('.back').attr('onclick', 'window.location.href="login.php"')
                            v_email = vemail
                        } else if (response == 'tdkterdaftar') {
                            Swal.fire(
                                'Error!',
                                'Email belum terdaftar!',
                                'error'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'forgotPassword.php'
                                }
                            })

                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan, silahkan coba beberapa saat lagi.',
                                'error'
                            )
                        }
                    }

                }
            });

        }

        function typeOTP() {
            var inputOTP = $('#otpveri').val()
            if (inputOTP.length == 6) {
                $('.modal-footer1').html(`<div class="input-wrapper"><button class="btn" type="submit" onclick="verifyOTP('` + inputOTP + `')">Verify OTP</button></div>`)
            } else {
                $('.modal-footer1').html('<div style="font-weight: bold;cursor:pointer;margin-left:10px;" onclick="resendOTP()"> Resend OTP</div><div>')
            }
        }

        function resendOTP() {
            $(".loader-container").css("display", "flex");
            $.ajax({
                type: "POST",
                url: "otp.php",
                data: {
                    type: 'getOTP',
                    email: vemail
                },
                success: function(response) {
                    $(".loader-container").css("display", "none");
                    if (response == 'success') {
                        Swal.fire(
                            'New OTP Sent!',
                            'Check your inbox.',
                            'success'
                        )

                    } else {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan.',
                            'error'
                        )
                    }
                }
            });
        }

        function verifyOTP(otpinput) {
            otpinput = parseInt(otpinput)
            $.ajax({
                type: "POST",
                url: "otp.php",
                data: {
                    type: 'verifyOTP',
                    thisdata: otpinput,
                },
                success: function(response) {
                    if (response == 'success') {
                        $('.content').attr('style', 'height : 400px; position: relative; width: auto; padding: 40px;');
                        $('.modal-footer').attr('style', 'bottom: 50px; position: absolute; justify-content:space-between; gap: 10px;');
                        $('.modal-body').html(`
                            <div>
                                <div class="input-wrapper">
                                    <span class="span"><i class="fa-solid fa-lock fa-lg" style="color: #4b336b;"></i></span>
                                    <input name="password" id="newPassword" type="password" placeholder="New Password" onkeyup="cekPanjang()" required class="input" style="height: 50px;">
                                    <div id="emailHelp" class="form-text text-danger minlength">New password minimal length : 8</div>
                                </div>
                                <div class="input-wrapper my-3">
                                    <span class="span"><i class="fa-solid fa-lock fa-lg" style="color: #4b336b;"></i></span>
                                    <input name="retypePass" id="retypePass" type="password" placeholder="Retype New Password" onkeyup="cekMatch()" required class="input" style="height: 50px;">
                                    <div id="emailHelp" class="form-text text-danger notmatch" style="display:none">Password not match</div>
                                </div>
                            </div>
                        `)
                        $('.modal-footer1').html(`<div class="input-wrapper"><button type="submit" class="btn changePassButton" onclick="submitNewPass()" disabled>Change Password</button></div>`);
                    } else {
                        Swal.fire(
                            'Error!',
                            'Wrong OTP',
                            'error'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'forgotPassword.php'
                            }
                        })


                    }
                }
            });
        }
        var pass8 = false

        function cekPanjang() {
            var newPass = $("#newPassword").val()
            if (newPass.length >= 8) {
                $('.minlength').css('display', 'none')
                pass8 = true
            } else {
                $('.minlength').css('display', 'block')
                pass8 = false
            }
            cekMatch()
        }

        function cekMatch() {
            if (pass8 == true) {
                var newPass = $("#newPassword").val()
                var retypePass = $("#retypePass").val()
                if (newPass == retypePass) {
                    $('.changePassButton').prop('disabled', false)
                    $('.notmatch').css('display', 'none')
                } else {
                    $('.notmatch').css('display', 'block')
                    $('.changePassButton').prop('disabled', true)
                }

            } else {
                $('.notmatch').css('display', 'none')
            }
        }

        function submitNewPass() {
            var newPass = $("#newPassword").val()
            $.ajax({
                type: "POST",
                url: "otp.php",
                data: {
                    type: 'newPass',
                    pass: newPass
                },
                success: function(response) {
                    if (response == 'success') {
                        Swal.fire(
                            'Success!',
                            'Password Changed',
                            'success'
                        ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                window.location.href = 'login.php'
                            }
                        })
                    } else {
                        Swal.fire(
                            'Error!',
                            'Something went wrong, please try again later',
                            'error'
                        )
                    }
                }
            });
        }
    </script>
</body>

</html>