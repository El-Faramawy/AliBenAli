<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ url('/')}}/admin/css/bootstrap-rtl.css">

<style>
    *{
        font-family: 'Cairo', sans-serif;
        font-size: 16px;
        margin: 0 !important;
        color: grey;
    }

    /*======================
        404 page
    =======================*/


    .page_404{ padding:40px 0; background:#fff; font-family: 'Arvo', serif;
    }

    .page_404  img{ width:100%;}

    .four_zero_four_bg{

        background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
        height:100%;
        background-position: center;
    }


    .four_zero_four_bg h1{
        font-size:60px;
    }

    .four_zero_four_bg h3{
        font-size:80px;
    }

    .link_404{
        color: #fff!important;
        padding: 10px 20px;
        background: #39ac31;
        margin: auto;
        display: inline-block;}
</style>
<section class="page_404">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="text-center" style="margin-top: 10% !important">
                    <div class="four_zero_four_bg">
                        <h1 class="text-center">خطأ 404</h1>


                    </div>

                    <div class="contant_box_404">
                        <h3 class="h2">
                            يبدو انك ادخلك رابط غير موجود
                        </h3>

                        <p style="margin: 10px !important;">الصفحة غير موجودة !</p>

                        <a href="{{url()->previous()}}" class="link_404">العودة</a>
                    </div>
                </div>
            </div>
        </div>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
