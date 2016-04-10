<?php
$auth = SwpmAuth::get_instance();
$setting = SwpmSettings::get_instance();
$password_reset_url = $setting->get_value('reset-page-url');
$join_url = $setting->get_value('join-us-page-url');
?>
<div class="swpm-login-widget-form">
    <form id="swpm-login-form" name="swpm-login-form" method="post" action="">
        <div class="swpm-login-form-inner">
          <span class="input input--manami">
          	<input class="input__field input__field--manami" type="text" id="swpm_user_name" name="swpm_user_name">
          	<label class="input__label input__label--manami" for="swpm_user_name">

          		<span class="input__label-content input__label-content--manami"><?php echo SwpmUtils::_('Username') ?></span>

          	</label>
          </span>

          <span class="input input--manami">
          	<input class="input__field input__field--manami" type="text" id="swpm_password" name="swpm_password">
          	<label class="input__label input__label--manami" for="swpm_password">

          		<span class="input__label-content input__label-content--manami"><?php echo SwpmUtils::_('Password') ?></span>

          	</label>
          </span>


            <div class="swpm-remember-me">
                <span class="swpm-remember-checkbox"><input type="checkbox" name="rememberme" value="checked='checked'"></span>
                <span class="swpm-rember-label"> <?php echo SwpmUtils::_('Remember Me') ?></span>

                <a id="forgot_pass" class="swpm-login-form-pw-reset-link"  href="<?php echo $password_reset_url; ?>"><?php echo SwpmUtils::_('Forgot Password') ?>?</a>

            </div>
            <div class="swpm-login-submit">
                <input type="submit" class="swpm-login-form-submit" name="swpm-login" value="<?php echo SwpmUtils::_('Login') ?>"/>
            </div>

            <?php /*
            <div class="swpm-join-us-link">
                <a id="register" class="swpm-login-form-register-link" href="<?php echo $join_url; ?>"><?php echo SwpmUtils::_('Join Us') ?></a>
            </div>
            */ ?>
            <div class="swpm-login-action-msg">
                <span class="swpm-login-widget-action-msg"><?php echo $auth->get_message(); ?></span>
            </div>
        </div>
    </form>
</div>

<script>
  (function() {
    // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
    if (!String.prototype.trim) {
      (function() {
        // Make sure we trim BOM and NBSP
        var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
        String.prototype.trim = function() {
          return this.replace(rtrim, '');
        };
      })();
    }

    [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
      // in case the input is already filled..
      if( inputEl.value.trim() !== '' ) {
        classie.add( inputEl.parentNode, 'input--filled' );
      }

      // events:
      inputEl.addEventListener( 'focus', onInputFocus );
      inputEl.addEventListener( 'blur', onInputBlur );
    } );

    function onInputFocus( ev ) {
      classie.add( ev.target.parentNode, 'input--filled' );
    }

    function onInputBlur( ev ) {
      if( ev.target.value.trim() === '' ) {
        classie.remove( ev.target.parentNode, 'input--filled' );
      }
    }
  })();
</script>
