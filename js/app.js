var config = {
    url: axAtBeesSettings.root+"wp/v2/client",
};

var app = new Vue({
  el: '#app',
  data: 
  {
    cl_gender: '',
    cl_phone: '',
    cl_email: '',
    cl_address: '',
    cl_nationality: '',
    cl_date_of_birth:'',
    cl_education:'',
    cl_contact_mode:'',
    post:{

       title: { rendered: '' },
       cl_gender:[],
       
    }
  },
  methods:{
    clientRegister: function(){
     // console.log(this.post.title.rendered);
     jQuery.ajax( {
               url: config.url,
                    method: 'POST',
                    beforeSend: function ( xhr ) 
                    {
                        xhr.setRequestHeader('X-WP-Nonce', axAtBeesSettings.nonce);
                    },
                    data:{
                        title : this.post.title.rendered,
                        cl_gender: this.post.cl_gender
                       }
                } ).done( function ( response ) {
                    console.log( response );
                } );
    }
  }

});

/** You should use wp_localize_script() to provide this data dynamically */

 
