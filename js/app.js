/*Base64 encoding for Basith Authentication*/
var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}};

/*Basic configuration data*/
var config = {
   
    url: axAtBeesSettings.root+"wp/v2/client", //Local Server
    user:axAtBeesSettings.username,
    pass: axAtBeesSettings.passwd
};

/*Define Form Component*/
const Form = Vue.component('form', {
 template:'#registration-form',
    data:function() {
        return {
            countries:[],
            post:{
                 error:'',
                 title: { rendered: '' },
                 cl_gender:[],
                 cl_phone: [],
                 cl_email: [],
                 cl_address: [],
                 cl_nationality: [],
                 cl_date_of_birth: [],
                 cl_education: [],
                 cl_contact_mode: [] 
               }
            }
         },
         created: function() {
            this.getCountries()
        },
         methods:{
    clientRegister: function(e){  
    
     /* Validation starts her */
     if(this.post.title.rendered == '') {jQuery('.name_error').show(); this.error = true;} else {jQuery('.name_error').hide(); this.error = false;}
     if(this.post.cl_gender == '') { jQuery('.gender_error').show(); this.error = true;}else {jQuery('.gender_error').hide(); this.error = false;}
     if(this.post.cl_phone == '') { jQuery('.phone_error').show(); this.error = true;} else {jQuery('.phone_error').hide(); this.error = false;}
     if(this.post.cl_email == '') { jQuery('.email_error').show(); this.error = true;} else {jQuery('.email_error').hide(); this.error = false;}
     if(!this.validEmail(this.post.cl_email)){ jQuery('.valid_email_error').show(); this.error = true;} else {jQuery('.valid_email_error').hide(); this.error = false;}
     if(this.post.cl_address == '') { jQuery('.address_error').show(); this.error = true;} else {jQuery('.address_error').hide(); this.error = false;}
     if(this.post.cl_nationality == '') { jQuery('.nation_error').show(); this.error = true;} else {jQuery('.nation_error').hide(); this.error = false;}
     if(this.post.cl_date_of_birth == '') { jQuery('.dob_error').show(); this.error = true;} else {jQuery('.dob_error').hide(); this.error = false;}
     if(this.post.cl_education == '') { jQuery('.education_error').show(); this.error = true;} else {jQuery('.education_error').hide(); this.error = false;}
     if(this.post.cl_contact_mode == '') { jQuery('.contact_error').show(); this.error = true;} else {jQuery('.contact_error').hide(); this.error = false;}
     if(this.error == false)
     {

       e.preventDefault();
       jQuery(".loader").show();  

     jQuery.ajax( {
               url: config.url,
                    method: 'POST',
                    beforeSend: function ( xhr ) 
                    {
                       xhr.setRequestHeader( 'Authorization', 'Basic ' + Base64.encode(config.user+":"+config.pass) );
                    },
                    data:{
                        title : this.post.title.rendered,
                        status: 'publish',
                        cl_gender: this.post.cl_gender,
                        cl_phone: this.post.cl_phone,
                        cl_email: this.post.cl_email,
                        cl_address: this.post.cl_address,
                        cl_nationality: this.post.cl_nationality,
                        cl_date_of_birth: this.post.cl_date_of_birth,
                        cl_education: this.post.cl_education,
                        cl_contact_mode: this.post.cl_contact_mode
                       }
                } ).done( function ( response ) 
                {
                    jQuery(".loader").hide();
                     if(response.title.rendered != '')
                     {
                       jQuery(".respond_success").show();
                       jQuery(".respond_danger").hide();
                                              setTimeout(function(){
                         jQuery(".respond_success").hide();
                        }, 6000);

                        jQuery('#client_reg_form').trigger("reset");
                     }
                     else if(response.title.rendered == '')
                     {
                      jQuery(".respond_success").hide();
                      jQuery(".respond_danger").show();
                       
                        setTimeout(function(){
                         jQuery(".respond_danger").hide();
                        }, 6000);


                     }
                } );

            }
     },
     validEmail:function(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
    },
     /* Function to get list of all countries*/
     getCountries: function(){
       
      var xhr = new XMLHttpRequest()
      var self = this
      xhr.open('GET', 'https://restcountries.eu/rest/v1/all')
      xhr.onload = function() {
      self.countries = JSON.parse(xhr.responseText);

      }
      xhr.send()
     }
    /* Function to get list of all ends countries*/
  }
});
/*Form Component ends here*/
/*----------------------------------*/
/*Clients Component starts here*/
const Clients = Vue.component('clients', {
 template:'#clients-holder',
    data:function() {
        return {
            clients:[]
            }
         },
    created: function() {
    this.fetchData()
  },
    methods: {
    fetchData: function() {
      var xhr = new XMLHttpRequest()
      var self = this
      xhr.open('GET', config.url)
      xhr.onload = function() {
        self.clients = JSON.parse(xhr.responseText)
        console.log(self.clients)
      }
      xhr.send()
    }
  }
         

          

});
/*Clients Component ends here */

/*Define Vue.js routes*/ 
const routes = [
{
    path: '/',
    redirect: '/form',
},
{
    path: '/form',
    component: Form
},
{
    path: '/clients',
    component: Clients
}
];


const router = new VueRouter({routes});

const app = new Vue({
    el: '#app',
    router: router
})

