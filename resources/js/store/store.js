export default{
    state:{
        categories:[],
        posts: [],
        blogs: [],
        singlePost: '',
        frontcategories: [],
        latestPost: [],
    },
    mutations:{
        allcategory(state, data){
           return state.categories = data
        },
        allpost(state, data){
            return state.posts = data
         },
         blogPosts(state, data){
            return state.blogs = data
         },
         singlePost(state, data){
            return state.singlePost = data
         },
         frontCategories(state, data){
            return state.frontcategories = data
         },
         latestPost(state, data){
            return state.latestPost = data
         },
         postBycategory(state, data){
            return state.blogs = data
         },
         searchResult(state, data){
            return state.blogs = data
         },
    },
    actions:{
        allCategory(context){
            axios.get('/admin/category')
            .then( res => {
                context.commit('allcategory', res.data.categories)
            })
            .catch(e => {
                console.log(e);
            })
        },
        allPost(context){
            axios.get('/admin/post')
            .then( res => {
                context.commit('allpost', res.data.posts)
            })
            .catch(e => {
                console.log(e);
            })
        },
        BlogPost(context){
            axios.get('/blog')
            .then(res => {
                context.commit('blogPosts', res.data.posts)
            })
            .catch(e => {
                console.log(e);
            })
        },
        singlePost(context, payload){
            axios.get('/blog/'+payload)
            .then(res => {
                context.commit('singlePost', res.data.post)
            })
            .catch(e => {
                console.log(e);
            })
        },
        getFrontCategories(context){
            axios.get('/categories')
            .then( res => {
                context.commit('frontCategories', res.data.categories)
            })
            .catch(e => {
                console.log(e);
            })
        },
        latestPost(context){
            axios.get('/latestpost')
            .then( res => {
                context.commit('latestPost', res.data.latestpost)
            })
            .catch(e => {
                console.log(e);
            })
        },
        postBycategory(context, payload){
            axios.get('/postbycategory/'+payload)
            .then( res => {
                context.commit('postBycategory', res.data.posts)
            })
            .catch(e => {
                console.log(e);
            })
        },
        getSearchPost(context, payload){
            axios.get('/blogSearch?s='+payload)
            .then( res => {

                context.commit('searchResult', res.data.posts)
            })
            .catch(e => {
                console.log(e);
            })
        },
    },
    getters:{
        allcategory(state){
            return state.categories;
        },
        allpost(state){
            return state.posts;
        },
        blogPost(state){
            return state.blogs;
        },
        singlePost(state){
            return state.singlePost;
        },
        frontCategories(state){
            return state.frontcategories;
        },
        latestPost(state){
            return state.latestPost;
        },

    }
};
