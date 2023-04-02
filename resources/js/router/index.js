//--- --- --- Backend route --- --- ---
import dashboard from '../components/admin/dashboard';
// category
import categorylist from '../components/admin/category/Index.vue';
import categoryadd from '../components/admin/category/Create.vue';
import categoryEdit from '../components/admin/category/Edit.vue';
// post
import postlist from '../components/admin/post/Index.vue';
import postadd from '../components/admin/post/Create.vue';
import postEdit from '../components/admin/post/Edit.vue';

//--- --- --- Frontend route --- --- ---
import Home from '../components/front/Home.vue';
import Blog from '../components/front/Blog.vue';
import BlogDetails from '../components/front/BlogDetails.vue';


export const routes = [
    //--- --- --- Backend route --- --- ---
    {
         path: '/admin/dashboard',
         name: 'dashboard',
         component: dashboard
    },
    // category route
    {
        path: '/admin/category',
        name: 'CategoryList',
        component: categorylist
   },
   {
        path: '/admin/category-add',
        name: 'CategoryAdd',
        component: categoryadd
    },
    {
        path: '/admin/category/edit/:id',
        name: 'categoryEdit',
        component: categoryEdit
    },
    // post route
    {
        path: '/admin/post',
        name: 'PostList',
        component: postlist
    },
    {
        path: '/admin/post-add',
        name: 'PostAdd',
        component: postadd
    },
    {
        path: '/admin/post/edit/:id',
        name: 'PostEdit',
        component: postEdit
    },

     //--- --- --- frontend route --- --- ---
     {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/blog',
        name: 'blog',
        component: Blog
    },
    {
        path: '/blog/:id',
        name: 'blogdetails',
        component: BlogDetails
    },
    {
        path: '/postbycategory/:id',
        name: 'postbycategory',
        component: Blog
    }

]
