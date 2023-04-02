<template>
    <div id="categoryAdd">
         <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                <h3 class="card-title">Create New category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="storecategory()">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" v-model="form.name" class="form-control" id="exampleInputEmail1" placeholder="Enter category name">
                        <div class="text-danger" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
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
                    name: ''
                }),
                categories: []
            }
        },
        methods:{
            async storecategory(){
                await this.form.post('/admin/category-store')
                .then(res => {
                    if(this.form.successful){
                        this.categories = res.data;
                        this.$router.push('/admin/category')
                        Toast.fire({
                            icon: 'success',
                            title: 'category Created Successfully'
                        })
                    }else{
                        Toast.fire({
                            icon: 'Error',
                            title: 'category not Created'
                        })
                    }
                })
                .catch(e =>{
                    console.log(e);
                })
            }
        }

    }
</script>

<style scoped>

</style>
