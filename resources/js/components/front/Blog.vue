<template>
    <div>
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Blog </h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
              <li class="active"></li>
            </ul>
          </div>
        </div>
      </div>

        </section>
        <section id="content">
        <div class="container">
            <div class="row">
            <div class="span8" v-if="allPosts.length > 0">
                <article v-for="post in allPosts" :key="post.id">
                <div class="row">
                    <div class="span8">
                    <div class="post-image">
                        <div class="post-heading">
                        <h3><a href="#" v-if=" post.title">{{ post.title }}</a></h3>
                        </div>
                        <img v-if="post.image" :src="`/uploads/image/post/${post.image}`" :alt="post.title" />
                    </div>
                    <p v-html="post.description">
                        {{ post.description.substr(0,200) }}
                    </p>
                    <div class="bottom-article">
                        <ul class="meta-post">
                        <li><i class="icon-calendar"></i><a href="#"> {{ post.created_at | timeFormat}}</a></li>
                        <li v-if="post.user"><i class="icon-user"></i><a href="#" > {{ post.user.name }}</a></li>
                        <li v-if="post.category"><i class="icon-folder-open" ></i><a href="#"> {{ post.category.name }}</a></li>
                        </ul>
                        <router-link :to="`/blog/${post.id}`" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                    </div>
                    </div>
                </div>
                </article>
            </div>
                
                    <Sidebar />
                
            </div>
        </div>

        </section>

    </div>

</template>

<script>
import Sidebar from './Sidebar.vue';
export default {
    name: "Blog",
    data(){
        return{

        }
    },
    components:{
        Sidebar
    },
    watch:{
       $route(to, from){
           this.postByCategory()
       }
    },
    mounted(){
        this.$store.dispatch('BlogPost')
    },
    methods:{
        postByCategory(){
            if(this.$route.params.id !=null){
                this.$store.dispatch('postBycategory', this.$route.params.id)
            }else{
                this.$store.dispatch('BlogPost')
            }
           
        }
    },
    computed: {
        allPosts(){
            return this.$store.getters.blogPost
           
        }
    },

}
</script>

<style scoped>

</style>
