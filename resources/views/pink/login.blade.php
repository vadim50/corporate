@extends(env('THEME').'.layouts.site')
@section('content')
<div id="content-page" class="content group">
    <div class="hentry group">
		<form
        id="contact-form-contact-us" 
        class="contact-form" 
        method="post" 
        action="{{ url('/login') }}">
            @csrf
            <div class="usermessagea"></div>
            <fieldset>
                <ul>
                    <li class="text-field">
                        <label for="name-contact-us">
                        <span class="label">Login</span>
                        <br />					<span class="sublabel">This is the login</span><br />
                        </label>
                        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="email" name="email" id="name-contact-us" class="required" value="" /></div>
                        <div class="msg-error"></div>
                    </li>
                    <li class="text-field">
                        <label for="email-contact-us">
                        <span class="label">Password</span>
                        <br />					<span class="sublabel">This is a field password</span><br />
                        </label>
                        <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span><input type="password" name="password" id="email-contact-us" class="required email-validate" value="" /></div>
                        <div class="msg-error"></div>
                    </li>
                    <li class="submit-button">
                        <input type="text" name="yit_bot" id="yit_bot" />
                        <input type="hidden" name="yit_action" value="sendmail" id="yit_action" />
                        <input type="hidden" name="yit_referer" value="http://yourinspirationtheme.com/demo/pinkrio/corporate/contact/" />
                        <input type="hidden" name="id_form" value="126" />
                        <input type="submit" name="yit_sendmail" value="Send Message" class="sendmail alignright" />			
                    </li>
                </ul>
            </fieldset>
        </form>
	</div>
</div>
@endsection