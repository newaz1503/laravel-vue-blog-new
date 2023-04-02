<template>
    <div id="categoryAdd">
         <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-7">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Post </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="updatepost" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Select</label>
                        <select class="form-control" v-model="form.category_id">
                          <option value="" selected disabled>Select category</option>
                          <option :value="category.id" v-for="category in getAllCategory" :key="category.id">{{ category.name }}</option>
                        </select>
                        <div class="text-danger" v-if="form.errors.has('category_id')" v-html="form.errors.get('category_id')" />
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Post title</label>
                          <input type="text" v-model="form.title" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                          <div class="text-danger" v-if="form.errors.has('title')" v-html="form.errors.get('title')" />
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Post Description</label>
                          <textarea v-model="form.description" rows="6" class="form-control"></textarea>
                          <div class="text-danger" v-if="form.errors.has('description')" v-html="form.errors.get('description')" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input @change="changeImage($event)" type="file" name="image" class="custom-file-input" id="exampleInputFile">
                            <label  class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>

                          <div class="text-danger" v-if="form.errors.has('image')" v-html="form.errors.get('image')" />
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div>
                        <div class="my-3" v-if="form.image">
                          <img :src="showImage()"  width="200" height="150" />
                        </div>
                     </div>
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="form.busy">Submit</button>
                    </div>
                  </form>
            </div>

          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: 'Create',
        data(){
            return{
                form: new Form({
                    title: '',
                    description: '',
                    category_id: '',
                    image: ''
                }),
               posts: []
            }
        },
        mounted(){
          this.$store.dispatch('allCategory');
          this.editPost();

        },
        methods:{
            async updatepost(){
                await this.form.post('/admin/post/update/'+this.$route.params.id)
                .then(res => {
                    if(this.form.successful){
                        this.posts = res.data;
                        this.$router.push('/admin/post')
                        Toast.fire({
                            icon: 'success',
                            title: res.message
                        })
                    }else{
                        Toast.fire({
                            icon: 'Error',
                            title: 'Post not stored'
                        })
                    }
                })
                .catch(e =>{
                    console.log(e);
                })
            },
            changeImage(event){
              let file = event.target.files[0];
              let reader = new FileReader();
              reader.onload = (evt) => {
                  this.form.image = evt.target.result;
                  console.log(evt.target.result);
              };
              reader.readAsDataURL(file);
            },

            editPost(){
                axios.get(`/admin/post/edit/${this.$route.params.id}`)
                .then(res => {
                    console.log(res.data);
                    this.form.fill(res.data)
                })
                .catch(e =>{
                    console.log(e);
                })
            },
            showImage(){
                if(this.form.image.length > 100){
                    return this.form.image
                }else{
                    return `/uploads/image/post/${this.form.image}`
                }
            }
        },
        computed:{
        getAllCategory() {
            return this.$store.getters.allcategory
         }
      }

    }
</script>

<style scoped>

</style>
