var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}};
var config = {
    url: axAtBeesSettings.root+"wp/v2/client",
    user:axAtBeesSettings.username,
    pass: axAtBeesSettings.passwd
};

var app = new Vue({
  el: '#app',
  data: 
  {
    errors:[],
    post:{

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
  },
  methods:{
    clientRegister: function(e){
     
     /*this.errors = [];
     
     if(!this.post.title.rendered) this.errors.push("Name is required.");
     if(this.post.cl_gender == '') this.errors.push("Gender is required.");
     if(this.post.cl_phone == "") this.errors.push("Phone is required.");
     if(this.post.cl_address == "") this.errors.push("Address is required.");
     if(this.post.cl_nationality == "") this.errors.push("Nationality is required.");
     if(this.post.cl_date_of_birth == "") this.errors.push("Date of birth is required.");
     if(this.post.cl_education == "") this.errors.push("Education is required.");
     if(this.post.cl_contact_mode == "") this.errors.push("Contact mode is required.");
     if(this.post.cl_email == "") this.errors.push("Email required.");
     if(!this.errors.length) return true; */
      
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
                        cl_gender: this.post.cl_gender,
                        cl_phone: this.post.cl_phone,
                        cl_email: this.post.cl_email,
                        cl_address: this.post.cl_address,
                        cl_nationality: this.post.cl_nationality,
                        cl_date_of_birth: this.post.cl_date_of_birth,
                        cl_education: this.post.cl_education,
                        cl_contact_mode: this.post.cl_contact_mode
                       }
                } ).done( function ( response ) {
                    jQuery(".loader").hide();
                     if(response.title.rendered != '')
                     {
                       jQuery(".respond_success").show();
                       jQuery(".respond_danger").hide();
                       setTimeout(function(){
                         jQuery(".respond_success").hide();
                        }, 6000);
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
  }

});



jQuery( document ).ready(function() {
//Find country from ip
jQuery.getJSON("http://freegeoip.net/json/", function (data) {
    var country = data.country_name;
    var ip = data.ip;
    jQuery('#cl_nationality').val(country);

});

});


