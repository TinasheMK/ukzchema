<template>
  <div class="account-side-area">
    <!-- Single Widget Area-->
    <div class="single-widget-area mb-3">
      <h4 class="widget-title mb-30">Jmunapo</h4>
      <ul class="catagories-list">
        <li
          class="pl-3"
          v-for="link in links"
          :class="isActive(link.link)"
          :key="link.link">
          <a :href="link.link">
            <i :class="'lni ' + link.icon"></i>
            {{link.title}}
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    const parts = this.$route.path.split('/');
    this.page = parts[parts.length - 1]
    console.log("Side", this.page);

  },
  data() {
    return {
      page: null,
      links: [
        {
          title: "Basic Information",
          link: "/account",
          icon: "lni-information",
        },
        {
          title: "Next of Kin",
          link: "/account/next-of-kin",
          icon: "lni-users",
        },
        {
          title: "Social Profiles",
          link: "/account/profiles",
          icon: "lni-layers",
        },
        {
          title: "Notification",
          link: "/account/notifications",
          icon: "lni-alarm",
        },
        {
          title: "Claims",
          link: "/account/claims",
          icon: "lni-alarm",
        },
        {
          title: "Change Password",
          link: "/account/change-password",
          icon: "lni-lock",
        }
      ]
    }
  },

  methods: {
    isActive(link){
      const parts = link.split('/');
      const p = parts[parts.length - 1]
      if(p === this.page) return "account-active"
      return "";
    }
  }
};
</script>

<style>
</style>
