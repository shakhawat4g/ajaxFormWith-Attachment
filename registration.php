<div id="page_id_<?php echo $id; ?>">

    <?php if ($thumb): ?>
        <div class="page-banner">
            <img src="<?php echo $thumb; ?>" class="img-fluid d-none d-sm-none d-md-block">
            <img src="<?php echo $thumb_mobile; ?>" class="img-fluid d-block d-sm-block d-md-none">
            <div class="container-fluid padding">
                <div class="banner-text">
                    <h1 class="title font-light"><?= $title; ?></h1>
                    <?php echo $banner_text; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <section class="registration-one" data-aos="fade-up">
        <div class="page-banner mb-5">
            <img src="layouts/frontend/atlantic_payroll/assets/img/register-banner.jpg" alt="" class="img-fluid img-full">
        </div>
        <div class="container">
        <h1 class="d-none">Register</h1>
        <div class="reg-form p-4 mb-5">
            <h3>Personal details</h3>
            <form name="registration" class="form-horizontal" id="registration_form" method="post" onsubmit="return registrationForm(event);" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="name">Forename:</label>
                        <input type="text" class="form-control" name="registration[name]" id="name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="surname">Surname:</label>
                        <input type="text" class="form-control" name="registration[surname]" id="surname">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="registration[email]" id="email">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" name="registration[phone]" id="phone">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="registration[address]" id="address">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="postcode">Postcode:</label>
                        <input type="text" class="form-control" name="registration[postcode]" id="postcode">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="text" class="form-control js_datepicker" name="registration[date_of_birth]" id="date_of_birth">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nationality">Nationality:</label>
                        <input type="text" class="form-control" name="registration[nationality]" id="nationality">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="emergency_contact_name">Emergency Contact Name:</label>
                        <input type="text" class="form-control" name="registration[emergency_contact_name]" id="emergency_contact_name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="emergency_contact_number">Emergency Contact Number:</label>
                        <input type="text" class="form-control" name="registration[emergency_contact_number]" id="emergency_contact_number">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="national_insurance_number">National Insurance Number:</label>
                        <input type="text" class="form-control" name="registration[national_insurance_number]" id="national_insurance_number">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="utr_number">UTR Number:</label>
                        <input type="text" class="form-control" name="registration[utr_number]" id="utr_number">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name_of_bank">Name of Bank:</label>
                        <input type="text" class="form-control" name="registration[name_of_bank]" id="name_of_bank">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="account_holder_name">Name of Account Holder:</label>
                        <input type="text" class="form-control" name="registration[account_holder_name]" id="account_holder_name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="account_number">Account Number:</label>
                        <input type="text" class="form-control" name="registration[account_number]" id="account_number">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="sort_code">Account Sort Code:</label>
                        <input type="text" class="form-control" name="registration[sort_code]" id="sort_code">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formFile" class="form-label">Allow operative to upload documents</label>
                        <input class="form-control" type="file" name="file" id="formFile">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="agree">
                        <input type="checkbox" name="agree" id="agree" required> 
                        I consent for Atlantic Payroll Solutions to carry out additional checks on my right to work document, including contacting the Home Office via their online services or direct communications.</label>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="g-recaptcha" id="recaptcha"/>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-envelope-o"></i>
                            Submit
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        </div>
    </section>

</div>

<?php if (getSettingItem('RecaptchaStatusV3') == 'Enable'): ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo getSettingItem('RecaptchaSiteKeyV3') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setInterval(function () {
                grecaptcha.ready(function () {
                    grecaptcha.execute('<?php echo getSettingItem('RecaptchaSiteKeyV3') ?>', {action: 'submit'}).then(function (token) {
                        $('#recaptcha').val(token);
                    });
                });
            }, 5000);
        });
    </script>
<?php endif; ?>

<script type="text/javascript">

    $(".js_datepicker").flatpickr({
        maxDate: "today"
    });

    function registrationForm(e) {
        e.preventDefault();
        var error = 0;
        var formData = new FormData(document.getElementById("registration_form"));
        var name = jQuery('#name').val();
        var surname = jQuery('#surname').val();
        var email = jQuery('#email').val();
        var phone = jQuery('#phone').val();
        var postcode = jQuery('#postcode').val();
        var national_insurance_number = jQuery('#national_insurance_number').val();
        var utr_number = jQuery('#utr_number').val();
        var name_of_bank = jQuery('#name_of_bank').val();
        var account_holder_name = jQuery('#account_holder_name').val();
        var account_number = jQuery('#account_number').val();
        var sort_code = jQuery('#sort_code').val();
        var agree = jQuery('input[id=agree]:checked').val();

        // alert("Name must be filled out"+ name); 
        if (!name) {$('#name').addClass('required');error = 1;} else {$('#name').removeClass('required').addClass('required_pass');}
        if (!surname) {$('#surname').addClass('required');error = 1;} else {$('#surname').removeClass('required').addClass('required_pass');}
        if (!email) {$('#email').addClass('required');error = 1;} else {$('#email').removeClass('required').addClass('required_pass');}
        if (!phone) {$('#phone').addClass('required');error = 1;} else {$('#phone').removeClass('required').addClass('required_pass');}
        if (!postcode) {$('#postcode').addClass('required');error = 1;} else {$('#postcode').removeClass('required').addClass('required_pass');}
        if (!national_insurance_number) {$('#national_insurance_number').addClass('required');error = 1;} else {$('#national_insurance_number').removeClass('required').addClass('required_pass');}
        if (!utr_number) {$('#utr_number').addClass('required');error = 1;} else {$('#utr_number').removeClass('required').addClass('required_pass');}
        if (!name_of_bank) {$('#name_of_bank').addClass('required');error = 1;} else {$('#name_of_bank').removeClass('required').addClass('required_pass');}
        if (!account_holder_name) {$('#account_holder_name').addClass('required');error = 1;} else {$('#account_holder_name').removeClass('required').addClass('required_pass');}
        if (!account_number) {$('#account_number').addClass('required');error = 1;} else {$('#account_number').removeClass('required').addClass('required_pass');}
        if (!sort_code) {$('#sort_code').addClass('required');error = 1;} else {$('#sort_code').removeClass('required').addClass('required_pass');}
        if(!agree){
            alert('You must agree to the terms and conditions');
            return false;
        }

        // alert(name,surname,email,phone,postcode,national_insurance_number,utr_number,name_of_bank,account_holder_name,account_number,sort_code,agree);
        // alert(formData);

        if (error === 0) {
            $.ajax({
                url: '<?php echo site_url('site/registration'); ?>',
                type: 'POST',
                dataType: "json",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend () {
                    toastr.info('Sending...');
                },
                success (jsonRespond) {
                    if (jsonRespond.Status === 'OK') {
                        toastr.success(jsonRespond.Msg);
                        setTimeout(function () {
                            jQuery('#ajaxRespond').slideUp();
                            // jQuery('#contact_form')[0].reset();
                            jQuery('input, textarea').removeClass('required_pass');
                        }, 2000);
                    } else {
                        toastr.error(jsonRespond.Msg);
                    }
                }
            });
        }
    }
</script>