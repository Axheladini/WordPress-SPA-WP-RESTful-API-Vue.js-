# WordPress SPA APP - Creat and Read of the small CRUD 
<b><i>Simple and small app for testing WP RESTful Endpoints with Vue.js</i></b>

This small APP is based on Wordpress REST API technology and Vue.js framework for frontend.  

AWS free tier EC2 instance link<br>
[https://wp-api.agonxheladini.com/](https://wp-api.agonxheladini.com/)

## Requirements and Instalation

<b>1.</b> This app is build as child theme of Beans theme. Therefore as a first step you must install Beans theme.
GitHub repository can be found here: 

[https://github.com/Getbeans/Beans](https://github.com/Getbeans/Beans)

<b>2.</b> When working with Wordpress REST API you need to install and activate <b>JSON Basic Authentication</b> plugin. The plugin repo can be found on this link: 

[https://github.com/WP-API/Basic-Auth](https://github.com/WP-API/Basic-Auth)

<b>3.</b> To speed up the proceess of coding and structuring the APP I have used a ready made Custom Post Typs (CPT) class by <b>jjgrainger</b> for creating the CPT 'Client'. The same class is imported with composer. 
The repo for this class can be found here: 

[https://github.com/jjgrainger/wp-custom-post-type-class](https://github.com/jjgrainger/wp-custom-post-type-class)

<b>4.</b> With this app a 'client' can use a form and register to  our platform by using WP REST API, there is a need for 
authentication method. Since it is test project i have used Basic Authentication method. For enterprise usage I strongly advice OAuth2 as authentication method for WP REST API. For this reason in the child theme directory inside <b>include</b> directory search for a file called <i>ax_wp_spa_enqueue_assets.php</i>, on line 23 replace username and password with your user information. 

```
wp_localize_script( 'app_vue_js', 'axSettings', array( 'root' => esc_url_raw( rest_url() ), 'nonce' => wp_create_nonce( 'wp_rest' ), 'username'=>'admin', 'passwd' => 'admin' ) );
```

<b>5</b>. The last step is to upload the child theme (wp-spa) or clone this repo to your Wordpress theme directory.  

<b>6</b>. After you pass all steps dont forget to update <b>Composer</b>. 


* Developed under Wordpress version: 4.9.4
* Vue.js v2.5.13 

