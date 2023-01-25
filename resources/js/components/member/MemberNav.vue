<template>
  <div class="sidebar" data-color="primary" data-active-color="primary">
    <div class="logo">
      <a :href="user.home" class="simple-text logo-mini">
        <div class="logo-image-small">
          <img :src="user.avatar" alt />
        </div>
      </a>
      <a :href="user.home" class="simple-text logo-normal">
          {{user.name}}
          <br>
          <small>£ {{user.balance}}</small>
        </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li v-if="user.is_admin" >
          <a :href="user.home">
            <i class="nc-icon nc-compass-05"></i>
            <p>Admin Dashboard</p>
          </a>
        </li>

        <li
            v-for="nav in nav_links"
            :class="page(nav.route) === currentPage ? 'active' : ''"
            :key="nav.name">
          <a :href="nav.route">
            <i :class="'nc-icon ' + nav.icon"></i>
            <p>{{nav.name}}</p>
          </a>
        </li>

        <li>
          <a :href="user.logout">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: ["user", "nav_links"],
  data() {
    return { }
  },
  methods: {
    page(link) {
      const parts = link.split("/");
      return parts[parts.length - 1];
    }
  },
  computed: {
    currentPage() {
      if (!this.$route || !this.$route.path) return null;
      return this.page(this.$route.path);
    }
  }
};
</script>

<style>
</style>