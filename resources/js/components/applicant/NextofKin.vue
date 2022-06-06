<template>
  <div>
    <h6>Enter Full name as it appears on their national ID</h6>
    <form @submit.prevent="handelNOK()">
      <div class="row">
        <div class="col-12">
          <label class="font-weight-bold" for="nok_full_name">Next of kin's Full name:</label>
        </div>
        <div class="col-12 col-lg-6">
          <input
            class="form-control mb-30 bg-gray"
            :class="{ 'is-invalid': submitted && $v.form.nok_full_name.$error }"
            type="text"
            name="nok_full_name"
            v-model="form.nok_full_name"
            id="nok_full_name"
            placeholder="Full Name"
          />
        </div>
        <div class="col-12 col-lg-6">
          <datepicker
            format="dd MMMM yyyy"
            :initialView="'year'"
            @selected="checkDateValidity($event)"
            name="nok_dob"
            v-model="form.nok_dob"
            placeholder="Date of Birth"
            :input-class="date_invalid ? 'form-control is-invalid' : 'mb-30 form-control'"
          ></datepicker>
          <div class="mb-30" v-if="date_invalid && !form.nok_dob"></div>
          <div
            class="mb-30 mt-2 invalid-feedback d-block"
            v-if="date_invalid && form.nok_dob"
          >Next of kin must be 16 years or older</div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <label class="font-weight-bold" for="nok_full_name">Next of kin's Contact details:</label>
        </div>
        <div class="col-12 col-lg-6">
          <input
            class="form-control mb-30 bg-gray"
            id="nok_email"
            type="email"
            v-model="form.nok_email"
            :class="{ 'is-invalid': submitted && $v.form.nok_email.$error }"
            placeholder="Email Address"
          />
        </div>
        <div class="col-12 col-lg-6">
          <input
            class="form-control bg-gray"
            type="tel"
            v-model="nok_phone"
            :class="{ 'is-invalid': submitted && phone_error }"
            name="nok_phone"
            placeholder="Mobile Number"
          />
          <div class="mb-30 mt-1">
            With country code
            <small>e.g +44</small>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <label class="font-weight-bold" for="street">Next of kin's Physical Address:</label>
        </div>
        <div class="col-12 col-lg-6">
          <input
            class="form-control mb-30 bg-gray"
            :class="{ 'is-invalid': submitted && $v.form.nok_street.$error }"
            type="text"
            v-model="form.nok_street"
            id="nok_street"
            name="nok_street"
            placeholder="Address Line 1"
          />
        </div>
        <div class="col-12 col-lg-6">
          <input
            class="form-control mb-30 bg-gray"
            type="text"
            v-model="form.nok_apartment"
            id="nok_apartment"
            name="nok_apartment"
            placeholder="Address Line 2"
          />
        </div>
        <div class="col-12 col-lg-4">
          <input
            class="form-control mb-30 bg-gray"
            type="text"
            :class="{ 'is-invalid': submitted && $v.form.nok_city.$error }"
            v-model="form.nok_city"
            name="nok_city"
            placeholder="City"
          />
        </div>
        <div class="col-12 col-lg-4">
          <country-select
            v-model="form.nok_country"
            :class="{ 'is-invalid': submitted && $v.form.nok_country.$error }"
            class="custom-select form-control mb-30 bg-gray"
            :country="form.nok_country"
            :countryName="true"
            topCountry="ZW"
          />
        </div>
        <div class="col-12 col-lg-4">
          <input
            class="form-control mb-30 bg-gray"
            type="text"
            name="zip"
            v-model="form.nok_zip"
            placeholder="ZIP/Postal code"
          />
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-right">
          <button class="btn radix-btn" type="submit">Next Step</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { required, email } from "vuelidate/lib/validators";
import { parsePhoneNumberFromString, AsYouType } from "libphonenumber-js";

export default {
  components: {
    Datepicker: () => import("vuejs-datepicker")
  },
  data() {
    return {
      submitted: false,
      date_invalid: false,
      phone_error: false,
      nok_phone: "",
      form: {}
    };
  },
  validations: {
    form: {
      nok_full_name: { required },
      nok_email: { required, email },
      nok_phone: { required },
      nok_street: { required },
      nok_city: { required },
      nok_country: { required }
    }
  },

  methods: {
    handelNOK() {
      this.submitted = true;
      this.$v.$touch();
      if (this.$v.$invalid|| this.date_invalid) {
        if (!this.validPhone(this.form.nok_phone)) this.phone_error = true;
        if (!this.form.nok_dob) this.date_invalid = true;
        this.scrollErrorToView();
        return;
      }

      if (!this.validPhone(this.form.nok_phone)) {
        this.phone_error = true;
        this.scrollErrorToView();
        return;
      }

      if (!this.form.nok_dob || this.date_invalid) {
        this.date_invalid = true;
        this.scrollErrorToView();
        return;
      }
      this.$emit("done", this.form);
    },
    checkDateValidity(d) {
      const sixteenYearsAgo = moment().subtract(16, "years");
      const selectedDate = moment(d);
      if (selectedDate.isAfter(sixteenYearsAgo)) {
        this.date_invalid = true;
      } else {
        this.date_invalid = false;
      }
    },
    validPhone(phone) {
      if (!phone) return false;
      const phoneNumber = parsePhoneNumberFromString(phone);
      if (!phoneNumber) return false;
      return phoneNumber && phoneNumber.isValid();
    },
    scrollErrorToView() {
      setTimeout(() => {
        const elem = $(`.is-invalid`).first();
        $(elem).focus();
      }, 100);
    }
  },
  watch: {
    nok_phone(p) {
      this.form.nok_phone = p;
      if (this.phone_locked) return;
      this.phone_locked = true;
      setTimeout(() => (this.phone_locked = false), 10);
      this.nok_phone = new AsYouType().input(p);
      if (this.validPhone(p)) {
        this.phone_error = false;
      }
    }
  }
};
</script>