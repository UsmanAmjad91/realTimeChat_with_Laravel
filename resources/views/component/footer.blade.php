<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>
<script>
    function cc_format(value) {
        var v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
        var matches = v.match(/\d{4,16}/g);
        var match = matches && matches[0] || '';
        var parts = [];
        for (i = 0, len = match.length; i < len; i += 4) {
            parts.push(match.substring(i, i + 4))
        }
        console.log(parts.length);
        if (parts.length) {
            return parts.join(' ');
        } else {
            return value;
        }
    }

    onload = function() {
        document.getElementById('cc').oninput = function() {
            this.value = cc_format(this.value);
        }
    }

    function checkDigit(event) {
        var code = (event.which) ? event.which : event.keyCode;
        if ((code < 48 || code > 57) && (code > 31)) {
            return false;
        }
        return true;
    }
</script>
<script>
    $('.razorpay-payment-button').addClass('subscribe btn btn-primary btn-block shadow-sm');
</script>
@yield('footer')
<footer>
    <div class="row mt-5">
        <div class="col-lg-6 mx-auto">
            <span class="row m-5"> <b> Developed By Usman </b>
                <p class="ml-3 mr-3"> Copyright</p> {{ date('Y') }} <span>
        </div>
    </div>
</footer>
</body>

</html>
