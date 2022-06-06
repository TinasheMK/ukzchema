<template>
  <div></div>
</template>

<script>
require("../../libs/bootstrap-notify");

export default {
  props: ["message", "level"],
  mounted() {
    if (this.message) {
      let icon;
      switch (this.level) {
        case "primary":
          icon = "nc-icon nc-check-2";
          break;
        case "danger":
          icon = "nc-icon nc-simple-remove";
          break;
        default:
          icon = "nc-icon nc-bell-55";
          break;
      }
      $.notify(
        {
          icon,
          message: this.message
        },
        {
          type: this.level || 'primary',
          timer: 5000,
          placement: {
            from: "top",
            align: "right"
          }
        }
      );
    }
  }
};
</script>

<style>
</style>