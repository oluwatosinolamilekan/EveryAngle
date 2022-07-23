import ListCategoryComponent from './components/category/ListCategoryComponent.vue';
import LoginComponent from './components/user/LoginComponent.vue'
export const routes = [
    {
      'path': '/login',
        name: 'LoginComponent',
        component: LoginComponent
    },
    {
        path: '/categories',
        name: 'ListCategoryComponent',
        component: ListCategoryComponent
    },
]
