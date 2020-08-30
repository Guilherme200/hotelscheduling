import vSelect from "vue-select";

/** Components */
Vue.component("v-select", vSelect);
Vue.component("data-list", require('@/components/data-list/DataList.vue').default);
Vue.component("loader", require('@/components/data-list/Loader.vue').default);

Vue.component("breadcrumb", require('@/components/breadcrumb/Breadcrumb.vue').default);
Vue.component("breadcrumb-item", require('@/components/breadcrumb/BreadcrumbItem.vue').default);
