<template>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Clients</h2>
                    <div class="align-items-center px-3 px-md-5">
                        <router-link to="/client/create"  class="btn btn-primary btn-sm float-right mb-2">Add Client</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <table id="productsTable" class="table table-hover table-product" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr  v-for="category in categories" v-bind:key="category.id">

                            <td>{{ category.name }}</td>

                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <button class="dropdown-item" @click="deleteCategory(category.id)">Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ListCategoryComponent",
    data(){
        return {
            categories: []
        }
    },
    created() {
        this.getRecords()
    },
    methods: {
        getRecords(){
            axios.get('api/category')
                .then((response) => {
                    this.categories = response.data.data
                }).catch((err) => {
                console.log(err)
            })
        },
        deleteCategory(id){
            axios.delete(`api/category/delete/${id}`)
                .then((response) => {
                    let i = this.categories.map(data => data.id).indexOf(id);
                    this.categories.splice(i, 1)
                }).catch((err) => {
                console.log(err)
            })
        },
    },
}
</script>

<style scoped>

</style>
