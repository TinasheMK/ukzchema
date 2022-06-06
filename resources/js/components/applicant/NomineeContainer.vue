<template>
  <div>
    <form @submit.prevent="handleNominees()">
      <div v-for="nominee in nominees" :key="nominee">
          <div class="row">
              <h5 v-if="nominees.length > 1"
        >Nominee {{nominees.indexOf(nominee) + 1}}</h5>
        <button
          @click="removeNominee(nominee)"
          type="button"
          v-if="nominees.length > 1"
          data-toggle="tooltip"
          data-placement="top"
          title="Remove Nominee"
          class="close rm-nominee text-danger position-absolute"
          aria-label="Close"
        >
          <span aria-hidden="true">remove</span>
        </button>
          </div>
        
        <nominee-form
          @fullName="fullNameKeyUp($event)"
          @nomineeValid="nomineeValid($event)"></nominee-form>
      </div>
      <div class="row">
        <div class="col-6 text-center" v-if="nominees.length < max_nominees">
          <button type="button" class="btn radix-btn" @click="addNominee()">Add Nominee</button>
        </div>
        <div class="col-6 text-center">
          <button class="btn radix-btn" type="submit">{{nominee_btn_text}}</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: ["max_nominees"],
  components: {
    NomineeForm: () => import("./NomineeForm")
  },
  data() {
    return {
      listener: false,
      nominees: [0],
      nominee_counter: 0,
      nominees_details: [],
      nominee_btn_text: "Skip Step",
    };
  },
  methods: {
    fullNameKeyUp(full_name){
      if(this.nominees.length > 1) return;
      this.nominee_btn_text = full_name ? "Next Step" : "Skip Step";
    },
    addNominee() {
      const time = new Date().getTime();
      this.nominees.push(time);
      this.nominee_btn_text = "Next Step";
    },

    removeNominee(id) {
      this.nominees = this.nominees.filter(n => n !== id);
      if(this.nominees.length === 1 && !this.nominees[0].full_name){
        this.nominee_btn_text = "Skip Step";
      }
    },

    handleNominees() {
      this.nominee_counter = 0;
      this.nominees_details = [];
      if(this.nominee_btn_text === "Skip Step"){
        return this.$eventBus.$emit("validate:nominee", true);
      }
      this.$eventBus.$emit("validate:nominee");
    },
    nomineeValid(form) {
      this.nominees_details.push(form);
      this.nominee_counter += 1;
      if (this.nominee_counter === this.nominees.length) {
        this.$emit("done", {nominees: this.nominees_details});
      }
    }
  }
};
</script>

<style>
.nominee-num {
  font-size: 1.2rem;
}
.rm-nominee{
    right: 7px;
    font-weight: 300;
    font-size: 1.2rem;
}
</style>