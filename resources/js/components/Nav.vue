<template>
  <div>
    <header class="header-area header2">
      <div class="container">
        <div class="classy-nav-container breakpoint-off">
          <nav class="classy-navbar navbar2 justify-content-between" id="radixNav">
            <!-- Logo-->
            <a class="nav-brand mr-5" href="index.html">
              <img src="img/core-img/logo.png" alt />
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
                    <a href="/dashboard">Dashboard</a>
                    <!-- Show latest news and posts -->
                  </li>
                  <li>
                    <a href="/notifications">Notifications</a>
                  </li>
                  <li>
                    <!-- <a href="javascript:void(0);" data-toggle="dropdown" role="button" class="dropdown-toggle" aria-expanded="false">
                      <img src="/storage/users/default.png" alt="" class="rounded-circle"></a> -->
                    <a href="javascript:;">
                      <i class="lni-user mx-1"></i>
                      Jmunapo
                    </a>
                    <ul class="dropdown">
                      <li>
                        <a href="/account">Account</a>
                      </li>
                      <li>
                        <a href="/logout">Logout</a>
                      </li>
                    </ul>
                  </li>
                </ul>
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
  mounted(){
    const parts = this.$route.path.split('/');
    this.page = parts[parts.length - 1]
  },
  data(){
    return {
      page: "",
      auth_link: null,
      auth_text: null
    }
  },

  watch:{
    page(p){
      if(p === "login"){
        this.auth_link = "/register";
        this.auth_text = "Sign Up";
      }else if(p === "register"){
        this.auth_link = "/login";
        this.auth_text = "Sign In";
      }
    }
  }
};
</script>

<style>
</style>