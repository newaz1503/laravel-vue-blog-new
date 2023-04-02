<template>
    <div id="categoryList">
         <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>category List

            </h1>

          </div>
          <div class="col-sm-6">
            <router-link to="/admin/category-add" class="btn btn-primary float-end"><i class="fas fa-plus"></i> Create category</router-link>
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
                  <th style="width:5%">
                    <select @change="deleteSelectedCategory()" v-model="selectText">
                        <option value="" disabled selected>---Select---</option>
                        <option value="">Delete</option>
                        <option value="">Delete All</option>
                    </select>
                    <br>
                    <br>
                    <div>
                        <input type="checkbox" id="selectAll" :value="this.all_checked" v-model="all_checked" @click.prevent="selectAllCheck()" >
                        <label for="selectAll" v-if="all_checked==false">Checked All</label>
                        <label for="selectAll" v-else>UnChecked</label>
                    </div>

                  </th>
                  <th>SI</th>
                  <th>Name</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="(category, index) in getAllCategory" :key="category.id">
                  <td style="width:5%">
                     <input type="checkbox" v-model="selectedItems" :value="category.id" />
                  </td>
                  <td>{{ index + 1 }}</td>
                  <td v-if="category.name">{{ category.name }}</td>
                  <td v-if="category.created_at">{{ category.created_at | timeFormat}}</td>
                  <td>
                      <router-link :to="`/admin/category/edit/${category.id}`"  class="btn btn-primary btn-sm">Edit</router-link>
                      <button @click.prevent="deletecategory(category.id)" class="btn btn-danger btn-sm">Delete</button>
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
            selectedItems: [],
            selectText: '',
            all_checked: false,
          }
        },

      mounted(){
        this.$store.dispatch('allCategory')
      },
      methods:{
        deletecategory(id){
            axios.get('/admin/delete/category/'+id)
            .then(res => {
                this.$store.dispatch('allCategory');
                Toast.fire({
                    icon: 'success',
                    title: res.message
                })
            })
            .catch( e =>{
                console.log(e);
            })
        },
        deleteSelectedCategory(){
            axios.get('deletecategoryitems/'+this.selectedItems)
            .then(res => {
                this.selectedItems = []
                this.$store.dispatch('allCategory');
                Toast.fire({
                    icon: 'success',
                    title: res.msg
                })
            })
            .catch(e => {
              console.log(e);
            })
        },
        selectAllCheck(){
          if(this.all_checked == false){
            this.all_checked = true
            for(let cat in this.getAllCategory){
              this.selectedItems.push(this.getAllCategory[cat].id)
            }
          }else{
            this.all_checked = false;
            this.selectedItems = []
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
