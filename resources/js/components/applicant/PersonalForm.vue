<template>
    <div>
        <form @submit.prevent="null">
            <div class="row">
                <div class="col-12">
                    <label class="font-weight-bold" for="first_name"
                        >Full Name:</label
                    >
                </div>
                <div class="col-12 col-lg-4">
                    <input
                        class="form-control mb-30 bg-gray"
                        :class="{
                            'is-invalid':
                                submitted && $v.form.first_name.$error,
                        }"
                        type="text"
                        name="first_name"
                        v-model="form.first_name"
                        id="first_name"
                        placeholder="First Name"
                    />
                </div>
                <div class="col-12 col-lg-4">
                    <input
                        class="form-control mb-30 bg-gray"
                        type="text"
                        v-model="form.middle_names"
                        name="middle_names"
                        placeholder="Middle Names"
                    />
                </div>
                <div class="col-12 col-lg-4">
                    <input
                        class="form-control mb-30 bg-gray"
                        type="text"
                        :class="{
                            'is-invalid': submitted && $v.form.last_name.$error,
                        }"
                        v-model="form.last_name"
                        name="last_name"
                        placeholder="Last Name"
                    />
                </div>
                <div class="col-12 col-lg-6">
                    <datepicker
                        format="dd MMMM yyyy"
                        :initialView="'year'"
                        @selected="checkDateValidity($event)"
                        name="dob"
                        v-model="form.dob"
                        placeholder="Date of Birth"
                        :input-class="
                            date_invalid || (submitted && $v.form.dob.$error)
                                ? 'form-control is-invalid'
                                : 'mb-30 form-control'
                        "
                    ></datepicker>
                    <div class="mb-30" v-if="!date_invalid && !form.dob"></div>
                    <div
                        class="mb-30 mt-2 invalid-feedback d-block"
                        v-if="date_invalid && form.dob"
                    >
                        You must be 16 years or older
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <select
                        v-model="form.gender"
                        :class="{
                            'is-invalid': submitted && $v.form.gender.$error,
                        }"
                        class="custom-select form-control mb-30 bg-gray selectpicker"
                        id="gender"
                    >
                        <option value="undefined" disabled selected>
                            Gender
                        </option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label class="font-weight-bold" for="email">Contact:</label>
                </div>
                <div class="col-12 col-lg-6">
                    <input
                        class="form-control bg-gray"
                        @focus="clearEmailErr()"
                        id="email"
                        type="email"
                        v-model="form.email"
                        :class="{
                            'is-invalid':
                                email_taken ||
                                (submitted && $v.form.email.$error),
                        }"
                        placeholder="Email Address"
                    />
                    <div class="mb-30" v-if="!email_taken"></div>
                    <div
                        class="mb-30 mt-2 invalid-feedback d-block"
                        v-if="email_taken"
                    >
                        Email already taken
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <input
                        class="form-control bg-gray"
                        type="tel"
                        v-model="phone"
                        :class="{ 'is-invalid': submitted && phone_error }"
                        name="phone"
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
                    <label class="font-weight-bold" for="street"
                        >Physical Address:</label
                    >
                </div>
                <div class="col-12 col-lg-6">
                    <input
                        class="form-control mb-30 bg-gray"
                        :class="{
                            'is-invalid': submitted && $v.form.street.$error,
                        }"
                        type="text"
                        v-model="form.street"
                        id="street"
                        name="street"
                        placeholder="Address Line 1"
                    />
                </div>
                <div class="col-12 col-lg-6">
                    <input
                        class="form-control mb-30 bg-gray"
                        type="text"
                        v-model="form.apartment"
                        id="apartment"
                        name="apartment"
                        placeholder="Address Line 2"
                    />
                </div>
                <div class="col-12 col-lg-4">
                    <input
                        class="form-control mb-30 bg-gray"
                        type="text"
                        :class="{
                            'is-invalid': submitted && $v.form.city.$error,
                        }"
                        v-model="form.city"
                        name="city"
                        placeholder="City"
                    />
                </div>
                <div class="col-12 col-lg-4">
                    <country-select
                        v-model="form.country"
                        :class="{
                            'is-invalid': submitted && $v.form.country.$error,
                        }"
                        class="custom-select form-control mb-30 bg-gray"
                        :country="form.country"
                        :whiteList="['GB', 'IE']"
                        :countryName="true"
                        topCountry="GB"
                    />
                </div>

                <div class="col-12 col-lg-4">
                    <input
                        class="form-control mb-30 bg-gray"
                        type="text"
                        name="zip"
                        v-model="form.zip"
                        placeholder="ZIP/Postal code"
                    />
                </div>
            </div>
            <div class="col-12 text-right">
                <button
                    class="btn radix-btn"
                    type="button"
                    :disabled="submitted && validating_email"
                    @click="handlePersonal()"
                >
                    Next Step
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { required, email } from "vuelidate/lib/validators";
import { parsePhoneNumberFromString, AsYouType } from "libphonenumber-js";
import { isUnique } from "../../services/api";

export default {
    components: {
        Datepicker: () => import("vuejs-datepicker"),
    },

    data() {
        return {
            phone: "",
            phone_locked: false,
            phone_error: false,
            form: {},
            email_taken: false,
            submitted: false,
            date_invalid: false,
            validating_email: false,
        };
    },
    validations: {
        form: {
            first_name: {  required },
            last_name: { required },
            street: { required },
            email: {
                required,
                email,
            },
            phone: { required },
            city: { required },
            country: { required },
            gender: { required },
            dob: { required },
        },
    },
    methods: {
        handlePersonal() {
            this.submitted = true;

            this.$v.$touch();
            this.phone_error = !this.validPhone(this.form.phone);

            if (this.$v.$invalid || this.phone_error)
                return this.scrollErrorToView();
            this.validating_email = true;
            isUnique(this.form.email)
                .then(({ data }) => {
                    if (data && data.unique) {
                        return this.$emit("done", this.form);
                    }
                    this.email_taken = true;
                    this.scrollErrorToView();
                })
                .catch((err) => {
                    console.error({ err });
                    this.email_taken = true;
                    this.scrollErrorToView();
                })
                .finally(() => {
                    this.submitted = false;
                    this.validating_email = false;
                });
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
        },
        clearEmailErr() {
            setTimeout(() => {
                this.email_taken = false;
            }, 5000);
        },
    },
    watch: {
        phone(p) {
            this.form.phone = p;
            if (this.phone_locked) return;
            this.phone_locked = true;
            setTimeout(() => (this.phone_locked = false), 10);
            this.phone = new AsYouType().input(p);
            if (this.validPhone(p)) {
                this.phone_error = false;
            }
        },
    },
};
</script>
