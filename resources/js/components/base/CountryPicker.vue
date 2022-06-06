<template>
    <div :class="classes">
        <div class="form-group">
            <input type="hidden" v-model="country" :name="input_name || 'country'"/>
            <label for="exampleInputEmail1">Country</label>
            <country-select
                v-model="country"
                class="custom-select form-control mb-30 bg-gray"
                :country="country"
                :countryName="true"
                topCountry="GB"
            />
        </div>
    </div>
</template>

<script>
export default {
    props: ["value", "classes", "input_name"],
    mounted() {
        this.country = this.value;
        console.log(this.input_name);
    },
    data() {
        return {
            country: null
        };
    },
};
</script>

<style></style>
