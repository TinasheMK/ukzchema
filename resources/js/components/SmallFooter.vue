<template>
<footer class="footer-area footer2 py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-md-6 col-lg-5">
            <!-- Copywrite Text-->
            <div class="footer--content-text">
              <p class="mb-0"> &copy; {{ new Date().getFullYear() }}, made with <i class="fa fa-heart heart text-danger"></i> by  </p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-5">
            <!-- Footer Nav-->
            <div class="footer-nav">
              <ul class="d-flex">
                <li><a :href="about_us">About</a></li>
                <li><a :href="contact_us">Contact</a></li>
                <li><a :href="constitution">Constitution</a></li>
                <li><a :href="login">Login</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
</template>

<script>
export default {
  props: [
    'about_us',
    'contact_us',
    'constitution',
    'login',
  ]
};
</script>

<style>
</style>
