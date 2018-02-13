<?php  get_header(); ?> 

<div id="app">
 <nav class="uk-navbar-container main-menu" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li><router-link to="/form">Register</router-link></li>
            <li><router-link to="/clients">Clients</router-link></li>
        </ul>
    </div>
</nav>
  
  
  
  <router-view></router-view>

</div>

<!-- Registration form template starts here -->
<script type="text/x-template" id="registration-form">
<div class="reg_holder">
  <article class="uk-article">
<h1 class="uk-article-title">Create your Bees Account</h1>
<p class="uk-text-lead">Sign up and start managing your account today</p>
</article>
<form class="client_reg_form" id="client_reg_form" name="client_reg_form">
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
        <div class="uk-width-1-2 element_holder uk-form-selec" data-uk-form-select>
            <legend>Nationality</legend>
            <select v-model="post.cl_nationality">
              <option v-for="country in countries" :value="country.name">{{ country.name }}</option>
            </select>
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

</div>
<hr style="margin-top: 25px !important;">
</div>
</div>
</script>
<!-- Registration form template ends here here -->

<!-- Clients template starts here --> 
<script type="text/x-template" id="clients-holder">

<div class="clients_holder">
  <article class="uk-article" style="padding-bottom: 25px;">
   <h1 class="uk-article-title">List of all Bees clients!</h1>
    <p class="uk-text-lead">We do values for our clients therefore we value each one of them.</p>
</article>
<div class="uk-grid client" v-for="client in clients">
   <div class="uk-width-1-4 field_desc">Client Name</div>
   <div class="uk-width-2-3 field_value">{{ client.title.rendered }}</div>
   <div class="uk-width-1-4 field_desc">Gender</div>
   <div class="uk-width-2-3 field_value">{{ client.cl_gender[0] }}</div>
   <div class="uk-width-1-4 field_desc">Phone</div>
   <div class="uk-width-2-3 field_value">{{ client.cl_phone[0] }}</div>
   <div class="uk-width-1-4 field_desc">Email</div>
   <div class="uk-width-2-3 field_value">{{ client.cl_email[0] }}</div>
   <div class="uk-width-1-4 field_desc">Address</div>
   <div class="uk-width-2-3 field_value">{{ client.cl_address[0] }}</div>
   <div class="uk-width-1-4 field_desc">Nationality</div>
   <div class="uk-width-2-3 field_value">{{ client.cl_nationality[0] }}</div>
   <div class="uk-width-1-4 field_desc">Date of birth</div>
   <div class="uk-width-2-3 field_value">{{ client.cl_date_of_birth[0]  }}</div>
   <div class="uk-width-1-4 field_desc">Education</div>
   <div class="uk-width-2-3 field_value">{{ client.cl_education[0] }}</div>
   <div class="uk-width-1-4 field_desc">Contact mode</div>
   <div class="uk-width-2-3 field_value">{{ client.cl_contact_mode[0] }}</div>
</div>


</div>
</script>
<!-- Clients template ends here-->
<?php get_footer(); ?>