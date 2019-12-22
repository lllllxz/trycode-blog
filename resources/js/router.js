import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routers = [
    {
        path: 'test',
        component: () => import('./components/ExampleComponent')
    }

]

var router = new VueRouter({
    routers
})

export default router;
