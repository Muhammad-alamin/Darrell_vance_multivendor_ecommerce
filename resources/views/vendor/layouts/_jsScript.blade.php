
<script src="{{asset('assets/js/bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/charts/chart-ecommerce.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript" >
    $( function() {
        $( "#report" ).datepicker({
            dateFormat:'dd/mm/yy',
        });

    } );

    $(document).ready(function() {
        $('#summernote').summernote();
    });

    $(document).ready(function () {
        $(document).on('change', 'select[name="payout_payment_method"]', function () {
        $('.payout-payment-wrapper').addClass('d-none');
        $('#payout-payment-' + $(this).val()).removeClass('d-none');
        });
    });
</script>


