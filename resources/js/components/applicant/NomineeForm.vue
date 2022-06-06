<template>
  <div>
    <h6>Enter Fullname & D.O.B as it appears on their IDs</h6>
    <div class="row">
      <div class="col-12"></div>
      <div class="col-12 col-lg-6">
        <label for="full_name">Full Name:</label>
        <input
          class="form-control mb-30 bg-gray"
          :class="{ 'is-invalid': submitted && $v.form.full_name.$error }"
          type="text"
          name="full_name"
          @keyup="$emit('fullName', form.full_name)"
          v-model="form.full_name"
          id="full_name"
          placeholder="Full Name"
        />
      </div>
      <div class="col-12 col-lg-6">
        <label for="nominee_email">Email:</label>
        <input
          class="form-control mb-30 bg-gray"
          id="nominee_email"
          type="email"
          v-model="form.email"
          :class="{ 'is-invalid': submitted && $v.form.email.$error }"
          placeholder="Email Address"
        />
      </div>
      <div class="col-12">
        <datepicker
          format="dd MMMM yyyy"
          :initialView="'year'"
          name="dob"
          v-model="form.dob"
          placeholder="Date of Birth"
          :input-class="(submitted && $v.form.dob.$error) ? 'form-control mb-30 is-invalid' : 'form-control mb-30'"
        ></datepicker>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <label for="zimbabwean_by">Zimbabwean resident by:</label>
        <select
          v-model="form.zimbabwean_by"
          :class="{ 'is-invalid': submitted && $v.form.zimbabwean_by.$error }"
          class="custom-select form-control mb-30 bg-gray"
          id="zimbabwean_by"
        >
          <option value="undefined" disabled selected>Select</option>
          <option value="birth">Birth</option>
          <option value="descent">Descent</option>
          <option value="spouse">Spouse</option>
        </select>
      </div>
    </div>
  </div>
</template>

<script>
import { required, email } from "vuelidate/lib/validators";
import { parsePhoneNumberFromString, AsYouType } from "libphonenumber-js";

export default {
  components: {
    Datepicker: () => import("vuejs-datepicker")
  },
  mounted() {
    this.$eventBus.$on("validate:nominee", skip => {
      if (skip) {
        return this.$emit("nomineeValid", this.form);
      }
      this.submitted = true;
      this.$v.$touch();
      if (this.$v.$invalid) {
        this.scrollErrorToView();
        return;
      }
      this.$emit("nomineeValid", this.form);
    });
  },
  data() {
    return {
      submitted: false,
      form: {}
    };
  },
  validations: {
    form: {
      full_name: { required },
      dob: { required },
      email: { email },
      zimbabwean_by: { required }
    }
  },
  methods: {
    scrollErrorToView() {
      setTimeout(() => {
        const elem = $(`.is-invalid`).first();
        $(elem).focus();
      }, 100);
    }
  }
};
</script>

<style>
</style>