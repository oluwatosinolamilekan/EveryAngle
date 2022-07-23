import ListCategoryComponent from './components/category/ListCategoryComponent.vue';
import LoginComponent from './components/user/LoginComponent.vue'
export const routes = [
    {
      'path': '/',
        name: 'LoginComponent',
        component: LoginComponent
    },
    {
        path: '/',
        name: 'ListCategoryComponent',
        component: ListCategoryComponent
    },
]
