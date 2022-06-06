import Vue from "vue";



// Vue.component('submit-payment', () =>
//     import ('./components/applicant/SubmitPayment'))

Vue.component('header-view', () =>
    import ("./components/HeaderView"));
Vue.component("nav-view", () =>
    import ("./components/Nav"));
Vue.component("guest-nav", () =>
    import ("./components/GuestNav"));
Vue.component("loaded-view", () =>
    import ("./components/Loaded"));
Vue.component("footer-view", () =>
    import ("./components/Footer"));
Vue.component("cookie-view", () =>
    import ("./components/Cookie"));
Vue.component("bread-crumb", () =>
    import ("./components/BreadCrumb"));
Vue.component("application-form", () =>
    import ("./components/ApplicationForm"));
Vue.component("small-footer", () =>
    import ("./components/SmallFooter"));
Vue.component("account-sidebar", () =>
    import ("./components/account/Sidebar"));

/**
 * Members area components
 */

Vue.component("member-loaded", () =>
    import ("./components/member/MemberLoaded"));
Vue.component("member-nav", () =>
    import ("./components/member/MemberNav"));
Vue.component("obituary-view", () =>
    import ("./components/member/ObituaryView"));
Vue.component("new-message", () =>
    import ("./components/member/NewMessage"));
Vue.component("nominees-form", () =>
    import ("./components/member/NomineesForm"));
Vue.component("donations-table", () =>
    import ("./components/member/DonationsTable"));
Vue.component("donate-button", () =>
    import ("./components/member/DonateButton"));
Vue.component("deposit-modal", () =>
    import ("./components/member/DepositModal"));
Vue.component("deposits-table", () =>
    import ("./components/member/DepositsTable"));
Vue.component("dob-input", () =>
    import ("./components/base/DOB"));
Vue.component("country-picker", () =>
    import ("./components/base/CountryPicker"));
Vue.component("notifications-table", () =>
    import ("./components/member/NotificationsTable"));