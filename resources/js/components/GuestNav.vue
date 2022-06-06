<template>
  <div>
    <header class="header-area header2">
      <div class="container">
        <div class="classy-nav-container breakpoint-off">
          <nav class="classy-navbar navbar2 justify-content-between" id="radixNav">
            <!-- Logo-->
            <a class="nav-brand mr-5" href="/">
              <img src="storage/img/logo.png" alt />
            </a>
            <!-- Navbar Toggler-->
            <div class="classy-navbar-toggler">
              <span class="navbarToggler">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </span>
            </div>
            <!-- Menu-->
            <div class="classy-menu">
              <!-- close btn-->
              <div class="classycloseIcon">
                <div class="cross-wrap">
                  <span class="top"></span>
                  <span class="bottom"></span>
                </div>
              </div>
              <!-- Nav Start-->
              <div class="classynav">
                <ul id="corenav">
                  <li>
                    <a href="/">Home</a>
                  </li>
                  <li>
                    <a :href="about_us">About Us</a>
                  </li>
                  <li>
                    <a :href="contact_us">Contact Us</a>
                  </li>
                  <li>
                    <a :href="constitution">Constitution</a>
                  </li>
                </ul>
                <div v-if="auth_link && auth_text" class="login-btn-area ml-5 mt-5 mt-lg-0">
                  <a v-if="page !== 'login'" class="btn radix-btn btn-sm" :href="login">Login</a>
                  <a class="btn radix-btn white-btn btn-sm" :href="auth_link">{{auth_text}}</a>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </header>
  </div>
</template>

<script>
export default {
  props: [
    'about_us',
    'contact_us',
    'constitution',
    'login',
  ],
  mounted(){
    console.log("Test");
    const parts = this.$route.path.split('/');
    this.page = parts[parts.length - 1];
    
    if(this.page === "login"){
        this.auth_link = "/join-now";
        this.auth_text = "Join Now";
      }else if(this.page === "register"){
        this.auth_link = "/login";
        this.auth_text = "Sign In";
      }else {
        this.auth_link = "/join-now";
        this.auth_text = "Join Now";
      }
  },
  data(){
    return {
      page: "",
      auth_link: null,
      auth_text: null
    }
  }
};
</script>

<style>
</style>