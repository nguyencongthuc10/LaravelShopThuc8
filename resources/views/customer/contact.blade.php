@extends('index')
@section('noidung')
<div class="lienhe">
    <div class="container">
        <div class="tittle">
            <h2>LIÊN HỆ</h2>
        </div>

        <div id="divContent" class="contact-info">
            <div class="box-border text-center">
                <div class="box-title">
                    THUCSHOP<br>
                    &nbsp;
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>Địa chỉ:</strong> Số 15, Đường 18, P.Lnh Đông TP.Thủ Đức
                        </div>

                        <div class="col-sm-4">
                            <strong>ĐT:</strong> 034.998.3657
                        </div>
                        <div class="col-sm-4">
                            <strong>Email:</strong> <a
                                href="mailto:nguyencongthuc10@gmail.com">nguyencongthuc10@gmail.com</a>
                        </div>
                    </div>
                </div>


            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="lienhe-tt">
                    <h2 class="contact-cv">Liên hệ với chúng tôi</h2>
                </div>
                <div class="contact-all">
                    <div class="contact-phone">

                        <p class="phone-1"><a href="">
                                <img class="phone-number"
                                    src="https://delco-construction.com/wp-content/uploads/2019/10/Phone-blue.png">
                                +84349983657</a>

                        <p class="phone-1"><a href=""><img class="alignleft"
                                    src="https://delco-construction.com/wp-content/uploads/2019/10/Mail-blue.png">
                                nguyencongthuc10@gmail.com</a></p>

                        <p><img class="alignleft"
                                src="https://delco-construction.com/wp-content/uploads/2019/10/Location-blue.png"> Số
                            15, Đường 18, P.Lnh Đông TP.Thủ Đức</p>

                        <p class="phone-1">
                            <a href="https://line.me/R/ti/p/WN9XJ37aOc">
                                <img class="phone-2"
                                    src="https://delco-construction.com/wp-content/uploads/2020/12/qr-code-line.png">
                            </a>

                            <a href="">
                                <img class="phone-2"
                                    src="https://delco-construction.com/wp-content/uploads/2020/12/qr-code-zalo.jpg">
                            </a>
                            <img class="phone-2" src="https://delco-construction.com/qr-code-mini-wechat/">
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="contact-infomation">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Họ và Tên*</label><br>
                                    <span>
                                        <input type="text" class="form-control" id="firstname" name="firstname">
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Công ty*</label><br>
                                    <input type="text" class="form-control" id="firstname" name="firstname">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email*</label><br>
                                    <span>
                                        <input type="text" class="form-control" id="firstname" name="firstname">

                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Điện thoại*</label><br>
                                    <span><input type="text" class="form-control" id="firstname"
                                            name="firstname"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nhập nội dung</label>
                            <textarea type="text" rows="8" id="verify_plan" name="verify_plan"
                                class="form-control"> </textarea>
                        </div>

                    </div>
                    <td><input type="submit" value="Gửi" class="tt-submit" aria-invalid="false"><span
                            class="ajax-loader"></span></td>

                </div>

            </div>

        </div>
    </div>
</div>

<div class="bando">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.5806809347882!2d106.74305641462313!3d10.843366692276085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527c7a384fe81%3A0xf3e301b5b6008e59!2zU-G7kSAxNSwgMTggxJAuIExpbmggxJDDtG5nLCBMaW5oIMSQw7RuZywgVGjhu6cgxJDhu6ljLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2shk!4v1625920652239!5m2!1svi!2shk"
        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

</div>
@endsection