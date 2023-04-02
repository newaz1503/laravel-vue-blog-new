<template>
    <div>
        <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Post right sidebar</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
              <li class="active">Blog post right sidebar</li>
            </ul>
            
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3 v-if="singlePost.title">{{ singlePost.title }}</h3>
                    </div>
                    <img :src="`/uploads/image/post/${singlePost.image}`" :alt="singlePost.title" width="800"  />
                  </div>
                  <p v-html="singlePost.description">{{ singlePost.description }} </p>
                  
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li v-if="singlePost.user"><i class="icon-user"></i><a href="#"> {{singlePost.user.name}}</a></li>
                      <li v-if="singlePost.category"><i class="icon-folder-open"></i><a href="#"> {{singlePost.category.name}}</a></li>
                      <li><i class="icon-tags"></i><a href="#">Web design</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </article>
            <!-- author info -->


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
    name: "BlogDetails",
    data(){
        return{

        }
    },
    components:{
        Sidebar
    },
    watch:{
        $route(to,from){
            this.SinglePost();
        }
    },
    mounted(){
       this.SinglePost();
    },
    methods: {
        SinglePost(){
            this.$store.dispatch('singlePost', this.$route.params.id)
        }
    },
    computed: {
        singlePost(){
            return this.$store.getters.singlePost
        }
    },

}
</script>

<style scoped>

</style>
