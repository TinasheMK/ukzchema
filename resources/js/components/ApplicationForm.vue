<template>
  <div class="radix--blog--area my-5">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-4 mb-2 mb-md-0">
          <div class="account-side-area">
            <div class="single-widget-area mb-3 apply-form-nav">
              <ul class="catagories-list">
                <li
                  class="pl-3"
                  v-for="link in links"
                  @click="viewForm(link.step)"
                  :key="link.link"
                  :style="completed[link.step] ? '' : 'cursor: not-allowed;'"
                >
                  <a :class="isActive(link.step)" :style="completed[link.step] ? '' : 'cursor: not-allowed;'" href="javascript:;">
                    <i :class="'lni ' + link.icon"></i>
                    {{link.title}}
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-8">
          <div v-show="step === 1">
            <div id="step-1">
              <h5 class="mb-1">Become a Member</h5>
              <p>Please note that all applications require the approval of the UKZ Chema Association.</p>
            </div>

            <personal-form @done="formCompleted($event, 1)"></personal-form>
          </div>

          <div v-show="step === 2">
            <div id="step-2">
              <h5 class="mb-1">Next of kin details</h5>
              <p>The person we can contact in case of emergency and to whom funds are released in the event of your passing on.
                <strong> (next of kin is not a nominee) </strong>
              </p>
            </div>
            <nextof-kin @done="formCompleted($event, 2)"></nextof-kin>
          </div>
          <div v-show="step === 3">
            <div id="step-3">
              <h5 class="mb-1">Nominees details</h5>
              <p>You can add up to 4 nominees</p>
            </div>
            <nominee-container :max_nominees="max_nominees" @done="formCompleted($event, 3)"></nominee-container>
          </div>
          <div v-show="step === 4">
            <div id="step-4">
              <h5 class="mb-1">Agree to terms</h5>
            </div>
            <terms-form @done="formCompleted($event, 4)" :forms="forms"></terms-form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['max_nominees'],
  components: {
    PersonalForm: () => import("./applicant/PersonalForm"),
    NextofKin: () => import("./applicant/NextofKin"),
    NomineeContainer: () => import("./applicant/NomineeContainer"),
    TermsForm: () => import("./applicant/TermsForm")
  },
  data() {
    return {
      step: 1,
      forms: {},
      completed: [],
      links: [
        {
          title: "Personal",
          step: 1,
          icon: "lni-user"
        },
        {
          title: "Next of Kin",
          step: 2,
          icon: "lni-users"
        },
        {
          title: "Nominee",
          step: 3,
          icon: "lni-customer"
        },
        {
          title: "Terms of Use",
          step: 4,
          icon: "lni-radio-button"
        }
      ]
    };
  },

  methods: {
    viewForm(step) {
      if(!this.completed[step]) return;
      this.step = step;
    },
    isActive(step) {
      if (step === this.step) return "active-step";
      return "";
    },
    formCompleted(event, step) {
      this.completed[step] = true;
      this.forms = { ...this.forms, ...event };
      console.log("Previous Form\n", this.forms);
      if (step < this.links.length + 1) {
        this.step += 1;
      }
    }
  },
  watch: {
    step(step) {
      if(typeof $ !== "undefined"){
        $('html, body').animate({
          scrollTop: ($(`#step-${step}`).offset().top + 24) + "px"
        }, "slow");
      }
    }
  }
};
</script>
