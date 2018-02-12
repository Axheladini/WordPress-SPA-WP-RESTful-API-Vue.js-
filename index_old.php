<?php  get_header(); ?> 



<div id="app">

<article class="uk-article">
<h1 class="uk-article-title">Create your PosLabs Account</h1>
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
                   name="cl_name">
        </div>
        <div class="uk-width-1-2 element_holder">
            <legend>Gender</legend>
            <select class="uk-select" id="cl_gender" name="cl_gender"  v-model="post.cl_gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="uk-width-1-2 element_holder">
            <legend>Phone</legend>
            <input class="uk-input cl_phone" 
                   type="tel" 
                   placeholder="Enter your phone number"
                   v-model="post.cl_phone"
                   required="" 
                   name="cl_phone">
        </div>
        <div class="uk-width-1-2 element_holder">
            <legend>Email</legend>
            <input class="uk-input cl_email" 
                   type="email" 
                   placeholder="sample@email.com"
                   v-model="post.cl_email"
                   required="" 
                   name="cl_email">
        </div>
        <div class="uk-width-1-2 element_holder">
            <legend>Address</legend>
            <input class="uk-input cl_address" 
                   type="text" 
                   placeholder="Your Address"
                   v-model="post.cl_address"
                   required="" 
                   name="cl_address">
        </div>
        <div class="uk-width-1-2 element_holder">
            <legend>Nationality</legend>
            <input  
                   type="text"
                   placeholder="Country name"
                   class="uk-input uk-form-width-medium cl_nationality1"
                   name="cl_nationality"
                   v-model="post.cl_nationality"
                   id="cl_nationality" >
        </div>
        <div class="uk-width-1-2 element_holder">
            <legend>Date of birth</legend>
              <input 
                
                   type="date"
                   placeholder="dd.mm.yyyy"
                   class="uk-input uk-form-width-medium cl_date_of_birth"
                   v-model="post.cl_date_of_birth"
                   name="cl_date_of_birth" 
                   required="" >
        </div>
         <div class="uk-width-1-2 element_holder">
            <legend>Education</legend>
            <select class="uk-select" id="cl_education" name="cl_education" required="" v-model="post.cl_education">
                <option value="High school">High school</option>
                <option value="Bachelors Degree">Bachelors Degree</option>
                <option value="Masters Degree">Masters Degree</option>
                <option value="Doctoral Degree">Doctoral Degree</option>
                <option value="Postdoctoral">Postdoctoral</option>
            </select>
        </div>
        <div class="uk-width-1-2 element_holder">
            <legend>Contact mode</legend>
           <select class="uk-select" id="cl_contact_mode" name="cl_contact_mode" required="" v-model="post.cl_contact_mode">
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
<div class="uk-article result_holder">

<img src="<?php echo site_url();?>/wp-content/themes/ax-at-bees/assets/loader.svg" class="loader">

<p class="uk-text-lead respond_success uk-text-success">Thank you for registering to Bees client database. Please enjoy all our services!</p>
<p class="uk-text-lead respond_danger uk-text-danger">There was a problem, please try again or contact our support!</p>
<p v-if="errors.length">
    <b>Please correct the following error(s):</b>
    <ul>
      <li v-for="error in errors">{{ error }}</li>
    </ul>
  </p>
</div>
<hr style="margin-top: 25px !important;">
</div>

<?php get_footer(); ?>