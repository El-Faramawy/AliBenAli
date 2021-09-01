<script src="{{url('site')}}/js/jquery-3.4.1.min.js"></script>
<script src="{{url('site')}}/js/popper.min.js"></script>
<script src="{{url('site')}}/js/bootstrap.min.js"></script>
<script src="{{url('site')}}/js/mdb.min.js"></script>
<script src="{{url('site')}}/js/smooth-scroll.min.js"></script>
<script src="{{url('site')}}/js/swiper.js"></script>
<script src="{{url('site')}}/js/aos.js"></script>
<script src="{{url('site')}}/js/dropify.min.js"></script>
<script src="{{url('site')}}/js/jquery.appear.min.js"></script>
<script src="{{url('site')}}/js/odometer.min.js"></script>
<script src="{{url('site')}}/js/jquery.fancybox.min.js"></script>
<!-- venobox js -->
<script src="{{url('site')}}/js/venobox.min.js"></script>
<script src="{{url('site')}}/js/select2.js"></script>
<script src="{{url('site')}}/js/fontawesome-pro.js"></script>
<script src="{{url('site')}}/js/stars.js"></script>
<script src="{{url('site')}}/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js"></script>
<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        slidesPerView: 'auto',
        // spaceBetween: 10,
        speed: 1500,
        loop: true,
        freeMode: true,
        loopedSlides: 5, //looped slides should be the same
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
        loop: true,
        effect: 'fade',
        keyboard: {
            enabled: true,
        },
        speed: 1500,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        loopedSlides: 5, //looped slides should be the same
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs,
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'progressbar',
        },
    });
</script>
<script>
    /* 14. VENOBOX JS */
    $('.venobox').venobox({
        numeratio: true,
        titleattr: 'data-title',
        spinner: 'cube-grid',
        spinColor: '#fff'
    });
</script>

{{--===================================  headers  ==================================--}}
<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
        }
    });
</script>
<script>
    jQuery('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
</script>
@stack('site_js')


{{--===================  toster ==============================--}}
<script src="{{url('admin/js')}}/tostar.js"></script>

<script>

    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch(type){
        case 'info':

            toastr.options.timeOut = 10000;
            toastr.info("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();
            break;
        case 'success':

            toastr.options.timeOut = 10000;
            toastr.success("{{Session::get('message')}}");
            var audio = new Audio('music/Success 12.mp3');
            audio.play();

            break;
        case 'warning':

            toastr.options.timeOut = 10000;
            toastr.warning("{{Session::get('message')}}");
            var audio = new Audio('music/error2.mp3');
            audio.play();

            break;
        case 'error':

            toastr.options.timeOut = 10000;
            toastr.error("{{Session::get('message')}}");
            var audio = new Audio('audio.mp3');
            audio.play();

            break;
    }
    @endif
</script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach((form) => {
            form.addEventListener('submit', (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>

{{--==============================  Firebase  =====================================--}}
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyD6Y7iLV5_bmIoy3YxdQ-9IfV0lznr55c4",
        authDomain: "alibenali-aaecf.firebaseapp.com",
        databaseURL: "https://test-e434b.firebaseapp.com",
        projectId: "alibenali-aaecf",
        storageBucket: "alibenali-aaecf.appspot.com",
        messagingSenderId: "438656771040",
        appId: "1:438656771040:web:a7fab233dc428ca6874185",
        measurementId: "G-9KVH50VT9Y"
    };

    firebase.initializeApp(firebaseConfig);
</script>

<script type="text/javascript">
    window.onload=function () {
        render();
    };

    function render() {
        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }

    function phoneSendAuth() {

        var number = '+'+$("#phone_code").val()+$("#phone").val();
        // alert(number)

        firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {

            window.confirmationResult=confirmationResult;
            coderesult=confirmationResult;

        }).catch(function (error) {
        });

    }
</script>





