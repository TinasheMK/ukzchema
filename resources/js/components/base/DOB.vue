<template>
  <div class="form-group">
    <label>Date of Birth</label>
    <datepicker
      format="dd MMMM yyyy"
      :initialView="'year'"
      :value="val"
      :disabled="!unlocked"
      :name="name"
      :input-class="unlocked ? 'form-control dob' : 'form-control'"
    ></datepicker>
  </div>
</template>

<script>
export default {
    props: ['unlocked', 'name', 'val'],
  components: {
    Datepicker: () => import("vuejs-datepicker")
  }
};
</script>

<style>
.dob {
    background-color: #ffffff !important;
    color: #7d7a75 !important;
    cursor: pointer !important;
}
</style>