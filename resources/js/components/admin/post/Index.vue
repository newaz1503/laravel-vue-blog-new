<template>
    <div id="categoryList">
         <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post List

            </h1>

          </div>
          <div class="col-sm-6">
            <router-link to="/admin/post-add" class="btn btn-primary float-end"><i class="fas fa-plus"></i> Create Post</router-link>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header py-2">
              <h3 class="card-title">

              </h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SI</th>
                  <th>User name</th>
                  <th>Category name</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="(post, index) in getAllPosts" :key="post.id">
                  <td>{{ index + 1 }}</td>
                  <td v-if="post.user">{{ post.user.name }}</td>
                  <td v-if="post.category">{{ post.category.name }}</td>
                  <td v-if="post.title">{{ post.title }}</td>
                  <td v-if="post.description">{{ post.description.slice(0,20) }}</td>
                  <td v-if="post.image">
                     <img :src="`/uploads/image/post/${post.image}`" width="40" height="40" />
                  </td>
                  <td>
                      <router-link :to="`/admin/post/edit/${post.id}`"  class="btn btn-primary btn-sm">Edit</router-link>
                      <button @click.prevent="deletePost(post.id)" class="btn btn-danger btn-sm">Delete</button>
                  </td>
                </tr>
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: 'Index',
        data(){
          return{

          }
        },

      mounted(){
        this.$store.dispatch('allPost')
      },
      methods:{
        deletePost(id){
            axios.get('/admin/delete/post/'+id)
            .then(res => {
                this.$store.dispatch('allPost');
                Toast.fire({
                    icon: 'success',
                    title: res.message
                })
            })
            .catch( e =>{
                console.log(e);
            })
        }
      },
      computed:{
        getAllPosts() {
            return this.$store.getters.allpost
         }
      }

    }
</script>

<style scoped>

</style>
