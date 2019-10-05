@if($bank_code == 101)
    <?php $bank_name = 'MAYBANK'; ?>
@elseif($bank_code == 102)
    <?php $bank_name = 'CIMB BANK'; ?>
@elseif($bank_code == 103)
    <?php $bank_name = 'RHB BANK';?>
@elseif($bank_code == 104)
    <?php $bank_name = 'MBSB BANK'; ?>
@elseif(bank_code == 105)
    <?php $bank_name = 'BIMB BANK'; ?>
@elseif($bank_code == 106)
    <?php $bank_name = 'PUBLIC BANK'; ?>
@elseif($bank_code == 107)
    <?php $bank_name = 'MUAMALAT'; ?>
@endif

<p>Hi, </p>
<p>New bank <strong>{{ $bank_name }}</strong> was assigned to you. Pls check it out!</p>
<p>Thank you!</p>