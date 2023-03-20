

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="stylesheet" href="<?= ASSETS ?>admin/assets/css/login.css">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="<?= ASSETS ?>admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>


<div id="particles-js"></div>
<div class="login-wrap">
    <div class="login-html">
        <a href="<?= ROOT ?>user_home" class="title_form">
            <p><?= WEBSITE_TITLE ?></p>
        </a>
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Đăng nhập</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Đăng ký</label>
        <div class="login-form">
            <form autocomplete="off" method="post" enctype="multipart/form-data" action="<?= BASE_URL ?>/login/authentication">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Tên tài khoản</label>
                        <input id="user" name="username" type="text" class="input" required>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Mật khẩu</label>
                        <input id="pass" name="password" type="password" class="input" data-type="password" required>
                    </div>
                    <!-- <div class="group">
						<input id="check" type="checkbox" class="check" checked>
						<label for="check"><span class="icon"></span> Keep me Signed in</label>
					</div> -->
                    <div class="group" style="margin-top: 35px;">
                        <input type="submit" name="login" class="button" value="Đăng nhập">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a class="foot-a"><label for="tab-2">Chưa có tài khoản? Đăng ký</label></a>
                    </div>
                </div>
            </form>
            <form autocomplete="off" method="post" enctype="multipart/form-data">
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">Tên tài khoản</label>
                        <input id="user" name="taikhoan" type="text" class="input" required>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Mật khẩu</label>
                        <input id="pass" name="matkhau" type="password" class="input" data-type="password" required>
                    </div>
                    <div class="group">
                        <label for="ht" class="label">Họ tên</label>
                        <input id="ht" name="hoten" type="text" class="input" required>
                    </div>
                    <div class="group">
                        <label for="sdt" class="label">Số điện thoại</label>
                        <input id="sdt" name="sdt" type="text" class="input" required>
                    </div>
                    <div class="group">
                        <label for="email" class="label">Email</label>
                        <input id="email" name="email" type="email" class="input" required>
                    </div>

                    <div class="group" style="margin-top: 35px;">
                        <input type="submit" name="dangky" class="button" value="Sign Up">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a class="foot-a"><label for="tab-1">Đã có tài khoản? Đăng nhập</label></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="clearfix">
        <div></div>
        <div></div>
    </div>
</div>

<script src="<?= ASSETS ?>user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    // document.body.style.background = "url('https://loremflickr.com/"+window.screen.width+"/"+window.screen.height+"/fields') no-repeat center";
    /* ---- particles.js config ---- */

    particlesJS("particles-js", {
        "particles": {
            "number": {
                "value": 50,
                "density": {
                    "enable": true,
                    "value_area": 1000
                }
            },
            "color": {
                "value": ["#00ff3c", "#00ffa6"]
            },
            "shape": {
                "type": "edge",
                "stroke": {
                    "width": 0,
                    "color": "#3c00ff"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                }
            },
            "opacity": {
                "value": 0.7,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 4,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 50,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 80,
                "color": "#a1ffc8",
                "opacity": 0.5,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 3,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "retina_detect": true
    });
</script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</body>
</html>