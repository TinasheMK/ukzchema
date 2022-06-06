<template>
  <div></div>
</template>

<script>

require("../../libs/bootstrap.min");
require("../../libs/perfect-scrollbar.jquery.min");
// require("../../libs/bootstrap-notify");
require("../../libs/default/paper-dashboard");

export default {
  mounted(){
    $('#preloader').fadeOut('1000', function () {
      $(this).remove();
    });
  }
}
</script>

<style>

</style>