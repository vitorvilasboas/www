/**
* Autor: Rafael Clares
* Mail: rafadinix@gmail.com
* Web: www.clares.wordpress.com
* Ano : 10/2010 
*/

/**
* Exemplo 
*
* <form name="foo" id="foo" onSubmit="return false">
* <input type="text" name="nome" id="nome" class="required" /> 
* <input type="text" name="email" id="email" class="required email" /> 
* <input type="text" name="idade" id="idade" class="required numeric" />
* <input type="text" name="cep" id="cep" class="required numeric" min="7" max="9" />
* <button onclick="return add()">Cadastrar</button>
* </form>
* <p id="validate_message">&nbsp;</p>
*
* A funcao add() 
*
* function add(){
*    validate('foo'); 
*	 if(validateState){
*      // seu código 
*    }
* }
*/

/* Config Vars */
/* Nao alterar ValidateState */
validateState = false;

/* Required message */
validateRequiredMsg = "Campo de preechimento obrigatório";
/* E-mail message */
validateMailMsg = "E-mail informado é inválido";
/* Numeric message */
validateNumericMsg = "O valor deve ser númerico";
/* Min message */
validateMinMsg = "A quantidade mínima de caracters é: ";
/* Max message */
validateMaxMsg = "A quantidade máxima de caracters é: ";
/* Password message */
validatePasswordMsg = "Senhas não conferem";


function validate(form_id)
{
    $('#'+form_id+' :input').each(function(){
        /* required */
        if ( $(this).hasClass('required') && $.trim( $(this).val() ) == ""){
            $(this).addClass('invalid');
            $(this).focus();
			$('#validate_message').html(validateRequiredMsg);
            validateState = false; 
            return false;
        }
        else{
            $(this).removeClass('invalid');
            validateState = true;
        }
		
         /* numeric value */
        if ( $(this).hasClass('required') && $(this).hasClass('numeric') ){
            var nan = new RegExp(/(^-?\d\d*\.\d*$)|(^-?\d\d*$)|(^-?\.\d\d*$)/);
            if (!nan.test($.trim( $(this).val() ))){
                $(this).addClass('invalid');
                $(this).focus();
                $('#validate_message').html(validateNumericMsg);
                validateState = false;
                return false;
            }
            else{
                $('#validate_message').html('');
                $(this).removeClass('invalid');
                validateState = true;
            }
        }
		
        /* mail */
        if ( $(this).hasClass('email') ){
            var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
            if (!er.test($.trim( $(this).val() ))){
                 $(this).addClass('invalid');
                 $(this).focus();
				 $('#validate_message').html(validateMailMsg);
                 validateState = false;
                 return false;
            }
            else{
                $(this).removeClass('invalid');
                validateState = true;
            }
        } 

        /* min value */
        if ( $(this).attr('min') && $(this).hasClass('required') ){
            if($.trim($(this).val()).length < $(this).attr('min') ){
                $(this).addClass('invalid');
                $(this).focus();
                $('#validate_message').html(validateMinMsg + $(this).attr('min'));
                validateState = false;
                return false;
            }
            else{
                $('#validate_message').html('');
                $(this).removeClass('invalid');
                validateState = true;
            }
        }
		
         /* max value */
        if ( $(this).attr('max')  && $(this).hasClass('required') ){
            if($.trim($(this).val()).length > $(this).attr('max') ){
                $(this).addClass('invalid');
                $(this).focus();
                $('#validate_message').html(validateMaxMsg + $(this).attr('max'));				
                validateState = false;
                return false;
            }
            else{
                $('#validate_message').html('');
                $(this).removeClass('invalid');
                validateState = true;
            }
        }		
        /* password */
        if ( $(this).hasClass('password') && $(this).nextAll('.password').hasClass('password')){ 
            if ($.trim( $(this).val() ) != $.trim( $(this).nextAll('.password').val() )){
                 $(this).nextAll('.password').addClass('invalid');
                 $(this).nextAll('.password').focus();
                 $('#validate_message').html(validatePasswordMsg);
                 validateState = false;
                 return false;
            }
            else{ 
            $('#validate_message').html('');
            $(this).nextAll('.password').removeClass('invalid');
            validateState = true;
            }
        }
    })
}
