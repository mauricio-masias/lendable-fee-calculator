var error;

function validateAmount() {
    error = '';
    let amount = $('#amount').val();
    if (!$.isNumeric(amount)) {
        error = 'Amount value should be only numbers';
        return false;
    }
    if (amount < 1000) {
        error = 'Amount value should be between £1,000 and £20,000';
        return false;
    }
    if (amount > 20000) {
        error = 'Amount value should be between £1,000 and £20,000';
        return false;
    }
    return true;
}

function showError(er) {
    if (!$('.fee-result').hasClass('hide')) {
        $('.fee-result').addClass('hide');
    }
    $('#fee_error').html(er);
}

function calculateFee(amount, term) {
    $.ajax({
        type: 'POST',
        url: '/calculation',
        data: {
            _token: token,
            amount: amount,
            term: term
        },
        success: function(data) {
            $('.spinner').addClass('hide');
            if (data.status != 1) {
                showError(data.error);
            } else {
                if ($('.fee-result').hasClass('hide')) {
                    $('.fee-result').removeClass('hide');
                }
                $('#fee_error').html('');
                $('#fee_result').html(data.fee);
                $('#history').prepend('<p>Amount: ' + amount + ' - Term: ' + term + ' - Fee: ' + data.fee + '</p>');
            }
        }
    });
}

$(function() {
    $('.trigger').on('click', function() {
        if (validateAmount()) {
            $('.spinner').removeClass('hide');
            calculateFee($('#amount').val(), $('#term').val());
        } else {
            showError(error);
        }
    });
});