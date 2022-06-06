<template>
  <div class="breadcrumb--area white-bg-breadcrumb">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2 class="breadcrumb-title">{{page}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li 
                                v-for="b in bread"
                                class="breadcrumb-item"
                                :class="b === page ? 'active' : ''"
                                :aria-current="b === page ? 'page' : null"
                                :key="b">
                                <a :href="getRoute(b)">{{b}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ["page", "bread"],
    mounted(){
        console.log(this.page, this.bread);
    },
    methods: {
        getRoute(b) {
            if(b === this.page) return "javascript:;";
            return "/"
        }
    }
}
</script>

<style>

</style>