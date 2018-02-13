# WORDPRESS SPA app ##Client registration and client list view (Coding task from artbees.net)

This small APP is based on Wordpress REST API technology and Vue.js framework for frontend.  

AWS free tier EC2 instance link<br>
[http://54.201.99.203/bees](http://54.201.99.203/bees)



## Requirements and Instalation

<b>1.</b> This app is build as child theme of Beans theme. Therefore as a first step you must install Beans theme.
The link to Beasn GitHub repository can be found here: 

[https://github.com/Getbeans/Beans](https://github.com/Getbeans/Beans)

<b>2.</b> When working with Wordpress REST API you must use <b>JSON Basic Authentication</b> plugin. The plugin repo could be found on this link: 

[https://github.com/WP-API/Basic-Auth](https://github.com/WP-API/Basic-Auth)

<b>3.</b> To speed up the proceess of coding and structuring the ap i have used a read mady Custom Post Typs (CPT) class by <b>jjgrainger</b> for creating the CPT 'Client'. I have used composer (it was a point on coding task document delivered by artbees). The repo for this class can be found here: 

[https://github.com/jjgrainger/wp-custom-post-type-class](https://github.com/jjgrainger/wp-custom-post-type-class)

<b>4.</b> Since with this app a client can use a form and register to  our platform by suing WP REST API there is a need for 
muthentication method. Since it is test project i have used Basic Authentication method. For enterprise usage I strongly advice OAuth2 as Authentication method for WP REST APi. For this reason in the child theme directory inside <b>include</b> directory look for a file called <i>ax_at_beas_enqueue_assets.php</i>, on line 23 replace username and password with your user information. 

```
wp_localize_script( 'app_vue_js', 'axAtBeesSettings', array( 'root' => esc_url_raw( rest_url() ), 'nonce' => wp_create_nonce( 'wp_rest' ), 'username'=>'admin', 'passwd' => 'admin' ) );
```

5. The last step is to upload the child theme (ax-at-bees) or clone this repo to your Wordpress theme directory.  

* Developed under Wordpress version: 4.9.4
* Vue.js v2.5.13 
