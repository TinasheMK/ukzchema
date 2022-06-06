<template>
  <div>
    <div class="custom-control custom-checkbox mt-3 mr-sm-2">
      <input
        v-model="form.read_constitution"
        :class="{ 'is-invalid': submitted && !form.read_constitution }"
        class="custom-control-input" id="const" type="checkbox" />
      <label class="custom-control-label disable-select" for="const">
        I have read and understand the
        <a href="/constitution">Constitution</a> of UKZ Chema Association
      </label>
    </div>
    <div class="custom-control custom-checkbox mt-3 mr-sm-2">
      <input
        v-model="form.certify_details"
        :class="{ 'is-invalid': submitted && !form.certify_details }"
        class="custom-control-input" id="info" type="checkbox" />
      <label
        class="custom-control-label disable-select"
        for="info"
      >I certify that the information provided is true and correct in all respect</label>
    </div>
    <div class="custom-control custom-checkbox mt-3 mr-sm-2">
      <input
        v-model="form.uk_resident"
        :class="{ 'is-invalid': submitted && !form.uk_resident }"
        class="custom-control-input" id="resident" type="checkbox" />
      <label
        class="custom-control-label disable-select"
        for="resident"
      >I live in the United Kingdom. All nominees live in the UK</label>
    </div>
    <div class="row mt-3">
      <div class="col-12 text-center" @click="submit()">
        <button class="btn radix-btn">Submit Details</button>
      </div>
    </div>
  </div>
</template>

<script>
import { required } from "vuelidate/lib/validators";
import { submitJoiningDetails } from "../../services/api";

const mustBeTrue = (value) => value;

export default {
  props: ['forms'],
  data(){
    return {
      submitted: false,
      form: {}
    }
  },
  validations: {
    form: {
      read_constitution: { required,mustBeTrue },
      certify_details: { required, mustBeTrue },
      uk_resident: { required, mustBeTrue },
    }
  },
  methods: {
    submit(){
      this.submitted = true;
      this.$v.$touch();
      if (this.$v.$invalid) return;
      let loader = this.$loading.show({
        backgroundColor: "#000",
        color: "#5679fa",
        canCancel: false
      });
      const form_data = { ...this.forms, ...this.form };
      submitJoiningDetails(form_data)
        .then(({ route }) => {
          loader.hide();
          if(!route) {
            return this.$vToastify.error(
            "Oops! Something went wrong. Try again or Contact support"
          );
          }
          window.location.replace(route);
        })
        .catch(err => {
          let msg = "Oops! Failed to submit. Try again or contact support";
          try {
            const {response: {data: {errors, message}}} = err;
            if(message){
              msg = message
            }
            if(errors){
              Object.keys(errors).forEach(e => {
                setTimeout(() => {
                  this.$vToastify.error(errors[e][0]);
                }, 1000);
              });
            }
          } catch (error) {}
          this.$vToastify.error(msg);
          loader.hide();
        });
    }
  }
};
</script>

<style>
.disable-select {
  -webkit-user-select: none;  
  -moz-user-select: none;    
  -ms-user-select: none;      
  user-select: none;
  cursor: pointer;
}
</style>