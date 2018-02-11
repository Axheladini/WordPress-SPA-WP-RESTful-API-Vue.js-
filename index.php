<?php  get_header(); ?> 

<div id="app">
<article class="uk-article">
<h1 class="uk-article-title">Create your Bees Account</h1>
<p class="uk-text-lead">Sign up and start managing your account today</p>
</article>
<hr style="margin-bottom: 25px !important;">
<form class="client_reg_form" id="client_reg_form">
  <div class="uk-grid">
        <div class="uk-width-1-2 element_holder">
            <legend>Full Name</legend>
            <input class="uk-input cl_name" 
                   type="text" 
                   placeholder="Name & surname"
                   v-model="post.title.rendered"
                   required="" 
                   name="cl_name">
        </div>
        <div class="uk-width-1-2 element_holder">
            <legend>Gender</legend>
            <select class="uk-select" id="cl_gender" name="cl_gender" required="" v-model="post.cl_gender">
                <option value="" selected="selected">Select gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="uk-width-1-2 element_holder">
            <legend>Phone</legend>
            <input class="uk-input cl_phone" 
                   type="tel" 
                   placeholder="Enter your phone number"
                   v-model="cl_phone"
                   required="" 
                   name="cl_phone">
        </div>
        <div class="uk-width-1-2 element_holder">
            <legend>Email</legend>
            <input class="uk-input cl_email" 
                   type="email" 
                   placeholder="sample@email.com"
                   v-model="cl_email"
                   required="" 
                   name="cl_email">
        </div>
        <div class="uk-width-1-2 element_holder">
            <legend>Address</legend>
            <input class="uk-input cl_address" 
                   type="text" 
                   placeholder="Your Address"
                   v-model="cl_address"
                   required="" 
                   name="cl_address">
        </div>
        <div class="uk-width-1-2 element_holder">
            <legend>Nationality</legend>
            <select class="uk-select" id="cl_nationality" name="cl_nationality" required="" v-model="cl_nationality">
                <option value="">Select Nationality</option>
                <option value="usa">USA</option>
                <option value="al">Albania</option>
                <option value="mk">Macedonis</option>
            </select>
        </div>
        <div class="uk-width-1-2 element_holder">
            <legend>Date of birth</legend>
              <input 
                   type="text" 
                   data-uk-datepicker="{format:'DD.MM.YYYY'}" 
                   placeholder="dd.mm.yyyy"
                   class="uk-input uk-form-width-medium cl_date_of_birth"
                   v-model="cl_date_of_birth"
                   name="cl_date_of_birth" 
                   required="" >
        </div>
         <div class="uk-width-1-2 element_holder">
            <legend>Education</legend>
            <select class="uk-select" id="cl_education" name="cl_education" required="" v-model="cl_education">
                <option value="">Select eductaion</option>
                <option value="High school">High school</option>
                <option value="Bachelors Degree">Bachelors Degree</option>
                <option value="Masters Degree">Masters Degree</option>
                <option value="Doctoral Degree">Doctoral Degree</option>
                <option value="Postdoctoral">Postdoctoral</option>
            </select>
        </div>
        <div class="uk-width-1-2 element_holder">
            <legend>Contact mode</legend>
           <select class="uk-select" id="cl_contact_mode" name="cl_contact_mode" required="" v-model="cl_contact_mode">
                <option value="">Select contact method</option>
                <option value="Phone">Phone</option>
                <option value="Email">Email</option>
            </select>
        </div>
        <div class="uk-width-1-2 element_holder">
            <p class="terms_text">By clicking, you agree to our <a href="">Terms & Conditions</a> and <a href="">Privacy Policy.</a></p>
             <button class="uk-button uk-button-secondary uk-width-1-1"
                    v-on:click="clientRegister">Register</button>
        </div>
  </div>
</form>
<pre>
{{ post | json}}
</pre>
<hr style="margin-top: 25px !important;">
</div>
<?php get_footer(); ?>