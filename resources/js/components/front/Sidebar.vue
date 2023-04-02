<template>
    <div id="Sidebar">
        <div class="span4">
                <aside class="right-sidebar">
                <div class="widget">
                    <div class="form-search">
                        <input placeholder="Type something" @keyup="Search" v-model="keyword" type="text" class="input-medium search-query">
                        <button @click.prevent="Search" class="btn btn-square btn-theme">Search</button>
                    </div>
                </div>
                <div class="widget">
                    <h5 class="widgetheading">Categories</h5>
                    <ul class="cat" v-if="categories.length > 0">
                    <li v-for="category in categories" :key="category.id"><i class="icon-angle-right"></i><router-link :to="`/postbycategory/${category.id}`">{{ category.name }}</router-link><span> (20)</span></li>

                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widgetheading">Latest posts</h5>
                    <ul class="recent">
                    <li v-for="post in latestPost">
                        <img :src="`/uploads/image/post/${post.image}`" class="pull-left" alt="" width="60" />
                        <h6 class="mb-0" style="font-size: 10px"><router-link :to="`/blog/${post.id}`">{{ post.title }}</router-link></h6>
                        <p v-html=" post.description">
                            {{ post.description.substr(0, 10) }}
                        </p>
                    </li>

                    </ul>
                </div>

                </aside>
            </div>
    </div>
</template>

<script>
import _ from 'lodash';
export default {
    name: 'Sidebar',

    data() {
        return {
            keyword: ''
        };
    },

    mounted() {
        this.$store.dispatch('getFrontCategories');
        this.$store.dispatch('latestPost');
    },

    methods: {
        Search:_.debounce(function(){
            this.$store.dispatch('getSearchPost',this.keyword);
        },1000)
    },
    computed: {
        categories(){
            return this.$store.getters.frontCategories;
        },
        latestPost(){
            return this.$store.getters.latestPost;
        }
    }
};
</script>
