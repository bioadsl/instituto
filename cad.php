
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <script LANGUAGE="javascript">
        $(document).ready(function() {
            $(".nome").on("input", function() {
                var textoDigitado = $(this).val();
                var inputCusto = $(this).attr("sinc");
            $("#" + inputCusto).val(textoDigitado);
             });
        });
        
	</script>
</head>


<input type='text' id='nome1' class='nome' name='nome1' sinc='sinc1'>
<input type='text' id='sinc1' name='sinc1'>

<br><br>

<input type='text' id='nome2' class='nome' name='nome2' sinc='sinc2'>
<input type='text' id='sinc2' name='sinc2'>

<br><br>

<input type='text' id='nome3' class='nome' name='nome3' sinc='sinc3'>
<input type='text' id='sinc3' name='sinc3'>

</html>